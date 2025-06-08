<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\UserDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\ModelNotFoundException;


class UserControllerAPI extends Controller
{
    public function __construct()
    {
        $this->middleware('admin')->except([
            'profile',
            'index',
            'detail',
            'listAlumni',
            'listMahasiswa'
        ]);
    }

    /**w
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::with('userDetails')->get();

        return response()->json([
            "message" => "Successfully Fetched User Data!",
            "data" => $user
        ],200);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data masuk
        $validated = $request->validate([
            'id_roles' => 'required|integer',
            'email' => 'required|email|unique:users,email',
            'user_details.name' => 'required|string',
            'user_details.nim' => 'required|string',
            'user_details.phone' => 'nullable|string',
            'user_details.profile_photo' => 'nullable|string',
            'user_details.user_description' => 'nullable|string',
            'user_details.current_job' => 'nullable|string',
            'user_details.current_company' => 'nullable|string',
            'user_details.entry_year' => 'required|digits:4',
            'user_details.graduate_year' => 'nullable|digit:4',
            'user_details.status' => 'nullable|string',
        ]);

        // Simpan user
        $user = User::create([
            'id_roles' => $request->id_roles,
            'email' => $request->email,
            'google_id' => $request->google_id ?? null,
        ]);

        // Simpan user details
        $userDetails = $user->userDetails()->create([
            'name' => $request->user_details['name'],
            'nim' => $request->user_details['nim'],
            'phone' => $request->user_details['phone'] ?? null,
            'profile_photo' => $request->user_details['profile_photo'] ?? null,
            'user_description' => $request->user_details['user_description'] ?? null,
            'current_job' => $request->user_details['current_job'] ?? null,
            'current_company' => $request->user_details['current_company'] ?? null,
            'entry_year' => $request->user_details['entry_year'],
            'graduate_year' => $request->user_details['graduate_year'] ?? null,
            'status' => $request->user_details['status'] ?? 'pending',
            'modifiedDate' => now(),
        ]);

        return response()->json([
            'message' => 'Successfully created user!',
            'data' => [
                'user' => $user,
                'user_details' => $userDetails
            ]
        ], 201);
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::with('userDetails')->where('id_users', $id)->first();

        if (!$user) {
            return response()->json([
                "message" => "Failed to get user data!",
                "error" => "User not found"
            ], 400);
        }

        return response()->json([
            "message" => "Successfully fetched user with ID $id!",
            "data" => $user
        ], 200);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validasi data masuk
        $validated = $request->validate([
            'id_roles' => 'required|integer',
            'email' => 'required|email|unique:users,email,' . $id, // ignore current user's email
            'user_details.name' => 'required|string',
            'user_details.nim' => 'required|string',
            'user_details.phone' => 'nullable|string',
            'user_details.profile_photo' => 'nullable|string',
            'user_details.user_description' => 'nullable|string',
            'user_details.current_job' => 'nullable|string',
            'user_details.current_company' => 'nullable|string',
            'user_details.entry_year' => 'required|digits:4',
            'user_details.graduate_year' => 'nullable|digits:4',
            'user_details.status' => 'nullable|string',
        ]);

        // Cari user
        $user = User::with('userDetails')->find($id);

        if (!$user) {
            return response()->json([
                'message' => 'User not found!'
            ], 404);
        }

        // Update user
        $user->update([
            'id_roles' => $request->id_roles,
            'email' => $request->email,
            'google_id' => $request->google_id ?? $user->google_id,
        ]);

        // Update user details
        $user->userDetails()->updateOrCreate(
            ['id_users' => $user->id_users], // condition
            [
                'name' => $request->user_details['name'],
                'nim' => $request->user_details['nim'],
                'phone' => $request->user_details['phone'] ?? null,
                'profile_photo' => $request->user_details['profile_photo'] ?? null,
                'user_description' => $request->user_details['user_description'] ?? null,
                'current_job' => $request->user_details['current_job'] ?? null,
                'current_company' => $request->user_details['current_company'] ?? null,
                'entry_year' => $request->user_details['entry_year'],
                'graduate_year' => $request->user_details['graduate_year'] ?? null,
                'status' => $request->user_details['status'] ?? $user->userDetails->status ?? 'pending',
                'modifiedDate' => now(),
            ]
        );

        // Refresh user with latest user_details
        $user->load('userDetails');

        return response()->json([
            'message' => "Successfully updated user with ID $id!",
            'data' => $user
        ], 200);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::with('userDetails')->where('id_users', $id)->first();

        if (!$user) {
            return response()->json([
                'message' => "User with ID $id not found."
            ], 404);
        }

        // Optional: delete userDetails first if not set to cascade
        if ($user->userDetails) {
            $user->userDetails->delete();
        }

        $user->delete();

        return response()->json([
            'message' => "Successfully deleted user with ID $id."
        ], 200);
    }
    public function listAlumni()
    {
        $user = User::with('userDetails')->where('id_roles','2')->get();

        return response()->json([
            "message" => "Succesfully Fetched All Alumni Data!",
            "data" => $user
        ]);
    }
    public function listMahasiswa()
    {
        $user = User::with('userDetails')->where('id_roles','3')->get();

        return response()->json([
            "message" => "Succesfully Fetched All Mahasiswa Data!",
            "data" => $user
        ]);
    }

    // public function showDetail(string $id)
    // {
    //     try {
    //         // 1. Fetch User Details
    //         $userDetails = UserDetails::with('user')
    //             ->select(
    //                 'user_details.*',
    //                 DB::raw('COALESCE(user_details.current_job, "Jobless") as job_name'),
    //                 DB::raw('COALESCE(user_details.current_company, "-") as company_name'),
    //                 DB::raw("COALESCE(user_details.profile_photo, 'default_profile.png') as profile_photo"),
    //                 DB::raw("COALESCE(user_details.graduate_year, '-') as graduate_year")
    //             )
    //             ->where('id_userDetails', $id)
    //             ->firstOrFail();

    //         // 2. Fetch Job History
    //         $jobHistory = DB::table('job_tracking')
    //             ->join('jobs', 'job_tracking.id_jobs', '=', 'jobs.id_jobs')
    //             ->leftJoin('company', 'jobs.id_company', '=', 'company.id_company')
    //             ->where('job_tracking.id_userDetails', $userDetails->id_userDetails)
    //             ->select(
    //                 'job_tracking.id_tracking',
    //                 'job_tracking.job_description',
    //                 'jobs.job_name',
    //                 'company.company_name',
    //                 'company.status',
    //                 DB::raw('COALESCE(YEAR(job_tracking.date_end), "Now") as date_end'),
    //                 DB::raw('COALESCE(YEAR(job_tracking.date_start), "Now") as date_start')
    //             )
    //             ->orderBy('job_tracking.id_tracking', 'desc')
    //             ->get()
    //             ->map(function ($job) use ($id) {
    //                 // 3. For each job, find related alumni

    //                 // Find alumni who currently have this job
    //                 $alumniWithCurrentJob = UserDetails::where('current_job', $job->job_name)
    //                     ->join('users', 'user_details.id_users', '=', 'users.id_users')
    //                     ->where('users.id_roles', 2) // Ensure they are alumni
    //                     ->where('user_details.id_userDetails', '!=', $id) // Exclude current user
    //                     ->select(
    //                         'user_details.name',
    //                         'user_details.current_job',
    //                         'user_details.current_company',
    //                         DB::raw("COALESCE(user_details.profile_photo, 'default_profile.png') as profile_photo"),
    //                         DB::raw("COALESCE(user_details.graduate_year, '-') as graduate_year")
    //                     )
    //                     ->limit(5)
    //                     ->get();

    //                 // Find alumni who had this job in their history
    //                 $alumniWithJobHistory = UserDetails::join('job_tracking', 'user_details.id_userDetails', '=', 'job_tracking.id_userDetails')
    //                     ->join('jobs', 'job_tracking.id_jobs', '=', 'jobs.id_jobs')
    //                     ->join('users', 'user_details.id_users', '=', 'users.id_users')
    //                     ->where('jobs.job_name', $job->job_name)
    //                     ->where('users.id_roles', 2) // Ensure they are alumni
    //                     ->where('user_details.id_userDetails', '!=', $id)
    //                     ->whereNotIn('user_details.id_userDetails', $alumniWithCurrentJob->pluck('id_userDetails')) // Avoid duplicates
    //                     ->select(
    //                         'user_details.name',
    //                          'user_details.current_job',
    //                         'user_details.current_company',
    //                         DB::raw("COALESCE(user_details.profile_photo, 'default_profile.png') as profile_photo"),
    //                         DB::raw("COALESCE(user_details.graduate_year, '-') as graduate_year")
    //                     )
    //                     ->distinct()
    //                     ->limit(5 - $alumniWithCurrentJob->count()) // Fill remaining spots
    //                     ->get();

    //                 // Combine the lists of related alumni
    //                 $job->related_alumni = $alumniWithCurrentJob->concat($alumniWithJobHistory);

    //                 // Decode the job description
    //                 $job->job_description = json_decode($job->job_description, true);

    //                 return $job;
    //             });

    //         // 4. Construct the final JSON response
    //         return response()->json([
    //             'success' => true,
    //             'data' => [
    //                 'user_details' => $userDetails,
    //                 'job_history' => $jobHistory,
    //             ],
    //         ]);

    //     } catch (ModelNotFoundException $e) {
    //         // Handle cases where the user is not found
    //         return response()->json([
    //             'success' => false,
    //             'message' => 'User not found.',
    //         ], 404);
    //     } catch (\Exception $e) {
    //         // Handle other potential errors
    //         return response()->json([
    //             'success' => false,
    //             'message' => 'An error occurred while fetching the data.',
    //             'error' => $e->getMessage(), // Optional: for debugging
    //         ], 500);
    //     }
    // }
}
