<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Company;
use App\Models\UserDetails;
use Termwind\Components\Dd;
use Illuminate\Http\Request;
use App\Http\Middleware\Alumni;
use App\Models\Job;
use App\Models\JobTracking;
use App\Models\PendingRequest;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;
use PhpParser\Node\Expr\Cast\String_;
use Illuminate\Support\Facades\Storage;

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
                    ->orderBy('job_tracking.id_tracking','desc')
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
                    'company.*',
                    DB::raw('COALESCE(YEAR(job_tracking.date_end), "Now") as date_end'),
                    DB::raw('COALESCE(YEAR(job_tracking.date_start), "Now") as date_start')
                )
                ->orderBy('job_tracking.id_tracking','desc')
                ->get()
                ->map(function ($job) {
                    // Decode job_description if it's stored as a JSON string
                    $job->job_description = json_decode($job->job_description, true);
                    return $job;
                });

            $companies = Company::all();
            return view('content.editprofile', compact('user', 'userDetails', 'jobDetails', 'companies',));
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
            ->orderBy('job_tracking.id_tracking','desc')
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
            'user_description' => 'required|string|max:1000',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:4096', // Validates the file
        ]);

        $user = UserDetails::findorFail($id);

        // Handle file upload
        if ($request->hasFile('profile_picture')) {

            // Delete the old file if it exists
            if ($user->profile_photo && Storage::exists('public/profile/' . $user->profile_photo)) {
                Storage::delete('public/profile/' . $user->profile_photo);
            }

            $file = $request->file('profile_picture');
            $filenameWithExt = $file->getClientOriginalName();

            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('profile_picture')->getClientOriginalExtension();

            $filenameSimpan = $filename . '_' . time() . '.' . $extension;
            $file->storeAs('public/profile', $filenameSimpan);

            $user->profile_photo = $filenameSimpan ?? null;
        }
        $user->name = $request->full_name;
        $user->current_company = $request->current_company;
        $user->current_job = $request->current_job;
        $user->user_description = $request->user_description;
        $user->save();

        return redirect()->route('alumni.profile');
    }

    public function addExperiences(Request $request)
    {
        $request->validate([
            'company' => 'required|exists:company,id_company',
            'position' => 'required|string|max:255',
            'date_start' => 'required|date',
            'date_end' => 'date|nullable',

            'job_responsibility' => 'array|min:1',
            'job_responsibility.*' => 'string|max:1000',
        ]);

        PendingRequest::create([
            'id_userDetails' => Auth::user()->userDetails->id_userDetails,
            'job_name' => $request->position,
            'id_company' => $request->company,
            'date_start' => $request->date_start,
            'date_end' => $request->date_end,
            'job_description' => json_encode($request->job_responsibility),
            'approval_status' => 'pending',
            'request_type' => 'create'
        ]);

        return redirect()->route('alumni.show-profile');
    }

    public function updateExperiences(Request $request, String $id)
    {
        // Validate incoming request
        $request->validate([
            'company' => 'required|exists:company,id_company',
            'position' => 'required|string|max:255',
            'date_start' => 'required|date',
            'date_end' => 'date|nullable',
            'job_responsibility' => 'array|min:1',
            'job_responsibility.*' => 'string|max:1000'
        ]);

        // Find the existing JobTracking record
        $jobTracking = JobTracking::findOrFail($id); // Find by ID, or return 404 if not found

        // // Update the related Job record
        // $job_id = $jobTracking->id_jobs; // get job id

        // // initialize job
        // $job = Job::findOrFail($job_id);

        // $job->job_name = $request->position;
        // $job->id_company = $request->company;
        // $job->save(); // Save the updated Job record

        // // Update the JobTracking record
        // $jobTracking->date_start = $request->date_start;
        // $jobTracking->date_end = $request->date_end ?: null; // Set to null if not provided
        // $jobTracking->job_description = $request->job_responsibility; // Assuming this is a JSON field or array
        // $jobTracking->save(); // Save the updated JobTracking record


        // Store the changes in the pending_changes table
        PendingRequest::create([
            'job_name' => $request->position,
            'id_company' => $request->company,
            'id_userDetails' => Auth::user()->userDetails->id_userDetails,
            'id_tracking' => $jobTracking->id_tracking, // Relate to the original record
            'job_description' => json_encode($request->job_responsibility), // Assuming it's an array
            'date_start' => $request->date_start,
            'date_end' => $request->date_end ?: null,
            'approval_status' => 'pending', // Set status to pending
            'request_type' => 'update'
        ]);


        // Redirect with success message
        return redirect()->route('alumni.show-profile')
            ->with('success', 'Job experience updated successfully');
    }

}
