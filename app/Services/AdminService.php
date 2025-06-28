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

            $jobDetails = DB::table('job_tracking')
            ->join('jobs', 'job_tracking.id_jobs', '=', 'jobs.id_jobs')
            ->leftJoin('company', 'jobs.id_company', '=', 'company.id_company')
            ->where('job_tracking.id_userDetails', $userDetails->id_userDetails)
            ->select(
                'job_tracking.*',
                'jobs.job_name',
                'company.*',
                DB::raw('COALESCE(YEAR(job_tracking.date_end), "Now") as date_end'),
                DB::raw('COALESCE(YEAR(job_tracking.date_start), "Now") as date_start')
            )
            ->orderBy('job_tracking.id_tracking', 'desc')
            ->get()
            ->map(function ($job) {
                // Decode job_description if it's stored as a JSON string
                $job->job_description = json_decode($job->job_description, true);
                return $job;
            });

        $allJob = Job::get('job_name');
        $companies = Cache::remember('all_companies', now()->addHours(1), function () {
            return Company::all();
        });

        return [
            'userDetails' => $userDetails,
            'jobDetails' => $jobDetails,
            'companies' => $companies,
            'allJob' => $allJob
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
        $company = Company::findOrFail($id);

        $workers = DB::table('company')
            ->join('jobs', 'company.id_company', '=', 'jobs.id_company')
            ->join('job_tracking', 'jobs.id_jobs', '=', 'job_tracking.id_jobs')
            ->join('user_details', 'job_tracking.id_userDetails', '=', 'user_details.id_userDetails')
            ->select(
                'company.id_company',
                'company.company_name',
                DB::raw("COALESCE(company.company_picture, 'https://picsum.photos/id/870/200/300?grayscale&blur=2') as company_picture"),
                'user_details.*', // Include more fields as needed
                'job_tracking.*',
                DB::raw('COALESCE(YEAR(job_tracking.date_end), "Now") as date_end'),
                DB::raw('COALESCE(YEAR(job_tracking.date_start), "Now") as date_start'),
                DB::raw("COALESCE(user_details.profile_photo, 'default_profile.png') as profile_photo"),
            )
            ->where('company.id_company', '=', $id)
            ->orderBy('user_details.name', 'asc')
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
        return Cache::remember('all_companies', now()->addHours(1), function () {
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
        return Cache::remember('all_news', now()->addMinutes(30), function () {
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
        // return Cache::remember('pending_requests', now()->addMinutes(5), function() {
        //     return PendingRequest::with('userDetails')
        //         ->where('approval_status', 'pending')
        //         ->latest()
        //         ->take(10)
        //         ->get();
        // });
        // Instant :
        return PendingRequest::with('userDetails')
            ->where('approval_status', 'pending')
            ->latest()
            ->take(10)
            ->get();
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
