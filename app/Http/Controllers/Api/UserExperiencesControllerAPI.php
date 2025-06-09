<?php

namespace App\Http\Controllers\Api;

use App\Models\Job;
use App\Models\User;
use App\Models\JobTracking;
use App\Models\UserDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class UserExperiencesControllerAPI extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(String $id)
    {
        try {
            // Get user details with fallback values
            $userDetails = DB::table('user_details')
                ->select(
                    'user_details.*',
                    DB::raw('COALESCE(user_details.current_job, "Jobless") as job_name'),
                    DB::raw('COALESCE(user_details.current_company, "-") as company_name'),
                    DB::raw("COALESCE(user_details.profile_photo, 'default_profile.png') as profile_photo")
                )
                ->where('user_details.id_userDetails', $id)
                ->first();

            if (!$userDetails) {
                return response()->json([
                    "success" => false,
                    "message" => "User not found",
                    "data" => null
                ], 404);
            }

            // Get all job details for the user
            $jobDetails = DB::table('job_tracking')
                ->join('jobs', 'job_tracking.id_jobs', '=', 'jobs.id_jobs')
                ->leftJoin('company', 'jobs.id_company', '=', 'company.id_company')
                ->where('job_tracking.id_userDetails', $userDetails->id_userDetails)
                ->select(
                    'job_tracking.*',
                    'jobs.job_name',
                    'company.company_name',
                    'company.status',
                    DB::raw('COALESCE(YEAR(job_tracking.date_end), "Now") as date_end'),
                    DB::raw('COALESCE(YEAR(job_tracking.date_start), "Now") as date_start'),
                    'jobs.job_description'
                )
                ->orderBy('job_tracking.id_tracking', 'desc')
                ->get();

            // Loop over job details and append related alumni
            $jobDetails->transform(function ($job) use ($id) {
                // Decode job_description if it's JSON
                if (is_string($job->job_description)) {
                    $job->job_description = json_decode($job->job_description, true);
                }

                // Find alumni currently in this job
                $alumniWithCurrentJob = UserDetails::where('current_job', $job->job_name)
                    ->join('users', 'user_details.id_users', '=', 'users.id_users')
                    ->where('users.id_roles', 2) // alumni role
                    ->where('user_details.id_userDetails', '!=', $id)
                    ->select(
                        'user_details.id_userDetails',
                        'user_details.name',
                        'user_details.current_job',
                        'user_details.current_company',
                        DB::raw("COALESCE(user_details.profile_photo, 'default_profile.png') as profile_photo"),
                        DB::raw("COALESCE(user_details.graduate_year, '-') as graduate_year")
                    )
                    ->limit(5)
                    ->get();

                // Find alumni who had this job in the past
                $alumniWithJobHistory = UserDetails::join('job_tracking', 'user_details.id_userDetails', '=', 'job_tracking.id_userDetails')
                    ->join('jobs', 'job_tracking.id_jobs', '=', 'jobs.id_jobs')
                    ->join('users', 'user_details.id_users', '=', 'users.id_users')
                    ->where('jobs.job_name', $job->job_name)
                    ->where('users.id_roles', 2)
                    ->where('user_details.id_userDetails', '!=', $id)
                    ->whereNotIn('user_details.id_userDetails', $alumniWithCurrentJob->pluck('id_userDetails'))
                    ->select(
                        'user_details.id_userDetails',
                        'user_details.name',
                        'user_details.current_job',
                        'user_details.current_company',
                        DB::raw("COALESCE(user_details.profile_photo, 'default_profile.png') as profile_photo"),
                        DB::raw("COALESCE(user_details.graduate_year, '-') as graduate_year")
                    )
                    ->distinct()
                    ->limit(5 - $alumniWithCurrentJob->count())
                    ->get();

                // Merge both alumni collections
                $job->related_alumni = $alumniWithCurrentJob->concat($alumniWithJobHistory);

                return $job;
            });

            return response()->json([
                "success" => true,
                "message" => "Successfully Fetched User Experiences",
                "data" => [
                    'user_details' => $userDetails,
                    'job_details' => $jobDetails
                ]
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                "success" => false,
                "message" => "Failed to fetch user experiences",
                "error" => $e->getMessage()
            ], 500);
        }
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, String $id)
    {
        try {
            $request->validate([
                'company' => 'required|exists:company,id_company',
                'position' => 'required|string|max:255',
                'date_start' => 'required|date',
                'date_end' => 'date|nullable',
                'job_responsibility' => 'array|min:1',
                'job_responsibility.*' => 'string|max:1000',
            ]);

            $user = User::with('userDetails')->where('id_users', $id)->first();

            if (!$user || !$user->userDetails) {
                return response()->json([
                    "success" => false,
                    "message" => "User or user details not found",
                    "data" => null
                ], 404);
            }

            // Create new job
            $job = Job::create([
                'job_name' => $request->position,
                'id_company' => $request->company
            ]);

            // Create job tracking
            $jobTracking = JobTracking::create([
                'id_userDetails' => $user->userDetails->id_userDetails,
                'id_jobs' => $job->id_jobs,
                'date_start' => $request->date_start,
                'date_end' => $request->date_end,
                'job_description' => $request->job_responsibility,
            ]);

            return response()->json([
                "success" => true,
                "message" => "Job experience created successfully",
                "data" => $jobTracking
            ], 201);

        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                "success" => false,
                "message" => "Validation failed",
                "errors" => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                "success" => false,
                "message" => "Failed to create job experience",
                "error" => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $jobTracking = JobTracking::with(['job.company'])
                ->where('id_tracking', $id)
                ->first();

            if (!$jobTracking) {
                return response()->json([
                    "success" => false,
                    "message" => "Job tracking not found",
                    "data" => null
                ], 404);
            }

            // Handle job_description formatting
            if (is_string($jobTracking->job_description)) {
                $jobTracking->job_description = json_decode($jobTracking->job_description, true);
            }

            return response()->json([
                "success" => true,
                "message" => "Job tracking retrieved successfully",
                "data" => $jobTracking
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                "success" => false,
                "message" => "Failed to retrieve job tracking",
                "error" => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
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
            $jobTracking = JobTracking::findOrFail($id);

            // Update the related Job record
            $job = Job::findOrFail($jobTracking->id_jobs);
            $job->job_name = $request->position;
            $job->id_company = $request->company;
            $job->save();

            // Update the JobTracking record
            $jobTracking->date_start = $request->date_start;
            $jobTracking->date_end = $request->date_end ?: null;
            $jobTracking->job_description = $request->job_responsibility;
            $jobTracking->save();

            return response()->json([
                "success" => true,
                "message" => "Job experience updated successfully",
                "data" => $jobTracking
            ], 200);

        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                "success" => false,
                "message" => "Job tracking or related job not found",
                "data" => null
            ], 404);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                "success" => false,
                "message" => "Validation failed",
                "errors" => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                "success" => false,
                "message" => "Failed to update job experience",
                "error" => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $jobTracking = JobTracking::findOrFail($id);
            $jobId = $jobTracking->id_jobs;

            // Delete the job tracking record first (child record)
            $jobTracking->delete();

            // Check if this job is used by other job tracking records
            $otherJobTrackings = JobTracking::where('id_jobs', $jobId)->count();

            // Only delete the job if it's not referenced by other job tracking records
            if ($otherJobTrackings === 0) {
                $job = Job::find($jobId);
                if ($job) {
                    $job->delete();
                }
            }

            return response()->json([
                "success" => true,
                "message" => "Job experience deleted successfully",
            ], 200);

        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                "success" => false,
                "message" => "Job tracking not found",
            ], 404);
        } catch (\Exception $e) {
            return response()->json([
                "success" => false,
                "message" => "Failed to delete job experience",
                "error" => $e->getMessage()
            ], 500);
        }
    }
}