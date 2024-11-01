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
        //     $alumnis = DB::table('roles')
        //                     ->join('users','roles.id_roles','=','users.id_roles')
        //                     ->join('user_details','users.id_users','=','user_details.id_users')
        //                     ->join('job_tracking','user_details.id_userDetails','=','job_tracking.id_userDetails')
        //                     ->select('users.*','user_details.*','job_tracking.*')
        //                     ->where('roleName','=','Alumni')
        //                     ->get();

        // $alumnis =  DB::table('roles')
        //                     ->join('users','roles.id_roles','=','users.id_roles')
        //                     ->join('user_details','users.id_users','=','user_details.id_users')
        //                     ->join('job_tracking','user_details.id_userDetails','=','job_tracking.id_userDetails')
        //                     ->select('*')
        //                     ->whereRaw('LOWER(roleName) = ?', ['alumni'])
        //                     ->get();


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
            $userDetails = $user->userDetails;

            // Only Alumni Can Access
            if ($user->id_roles == '2') {
                return view('content.profile', compact('user', 'userDetails'));
            }
        }

        return redirect()->route('login');
    }
}
