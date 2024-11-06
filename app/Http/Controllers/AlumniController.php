<?php

namespace App\Http\Controllers;

use App\Models\User;
use Termwind\Components\Dd;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AlumniController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $alumnis = DB::table('roles')
            ->join('users', 'roles.id_roles', '=', 'users.id_roles')
            ->join('user_details', 'users.id_users', '=', 'user_details.id_users')
            ->leftJoin(
                DB::raw('(SELECT jt1.* FROM job_tracking jt1
                         INNER JOIN (SELECT id_userDetails, MAX(id_tracking) as latest_id_tracking
                                     FROM job_tracking
                                     GROUP BY id_userDetails) jt2
                         ON jt1.id_userDetails = jt2.id_userDetails
                         AND jt1.id_tracking = jt2.latest_id_tracking) as latest_job_tracking'),
                'user_details.id_userDetails',
                '=',
                'latest_job_tracking.id_userDetails'
            )
            ->leftJoin('jobs', 'latest_job_tracking.id_jobs', '=', 'jobs.id_jobs')  // Join with jobs table
            ->leftJoin('company', 'jobs.id_company', '=', 'company.id_company')  // Join with company table
            ->select(
                'roles.*',
                'users.*',
                'user_details.*',
                'latest_job_tracking.*',
                DB::raw('COALESCE(jobs.job_name, "Jobless") as job_name'),  // If job_name is null, output "Jobless"
                DB::raw('COALESCE(company.company_name, "-") as company_name'),
                DB::raw('COALESCE(user_details.profile_photo, ?) as profile_photo'),  // Use a parameter to handle default value
            )
            ->addBinding('https://www.gravatar.com/avatar/2c7d99fe281ecd3bcd65ab915bac6dd5?s=250', 'select')  // Bind the default URL dynamically
            ->whereRaw('LOWER(roleName) = ?', ['alumni'])
            ->get();

        return view('content.alumni', compact('alumnis'));
    }
    /**
     * Get Mahasiswa Profile
     */
    public function profile()
    {
        if (Auth::check()) {
            $user = Auth::user();

            if ($user->id_roles == '2') {
                $userDetails = DB::table('roles')
                    ->join('users', 'roles.id_roles', '=', 'users.id_roles')
                    ->join('user_details', 'users.id_users', '=', 'user_details.id_users')
                    ->leftJoin(
                        DB::raw('(SELECT jt1.* FROM job_tracking jt1
                                 INNER JOIN (SELECT id_userDetails, MAX(id_tracking) as latest_id_tracking
                                             FROM job_tracking
                                             GROUP BY id_userDetails) jt2
                                 ON jt1.id_userDetails = jt2.id_userDetails
                                 AND jt1.id_tracking = jt2.latest_id_tracking) as latest_job_tracking'),
                        'user_details.id_userDetails',
                        '=',
                        'latest_job_tracking.id_userDetails'
                    )
                    ->leftJoin('jobs', 'latest_job_tracking.id_jobs', '=', 'jobs.id_jobs')
                    ->leftJoin('company', 'jobs.id_company', '=', 'company.id_company')
                    ->select(
                        'roles.*',
                        'users.*',
                        'user_details.*',
                        'latest_job_tracking.*',
                        DB::raw('COALESCE(jobs.job_name, "Jobless") as job_name'),
                        DB::raw('COALESCE(company.company_name, "-") as company_name'),
                        DB::raw('COALESCE(user_details.profile_photo, ?) as profile_photo')
                    )
                    ->addBinding('https://www.gravatar.com/avatar/2c7d99fe281ecd3bcd65ab915bac6dd5?s=250', 'select')
                    ->where('users.id_users', $user->id_users) // Fetch details for the authenticated user only
                    ->whereRaw('LOWER(roleName) = ?', ['alumni'])
                    ->first();  // Use first() instead of get() since we expect one result per user

            // Fetch all job tracking records for this user
            $jobDetails = DB::table('job_tracking')
                ->join('jobs', 'job_tracking.id_jobs', '=', 'jobs.id_jobs')
                ->leftJoin('company', 'jobs.id_company', '=', 'company.id_company')
                ->where('job_tracking.id_userDetails', $userDetails->id_userDetails)
                ->select(
                    'job_tracking.*',
                    'jobs.job_name',
                    'company.company_name',
                    DB::raw('COALESCE(YEAR(job_tracking.date_end), "Now") as date_end'),
                    DB::raw('COALESCE(YEAR(job_tracking.date_start), "Now") as date_start')
                )
                ->get()
                ->map(function ($job) {
                    // Decode job_description if it's stored as a JSON string
                    $job->job_description = json_decode($job->job_description, true);
                    return $job;
                });

                return view('content.profile-alumni', compact('user', 'userDetails','jobDetails'));
            }
        }
        return redirect()->route('login');
    }
}
