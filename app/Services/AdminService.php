<?php

namespace App\Services;

use App\Models\Job;
use App\Models\News;
use App\Models\User;
use App\Models\Company;
use App\Models\JobTracking;
use App\Models\UserDetails;
use App\Models\PendingRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;

class AdminService
{
    /**
     * Get all alumni with optimized query
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAllAlumni()
    {
        return Cache::remember('all_alumni', now()->addMinutes(15), function () {
            // Use eager loading with specific columns to reduce data transfer
            return User::with(['userDetails:id_userDetails,id_users,name,nim,profile_photo'])
                ->where('id_roles', 2)
                ->get()
                ->map(function ($user) {
                    // Make sure userDetails exists before trying to access it
                    if ($user->userDetails && $user->userDetails->nim) {
                        $nimParts = explode('/', $user->userDetails->nim);
                        $user->userDetails->nim_part = $nimParts[1] ?? '';
                    }
                    return $user;
                });
        });
    }

    /**
     * Get alumni details by ID
     *
     * @param string $id
     * @return array
     */
    public function getAlumniDetails(string $id)
    {
        $userDetails = UserDetails::with(['user'])
            ->select(
                'user_details.*',
                DB::raw('COALESCE(current_job, "Jobless") as job_name'),
                DB::raw('COALESCE(current_company, "-") as company_name'),
                DB::raw("COALESCE(profile_photo, 'default_profile.png') as profile_photo")
            )
            ->findOrFail($id);

        $jobDetails = JobTracking::with(['job', 'job.company'])
            ->where('id_userDetails', $userDetails->id_userDetails)
            ->select('job_tracking.*')
            ->orderBy('id_tracking', 'desc')
            ->get()
            ->map(function ($jobTracking) {
                $jobTracking->date_end_year = $jobTracking->date_end ? date('Y', strtotime($jobTracking->date_end)) : "Now";
                $jobTracking->date_start_year = $jobTracking->date_start ? date('Y', strtotime($jobTracking->date_start)) : "Now";

                if (isset($jobTracking->job_description) && is_string($jobTracking->job_description)) {
                    $jobTracking->job_description = json_decode($jobTracking->job_description, true);
                }

                return $jobTracking;
            });

        $companies = Cache::remember('all_companies', now()->addHours(1), function() {
            return Company::all();
        });

        return [
            'userDetails' => $userDetails,
            'jobDetails' => $jobDetails,
            'companies' => $companies
        ];
    }

    /**
     * Get company details by ID
     *
     * @param string $id
     * @return array
     */
    public function getCompanyDetails(string $id)
    {
        $company = Cache::remember('company_'.$id, now()->addMinutes(30), function() use ($id) {
            return Company::findOrFail($id);
        });

        $workers = JobTracking::with(['userDetails:id_userDetails,name,profile_photo'])
            ->join('jobs', 'job_tracking.id_jobs', '=', 'jobs.id_jobs')
            ->where('jobs.id_company', $id)
            ->select(
                'job_tracking.id_userDetails',
                'job_tracking.date_start',
                'job_tracking.date_end'
            )
            ->orderBy('job_tracking.id_userDetails')
            ->paginate(10);

        return [
            'company' => $company,
            'workers' => $workers
        ];
    }

    /**
     * Get all companies
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAllCompanies()
    {
        return Cache::remember('all_companies', now()->addHours(1), function() {
            return Company::all();
        });
    }

    /**
     * Get all news with pagination
     *
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    public function getAllNews()
    {
        return Cache::remember('all_news', now()->addMinutes(30), function() {
            return News::latest()->paginate(15);
        });
    }

    /**
     * Get pending requests
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getPendingRequests()
    {
        return Cache::remember('pending_requests', now()->addMinutes(5), function() {
            return PendingRequest::with('userDetails')
                ->where('approval_status', 'pending')
                ->latest()
                ->take(10)
                ->get();
        });
        // Instant :
        // return PendingRequest::with('userDetails')
        // ->where('approval_status', 'pending')
        // ->latest()
        // ->take(10)
        // ->get();
    }

    /**
     * Clear relevant caches after data updates
     *
     * @param string $type Type of data that was updated (alumni, company, news)
     * @param string|null $id ID of the specific record that was updated
     * @return void
     */
    public function clearCaches(string $type, ?string $id = null)
    {
        switch ($type) {
            case 'alumni':
                Cache::forget('all_alumni');
                if ($id) {
                    Cache::forget('alumni_details_' . $id);
                }
                break;

            case 'company':
                Cache::forget('all_companies');
                if ($id) {
                    Cache::forget('company_' . $id);
                }
                break;

            case 'news':
                Cache::forget('all_news');
                break;

            case 'pending_request':
                Cache::forget('pending_requests');
                break;

            case 'all':
                Cache::flush();
                break;
        }
    }
}
