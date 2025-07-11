<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Support\Str;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\CompanyResource;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $company = Company::where('status', '!=', 'pending')->paginate(50);

        if ($request->expectsJson()) {
            return response()->json([
                "message" => "Succesfully Fetched All Companies!",
                "company" => CompanyResource::collection($company)
            ], 200);
        }
        return view('content.companies', compact('company'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('content.companies-create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'company_name' => 'required|string|max:255',
            'company_field' => 'required|string|max:255',
            'company_description' => 'required|string|max:255',
            'company_phone' => ['/^(?:\+62|62|0)8[1-9][0-9]{6,11}$/', 'max:255'],
            'company_address' => 'nullable|string|max:255',
            'company_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:4096',
            'company_gallery' => 'nullable|array|max:5',
            'company_gallery.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:4096', // Validate each gallery image
        ]);

        Notification::create([
            'id_users' => Auth::user()->id_users, // ID of the user being notified
            'type' => 'pending_approval',
            'message' => 'Penambahan Data Companies Sedang di Verifikasi oleh Admin. Mohon tunggu konfirmasi lebih lanjut.',
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
            'company_phone' => $request->company_phone,
            'company_address' => $request->company_address,
            'company_picture' => $companyPicture ?? null,
            'company_gallery' => $galleryPaths, // ✅ now it's always passed
            'creator' => Auth::user()->id_users,
        ]);

        if ($request->expectsJson()) {
            return response()->json([
                "message" => "Successfully Created a Company!",
                "company" => new CompanyResource($company)
            ], 201);
        }

        return redirect()->route('alumni.profile')->with('success', 'Company successfully created and is awaiting approval.!');
    }
    public function storeAjax(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'company_name' => 'required|string|max:255|unique:company,company_name',
            'company_field' => 'required|string|max:255',
            'company_description' => 'required|string|max:255',
            'company_address' => 'string|max:255',
            'company_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:4096',
            'company_gallery' => 'nullable|array|max:5',
            'company_gallery.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:4096',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        try {
            $companyData = $validator->validated(); // Get validated data
            $companyData['status'] = 'pending'; // Auto-approve for AJAX creation via experience form
            $companyData['creator'] = Auth::id();

            if ($request->hasFile('company_picture')) {
                $file = $request->file('company_picture');
                $filenameSimpan = time() . '_' . Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $file->getClientOriginalExtension();
                $file->storeAs('public/company', $filenameSimpan);
                $companyData['company_picture'] = $filenameSimpan;
            } else {
                $companyData['company_picture'] = 'default_company.png';
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
            $companyData['company_gallery'] = $galleryPaths;
            $company = Company::create($companyData);

            return response()->json([
                'success' => true, // Added for clarity on frontend
                'message' => 'Company created successfully and selected!',
                'company' => [
                    'id_company' => $company->id_company, // Or $company->id if your primary key is just 'id' but model maps to id_company
                    'company_name' => $company->company_name,
                ]
            ], 201);

        } catch (\Exception $e) {
            // Log::error('Company AJAX store error: ' . $e->getMessage());
            return response()->json(['message' => 'Failed to create company: ' . $e->getMessage()], 500);
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
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


        return view('content.detailcompanies', compact('company', 'workers'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('content.company_edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'company_name' => 'required|string|max:255',
            'company_field' => 'required|string|max:255',
            'company_description' => 'required|string|max:255',
            'company_phone' => ['/^(?:\+62|62|0)8[1-9][0-9]{6,11}$/', 'max:255'],
            'company_address' => 'nullable|string|max:255',
            'company_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:4096',
            'company_gallery.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:4096',
            'company_gallery' => 'nullable|array|max:10',
            'deleted_images' => 'nullable|array', // To handle deletion of existing images
            'deleted_images.*' => 'nullable|string' // Each item is a filename string
        ]);

        Notification::create([
            'id_users' => Auth::user()->id_users, // ID of the user being notified
            'type' => 'pending_approval',
            'message' => 'Perubahan Data Companies Sedang di Verifikasi oleh Admin. Mohon tunggu konfirmasi lebih lanjut.',
        ]);

        $company = Company::findOrFail($id);

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

        // --- GALLERY UPDATE LOGIC ---
        $currentGallery = $company->company_gallery ?? [];

        // 1. Delete images marked for deletion
        if ($request->has('deleted_images')) {
            $imagesToDelete = $request->input('deleted_images');
            foreach ($imagesToDelete as $imageName) {
                Storage::delete('public/company/gallery/' . $imageName);
                // Remove from current gallery array
                $currentGallery = array_diff($currentGallery, [$imageName]);
            }
        }

        // 2. Add new images
        if ($request->hasFile('company_gallery')) {
            foreach ($request->file('company_gallery') as $galleryFile) {
                $filename = time() . '_' . Str::slug($galleryFile->getClientOriginalName()) . '.' . $galleryFile->getClientOriginalExtension();
                $galleryFile->storeAs('public/company/gallery', $filename);
                $currentGallery[] = $filename;
            }
        }
        $company->update([
            'company_name' => $request->company_name,
            'company_field' => $request->company_field,
            'company_description' => $request->company_description,
            'company_phone' => $request->company_phone,
            'company_address' => $request->company_address,
            'company_picture' => $request->company_picture ?? 'https://picsum.photos/id/870/200/300?grayscale&blur=2',
            'company_gallery' => array_values($currentGallery), // Re-index the array
            'creator' => Auth::user()->id_users
        ]);

        return response()->json([
            "message" => "Succesfully Updated The Company!",
            "company" => new CompanyResource($company)
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $company = Company::findOrFail($id);

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

        return response()->json([
            'message' => 'Successfully deleted the company!',
        ], 200);
    }

    public function detailApproval(string $id)
    {
        $company = Company::findOrFail($id);
        return view('content.admin-detail-company', compact('company'));
    }

    // Method to approve a company
    public function approveCompany(string $id) // Using route model binding
    {
        $company = Company::findOrFail($id);
        if ($company->status === 'pending') {
            $company->status = 'approved';
            $company->rejection_reason = null;
            $company->save();

            if (!$company->creator) {
                return redirect()->route('admin.home')->with('success', "Company '{$company->company_name}' approved.");
            }

            Notification::create([
                'id_users' => $company->creator,
                'type' => 'approved',
                'message' => 'Company Anda berhasil diverifikasi. Data telah ditambahkan!.',
            ]);

            return redirect()->route('admin.home')->with('approved', "Company '{$company->company_name}' approved.");
        }
        return redirect()->route('admin.home')->with('rejected', "Company '{$company->company_name}' is not pending approval.");
    }

    // Method to reject a company
    public function rejectCompany(Request $request, string $id) // Using route model binding
    {
        $request->validate(['rejection_reason' => 'nullable|string|min:5|max:500']);

        $company = Company::findOrFail($id);

        if ($company->status === 'pending') {
            $company->status = 'rejected';
            $company->rejection_reason = $request->rejection_reason ?? '"Company Data Not Credibles"';

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

            Notification::create([
                'id_users' => $company->creator,
                'type' => 'rejected',
                'message' => "Data Anda Tidak Berhasil diverifikasi, Alasan: $company->rejection_reason.",
            ]);

            foreach ($company->jobs as $job) {
                $job->jobTracking()->delete();
            }
            $company->jobs()->delete();
            $company->delete();
            return redirect()->route('admin.home')->with('rejected', "Company '{$company->company_name}' rejected.");
        }
        return redirect()->route('admin.home')->with('rejected', "Company '{$company->company_name}' is not pending approval.");
    }

}
