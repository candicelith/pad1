<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Job;
use App\Models\User;
use App\Models\JobTracking;
use App\Models\UserDetails;
use Illuminate\Http\Request;
use App\Models\PendingRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    /**
     * Inisiasi instansi AuthController
     */
    public function __construct()
    {
        $this->middleware('admin')->except([
            'getChartData',
            'handleApproval'
        ]);
    }
    public function index()
    {
        $admin = Auth::user();

        $pendingRequest = PendingRequest::where('approval_status', 'pending')->get();

        return view('content.admin-home', compact('admin', 'pendingRequest'));
    }

    public function show()
    {
        $admin = Auth::user();
        $userDetails = $admin->userDetails;

        // Ensure profile_photo is set to "default_profile.png" if null
        if (is_null($userDetails->profile_photo)) {
            $userDetails->profile_photo = 'default_profile.png';
            $userDetails->save(); // Save the change to the database
        }


        return view('content.admin-profile', compact('admin', 'userDetails'));
    }

    /**
     * Extracts the middle portion (second segment) of the NIM input.
     *
     * @param string $nim The full NIM string (e.g., '23/523246/SV/23875').
     * @return string The extracted NIM part (e.g., '523246').
     */
    private function getNimPart(string $nim): string
    {
        // Split the NIM by the '/' character
        $nimParts = explode('/', $nim);

        // Return the second part if it exists, otherwise return an empty string
        return $nimParts[1] ?? '';
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'nim' => 'required|string',
            'email' => 'required|email',
            // 'phone' => 'required|string|regex:/^\+62[0-9]{8,13}$/',
            'graduate_year' => 'required|integer|between:2018,2024'
        ]);

        // Extract the 'nim_part' (i.e., the middle portion of NIM)
        $nimPart = $this->getNimPart($request->nim);

        $user = User::create([
            'email' => $request->email,
            'id_roles' => 2,
            'password' => Hash::make($nimPart),
        ]);

        UserDetails::create([
            'id_users' => $user->id_users,
            'name' => $request->name,
            'nim' => $request->nim,
            // 'phone' => $request->phone,
            'graduate_year' => $request->graduate_year,
            'modifiedBy' => Auth::user()->userDetails->name,
        ]);

        return redirect()->back()->with('success', 'Alumni' . $request->name . 'Has Been Created!');
    }

    public function getAlumni()
    {
        $alumni = User::join('user_details', 'users.id_users', '=', 'user_details.id_users')
            ->select(
                'users.*',
                'user_details.*',
                DB::raw("SUBSTRING_INDEX(SUBSTRING_INDEX(NIM, '/', 2), '/', -1) as nim_part"),
            )
            ->whereRaw('id_roles = ?', [2])
            ->get();

        // dd($alumni);

        return view('content.admin-alumni', compact('alumni'));
    }

    public function detailAlumni(string $id)
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
            ->orderBy('job_tracking.id_tracking', 'desc')
            ->get()
            ->map(function ($job) {
                // Decode job_description if it's stored as a JSON string
                $job->job_description = json_decode($job->job_description, true);
                return $job;
            });

        $companies = Company::all();

        return view('content.admin-profilealumni', compact('userDetails', 'jobDetails', 'companies'));
    }

    public function editAlumni(Request $request, string $id)
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

        return redirect()->back();
    }

    public function editExperiencesAlumni(string $id)
    {
        $userDetails = DB::table('user_details')
            ->select(
                'user_details.*',  // Select only user_details fields
                DB::raw('COALESCE(user_details.current_job, "Jobless") as job_name'),
                DB::raw('COALESCE(user_details.current_company, "-") as company_name'),
                DB::raw("COALESCE(user_details.profile_photo, 'default_profile.png') as profile_photo"),
            )
            ->where('user_details.id_userDetails', $id)
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
            ->orderBy('job_tracking.id_tracking', 'desc')
            ->get()
            ->map(function ($job) {
                // Decode job_description if it's stored as a JSON string
                $job->job_description = json_decode($job->job_description, true);
                return $job;
            });
        $companies = Company::all();
        return view('content.admin-editalumni', compact('userDetails', 'jobDetails', 'companies', ));
    }

    public function addAlumniExperiences(Request $request, string $id)
    {
        $request->validate([
            'company' => 'required|exists:company,id_company',
            'position' => 'required|string|max:255',
            'date_start' => 'required|date',
            'date_end' => 'date|nullable',

            'job_responsibility' => 'array|min:1',
            'job_responsibility.*' => 'string|max:1000',
        ]);

        $job = Job::create([
            'job_name' => $request->position,
            'id_company' => $request->company
        ]);

        JobTracking::create([
            'id_userDetails' => $id,
            'id_jobs' => $job->id_jobs,
            'date_start' => $request->date_start,
            'date_end' => $request->date_end,
            'job_description' => $request->job_responsibility,
        ]);

        return redirect()->back();
    }

    public function updateAlumniExperiences(Request $request, string $id)
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

        // Update the related Job record
        $job_id = $jobTracking->id_jobs; // get job id

        // initialize job
        $job = Job::findOrFail($job_id);

        $job->job_name = $request->position;
        $job->id_company = $request->company;
        $job->save(); // Save the updated Job record

        // Update the JobTracking record
        $jobTracking->date_start = $request->date_start;
        $jobTracking->date_end = $request->date_end ?: null; // Set to null if not provided
        $jobTracking->job_description = $request->job_responsibility; // Assuming this is a JSON field or array
        $jobTracking->save(); // Save the updated JobTracking record


        // Redirect with success message
        return redirect()->back()
            ->with('success', 'Job experience updated successfully');
    }

    public function getChartData()
    {
        $queryData = DB::table('user_details')
            ->selectRaw('graduate_year AS x, COUNT(*) AS y')
            ->groupBy('graduate_year')
            ->orderBy('graduate_year')
            ->get();

        return response()->json($queryData); // Return data as JSON for frontend
    }

    public function handleApproval(Request $request, string $id)
    {
        $pendingRequest = PendingRequest::findOrFail($id);

        if ($request->action === 'approve') {
            if ($pendingRequest->request_type === 'create') {
                // Create a new JobTracking record
                $job = Job::create([
                    'job_name' => $pendingRequest->job_name,
                    'id_company' => $pendingRequest->id_company,
                ]);

                JobTracking::create([
                    'id_userDetails' => $pendingRequest->userDetails->id_userDetails,
                    'id_jobs' => $job->id_jobs,
                    'date_start' => $pendingRequest->date_start,
                    'date_end' => $pendingRequest->date_end,
                    'job_description' => json_decode($pendingRequest->job_description),
                ]);
            } elseif ($pendingRequest->request_type === 'update') {
                // Update the existing JobTracking record
                $jobTracking = JobTracking::findOrFail($pendingRequest->id_tracking);
                $jobTracking->update([
                    'job_name' => $pendingRequest->job_name,
                    'id_company' => $pendingRequest->id_company,
                    'date_start' => $pendingRequest->date_start,
                    'date_end' => $pendingRequest->date_end,
                    'job_description' => json_decode($pendingRequest->job_description),
                ]);
            }

            $pendingRequest->update(['approval_status' => 'approved']);
            return back()->with('approved', 'Request approved successfully.');
        }

        if ($request->action === 'reject') {
            $pendingRequest->update(['approval_status' => 'rejected']);
            return back()->with('rejected', 'Request declined.');
        }
    }

    public function viewApproval(string $id)
    {
        $pendingRequest = PendingRequest::findOrFail($id);
        $job = json_decode($pendingRequest->job_description);
        $userDetails = $pendingRequest->userDetails;
        return view('content.admin-detailalumni', compact('pendingRequest', 'userDetails', 'job'));
    }
}
