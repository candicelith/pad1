<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Alumni;
use App\Models\Company;
use App\Models\User;
use App\Models\UserDetails;
use Termwind\Components\Dd;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Expr\Cast\String_;

class AlumniController extends Controller
{
    /**
     * Inisiasi instansi AuthController
     */
    public function __construct()
    {
        $this->middleware('alumni')->except([
            'profile',
            'index',
            'detail'
        ]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $alumnis = User::join('user_details', 'users.id_users', '=', 'user_details.id_users')
            ->select(
                'users.*',
                'user_details.*',
                DB::raw('COALESCE(user_details.current_job, "Jobless") as job_name'),
                DB::raw('COALESCE(user_details.current_company, "-") as company_name'),
                DB::raw("COALESCE(user_details.profile_photo, 'default_profile.png') as profile_photo"),
            )
            ->where('id_roles', 2)
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
                $userDetails = DB::table('user_details')
                    ->select(
                        'user_details.*',  // Select only user_details fields
                        DB::raw('COALESCE(user_details.current_job, "Jobless") as job_name'),
                        DB::raw('COALESCE(user_details.current_company, "-") as company_name'),
                        DB::raw("COALESCE(user_details.profile_photo, 'default_profile.png') as profile_photo"),
                        )
                    ->where('user_details.id_users', $user->id_users)  // Fetch details for the authenticated user only
                    ->first();

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

                $companies = Company::all();

                return view('content.profile-alumni', compact('user', 'userDetails', 'jobDetails', 'companies'));
            }
        }
        return redirect()->route('login');
    }

    public function show()
    {
        $user = Auth::user();
        $userDetails = DB::table('user_details')
            ->select(
                'user_details.*',  // Select only user_details fields
                DB::raw('COALESCE(user_details.current_job, "Jobless") as job_name'),
                DB::raw('COALESCE(user_details.current_company, "-") as company_name'),
                DB::raw("COALESCE(user_details.profile_photo, 'default_profile.png') as profile_photo"),
            )
            ->where('user_details.id_users', $user->id_users)  // Fetch details for the authenticated user only
            ->first();

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

        $companies = Company::all();

        return view('content.editprofile', compact('user', 'userDetails', 'jobDetails', 'companies'));
    }

    public function detail(String $id)
    {
        $userDetails = DB::table('user_details')
            ->select(
                'user_details.*',  // Select only user_details fields
                DB::raw('COALESCE(user_details.current_job, "Jobless") as job_name'),
                DB::raw('COALESCE(user_details.current_company, "-") as company_name'),
                DB::raw("COALESCE(user_details.profile_photo, 'default_profile.png') as profile_photo"),
            )
            ->where('user_details.id_userDetails', $id)  // Fetch details for the authenticated user only
            ->first();

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


        return view('content.detailalumni', compact('userDetails', 'jobDetails'));
    }

    public function update(Request $request, String $id)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'current_company' => 'required|string|max:255',
            'current_job' => 'required|string|max:255',
            'user_description' => 'required|string|max:500',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validates the file
        ]);

        // Handle file upload
        if ($request->hasFile('profile_picture')) {
            $file = $request->file('profile_picture');
            $filenameWithExt = $file->getClientOriginalName();

            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('profile_picture')->getClientOriginalExtension();

            $filenameSimpan = $filename . '_' . time() . '.' . $extension;
            $file->storeAs('public/profile', $filenameSimpan);
        }

        $user = UserDetails::findorFail($id);
        $user->name = $request->full_name;
        $user->current_company = $request->current_company;
        $user->current_job = $request->current_job;
        $user->user_description = $request->user_description;
        $user->profile_photo = $filenameSimpan ?? null;
        $user->save();

        return redirect()->route('alumni.profile');
    }
}
