<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Job;
use App\Models\News;
use App\Models\User;
use App\Models\Company;
use App\Models\JobTracking;
use App\Models\UserDetails;
use Illuminate\Support\Str;
use App\Models\Notification;
use Illuminate\Http\Request;
use App\Models\PendingRequest;
use App\Services\AdminService;
use PHPUnit\Event\Code\Throwable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    protected $adminService;

    /**
     * Inisiasi instansi AuthController
     */
    public function __construct(AdminService $adminService)
    {
        $this->middleware('admin')->except([
            'getChartData',
            'handleApproval',
            'login'
        ]);

        $this->adminService = $adminService;
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        // Cek apakah user ada di database
        $user = User::where('email', $request->email)->first();

        // Validasi Password
        if (!$user || !Hash::check($request->password, $user->password)) {
            return redirect()->back()->withErrors([
                'email' => 'Invalid email input or password.',
            ])->withInput();
        }


        // NEW: Create token instead of just using Auth::login()
        $token = $user->createToken('web-session')->plainTextToken;

        // Store token in secure cookie
        cookie()->queue(
            'auth_token',
            $token,
            60 * 24, // 24 hours
            '/',
            null,
            true, // secure
            false  // httpOnly
        );

        // Generate API token
        Auth::login($user);
        $request->session()->regenerate();
        return redirect()->route('admin.home');
    }

    public function index()
    {
        $admin = Auth::user();
        $pendingRequest = $this->adminService->getPendingRequests();
        $pendingCompanies = Company::where('status', 'pending')
            ->orderBy('created_at', 'desc')
            ->get();
        return view('content.admin-home', compact('admin', 'pendingRequest', 'pendingCompanies'));
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
            'graduate_year' => 'required|integer|between:2018,2024'
        ]);

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
            'graduate_year' => $request->graduate_year,
            'modifiedBy' => Auth::user()->userDetails->name,
        ]);

        // Clear the alumni cache after creating a new alumni
        $this->adminService->clearCaches('alumni');

        return redirect()->back()->with('success', 'Alumni ' . $request->name . ' Has Been Created!');
    }

    public function getAlumni()
    {
        $alumni = $this->adminService->getAllAlumni();
        return view('content.admin-alumni', compact('alumni'));
    }

    public function detailAlumni(string $id)
    {
        $data = $this->adminService->getAlumniDetails($id);
        return view('content.admin-profilealumni', $data);
    }

    public function editAlumni(Request $request, string $id)
    {
        $request->validate([
            'current_company' => 'nullable|string|max:255',
            'current_job' => 'nullable|string|max:255',
            'user_description' => 'nullable|string|max:1000',
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

        $user->current_company = $request->current_company;
        $user->current_job = $request->current_job;
        $user->user_description = $request->user_description;
        $user->save();

        // Clear the alumni cache after updating an alumni
        $this->adminService->clearCaches('alumni', $id);

        return redirect()->back()->with('approved','Succesfully Updated Alumni Profile Data!');
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
        return view('content.admin-editalumni', compact('userDetails', 'jobDetails', 'companies',));
    }

    public function addAlumniExperiences(Request $request, string $id)
    {
        $request->validate([
            'company' => 'required|exists:company,id_company',
            'position' => 'required|string|max:255',
            'date_start' => 'required|date',
            'date_end' => 'nullable',
            'job_responsibility' => 'array|min:1',
            'job_responsibility.*' => 'string|max:1000',
        ]);

        // Handle "Present" value for current position - store as null in the database
        $dateEnd = ($request->date_end === 'Present') ? null : $request->date_end;


        $job = Job::create([
            'job_name' => $request->position,
            'id_company' => $request->company
        ]);

        JobTracking::create([
            'id_userDetails' => $id,
            'id_jobs' => $job->id_jobs,
            'date_start' => $request->date_start,
            'date_end' => $dateEnd,
            'job_description' => $request->job_responsibility,
        ]);

        return redirect()->route('admin.alumni')->with('approved','Succesfully Created Alumni Experiences');


    }

    public function updateAlumniExperiences(Request $request, string $id)
    {
        // Validate incoming request
        $request->validate([
            'company' => 'required|exists:company,id_company',
            'position' => 'required|string|max:255',
            'date_start' => 'required|date',
            'date_end' => 'nullable',
            'job_responsibility' => 'array|min:1',
            'job_responsibility.*' => 'string|max:1000'
        ]);

        // Handle "Present" value for current position - store as null in the database
        $dateEnd = ($request->date_end === 'Present') ? null : $request->date_end;

        $jobTracking = JobTracking::findOrFail($id);
        // Update the related Job record
        $job_id = $jobTracking->id_jobs; // get job id

        // initialize job
        $job = Job::findOrFail($job_id);

        $job->update([
            'job_name' => $request->position,
            'id_company' => $request->company
        ]);
        $jobTracking->update([
            'date_start' => $request->date_start,
            'date_end' => $dateEnd,
            // FIX: Use json_encode() because you are SAVING an array to the database.
            'job_description' => $request->job_responsibility,
        ]);
        return redirect()->route('admin.alumni')->with('approved', 'Succesfully Updated Alumni Experiences');
    }

    public function getChartData()
    {
        $queryData = DB::table('user_details')
            ->join('users', 'user_details.id_users', '=', 'users.id_users')
            ->selectRaw('user_details.entry_year AS x, COUNT(*) AS y')
            ->whereNotNull('user_details.entry_year')
            ->where('users.id_roles', 2) // Filter hanya role ID 2
            ->groupBy('user_details.entry_year')
            ->orderBy('user_details.entry_year')
            ->get();

        return response()->json($queryData);
    }

    public function getChartUserData()
    {
        $queryData = DB::table('users')
            ->selectRaw("DATE_FORMAT(updated_at, \"%b'%y\") AS x, COUNT(*) AS y, DATE_FORMAT(updated_at, '%Y-%m') AS sort_order")
            ->whereNotNull('updated_at')
            ->groupByRaw("x, sort_order")
            ->orderByRaw("sort_order")
            ->get()
            ->map(function ($item) {
                return [
                    'x' => $item->x,
                    'y' => $item->y
                ];
            });

        return response()->json($queryData);
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
                Notification::create([
                    'id_users' => $pendingRequest->userDetails->user->id_users,
                    'type' => 'approved',
                    'message' => 'Verification complete! Your information has been
                                    successfully updated.',
                ]);
            } elseif ($pendingRequest->request_type === 'update') {
                // Update the existing JobTracking record
                $jobTracking = JobTracking::findOrFail($pendingRequest->id_tracking);

                // Update the related Job record
                $job_id = $jobTracking->id_jobs; // get job id

                // initialize job
                $job = Job::findOrFail($job_id);

                $job->update([
                    'job_name' => $pendingRequest->job_name,
                    'id_company' => $pendingRequest->id_company
                ]);

                $jobTracking->update([
                    'date_start' => $pendingRequest->date_start,
                    'date_end' => $pendingRequest->date_end,
                    'job_description' => json_decode($pendingRequest->job_description),
                ]);

                Notification::create([
                    'id_users' => $pendingRequest->userDetails->user->id_users,
                    'type' => 'approved',
                    'message' => 'Verification complete! Your information has been successfully updated.',
                ]);
            }
            // Clear the cache so updated data is fetched fresh
            Cache::forget('pending_requests');
            $pendingRequest->update(['approval_status' => 'approved']);
            return redirect()->route('admin.home')->with('approved', 'Data update request has been approved.');
        }

        if ($request->action === 'reject') {
            $pendingRequest->update(['approval_status' => 'rejected']);

            Notification::create([
                'id_users' => $pendingRequest->userDetails->user->id_users,
                'type' => 'rejected',
                'message' => 'Verification failed. Please check your data and try again.',
            ]);
            // Clear the cache so updated data is fetched fresh
            Cache::forget('pending_requests');
            return redirect()->route('admin.home')->with('rejected', 'Data update request has been rejected.');
        }
    }

    public function viewApproval(string $id)
    {
        $pendingRequest = PendingRequest::findOrFail($id);
        $job = json_decode($pendingRequest->job_description);
        $userDetails = $pendingRequest->userDetails;
        return view('content.admin-detailalumni', compact('pendingRequest', 'userDetails', 'job'));
    }

    public function getCompany()
    {
        $companies = Company::get();
        return view('content.admin-company', compact('companies'));
    }

    public function detailCompany(string $id)
    {
        $data = $this->adminService->getCompanyDetails($id);
        return view('content.detailcompanies', $data);
    }

    public function storeCompany(Request $request)
    {
        try{
            $request->validate([
                'company_name' => 'required|string|max:255',
                'company_field' => 'required|string|max:255',
                'company_description' => 'required|string|max:255',
                'company_address' => 'string|max:255',
                'company_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:4096',
                'company_gallery' => 'nullable|array|max:5',
                'company_gallery.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:4096',
            ]);


            if ($request->hasFile('company_picture')) {
                $file = $request->file('company_picture');
                $filenameWithExt = $file->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $request->file('company_picture')->getClientOriginalExtension();
                $filenameSimpan = $filename . '_' . time() . '.' . $extension;
                $file->storeAs('public/company', $filenameSimpan);
                $companyPicture = $filenameSimpan;
            }

            // Upload company_gallery (if any)
            $galleryPaths = [];
            if ($request->hasFile('company_gallery')) {
                foreach ($request->file('company_gallery') as $galleryFile) {
                    $filename = time() . '_' . Str::slug($galleryFile->getClientOriginalName()) . '.' . $galleryFile->getClientOriginalExtension();
                    $galleryFile->storeAs('public/company/gallery', $filename);
                    $galleryPaths[] = $filename;
                }
            }
            $company = Company::create([
                'company_name' => $request->company_name,
                'company_field' => $request->company_field,
                'company_description' => $request->company_description,
                'company_address' => $request->company_address,
                'company_picture' => $filenameSimpan,
                'company_gallery' => $galleryPaths,
                'creator' => Auth::user()->id_users,
            ]);

            return redirect()->back()->with('approved', 'Company added successfully!');
        }catch(Exception $e){
            return redirect()->back()->with('rejected', 'Failed to add Company!');
        }

    }

    public function updateCompany(Request $request, string $id)
    {
        $request->validate([
            'company_name' => 'required|string|max:255',
            'company_field' => 'required|string|max:255',
            'company_phone' => 'required|string|max:255',
            'company_email' => 'required|email|max:255',
            'company_website' => 'required|url|max:255',
            'company_address' => 'required|string|max:255',
            'company_description' => 'required|string',
            'company_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:4096',
        ]);

        $company = Company::findOrFail($id);
        $company->company_name = $request->company_name;
        $company->company_field = $request->company_field;
        $company->company_phone = $request->company_phone;
        $company->company_email = $request->company_email;
        $company->company_website = $request->company_website;
        $company->company_address = $request->company_address;
        $company->company_description = $request->company_description;

        if ($request->hasFile('company_picture')) {
            // Delete old image if it exists
            if ($company->company_picture) {
                Storage::delete('public/company/' . $company->company_picture);
            }

            $image = $request->file('company_picture');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/company', $imageName);
            $company->company_picture = $imageName;
        }

        $company->save();

        // Clear cache after update
        $this->adminService->clearCaches('company', $id);

        return redirect()->back()->with('approved','Successfully Updated Company Data!');
    }

    public function deleteCompany(string $id)
    {
        $company = Company::findOrFail($id);
        $hasAlumni = Job::where('id_company',$company->id_company)->exists();

        if ($hasAlumni) {
            return redirect()->back()->with('rejected','Failed to delete company, This company is linked to one or more users.');
        }

        // Delete the main picture
        if ($company->company_picture && $company->company_picture !== 'default_company.png') {
            Storage::delete('public/company/' . $company->company_picture);
        }

        // Delete all gallery images
        if (!empty($company->company_gallery)) {
            foreach ($company->company_gallery as $galleryImage) {
                Storage::delete('public/company/gallery/' . $galleryImage);
            }
        }

        $company->delete();
        // Clear cache after delete
        $this->adminService->clearCaches('company', $id);
        $this->adminService->clearCaches('company');

        return redirect()->back()->with('approved', 'Company Succesfully Deleted!');
    }

    public function getNews()
    {
        $newss = News::latest()->get(); // atau dari service
        return view('content.admin-news', compact('newss'));
    }

    public function storeNews(Request $request)
    {
        try {
            $request->validate([
                'heading' => 'nullable|string|max:255',
                'description' => 'nullable|string',
                'banner_image' => 'required|image|mimes:jpg,jpeg,png|max:2048'
            ]);

            if (!$request->hasFile('banner_image')) {
                return back()->withErrors('Gambar tidak terkirim.');
            }

            $imagePath = $request->file('banner_image')->store('news-images', 'public');

            News::create([
                'heading' => $request->heading,
                'description' => $request->description,
                'banner_image' => $imagePath
            ]);

            return redirect()->back()->with('approved', 'News has been created.');
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors('Failed to create news.');
        }
    }


    public function updateNews(Request $request, string $id)
    {
        try {
            $request->validate([
                'heading' => 'nullable|string|max:255',
                'description' => 'nullable|string',
                'banner_image' => 'required|image|mimes:jpg,jpeg,png|max:2048'
            ]);

            $news = News::findOrFail($id);

            $data = [
                'heading' => $request->heading,
                'description' => $request->description,
            ];

            if ($request->hasFile('banner_image')) {
                $imagePath = $request->file('banner_image')->store('news-images', 'public');
                $data['banner_image'] = $imagePath;
            }

            $news->update($data);

            return redirect()->back()->with('approved', 'News has been updated.');
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors('Failed to update news.');
        }
    }


    public function deleteNews(string $id)
    {
        $news = News::findOrFail($id);

        if ($news->banner_image && Storage::disk('public')->exists($news->banner_image)) {
            Storage::disk('public')->delete($news->banner_image);
        }

        $news->delete();

        return redirect()->back()->with('approved', 'News has been deleted.');
    }
}
