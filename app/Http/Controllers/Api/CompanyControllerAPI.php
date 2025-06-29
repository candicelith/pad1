<?php

namespace App\Http\Controllers\API;

use App\Models\Company;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\CompanyResource;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Cache; //


class CompanyControllerAPI extends Controller
{

    public function index()
    {
        $companies = Company::where('status', 'approved')->paginate(15);
        return CompanyResource::collection($companies);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'company_name' => 'required|string|max:255|unique:company,company_name',
            'company_field' => 'required|string|max:255',
            'company_description' => 'required|string',
            'company_phone' => 'nullable|string|max:20', // Sesuaikan validasi nomor telepon jika perlu
            'company_address' => 'nullable|string|max:255',
            'company_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // max 2MB
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $data = $validator->validated();
        $data['status'] = 'pending'; // Perusahaan baru akan berstatus pending
        $data['creator'] = Auth::id(); // Menggunakan Auth::id() untuk mendapatkan ID pengguna yang terotentikasi

        if ($request->hasFile('company_picture')) {
            $file = $request->file('company_picture');
            $filename = Str::slug($data['company_name']) . '_' . time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('public/company', $filename);
            $data['company_picture'] = $filename;
        } else {
            $data['company_picture'] = 'default_company.png'; // Sesuaikan jika ada gambar default
        }

        $company = Company::create($data);

        return new CompanyResource($company);
    }
    public function show(string $id)
    {
        $company = Company::where('status', 'approved')->findOrFail($id);

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
            ->where('company.id_company', '=', $id) // filter by company ID
            ->orderBy('user_details.name', 'asc')   // Optional: order workers by name
            ->paginate(10);
        return response()->json([
            "message" => "Succesfuly Fetched Company Data!",
            "company" => $company,
            "workers" => $workers,
        ], 200);
    }

    public function update(Request $request, string $id)
    {
        $company = Company::findOrFail($id);

        if (Auth::id() !== $company->creator && !(Auth::check() && Auth::user()->id_roles == 1)) {
            return response()->json(['message' => 'Forbidden. You do not have permission to update this company.'], 403);
        }

        $validator = Validator::make($request->all(), [
            'company_name' => 'required|string|max:255|unique:company,company_name,' . $company->id_company . ',id_company',
            'company_field' => 'required|string|max:255',
            'company_description' => 'required|string',
            'company_phone' => 'nullable|string|max:20',
            'company_address' => 'nullable|string|max:255',
            'company_website' => 'nullable|url|max:255',
            'company_email' => 'nullable|email|max:255',
            'company_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'sometimes|in:pending,approved,rejected'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $data = $validator->validated();

        // Hanya admin yang bisa mengubah status secara langsung melalui API ini
        if (isset($data['status']) && !(Auth::check() && Auth::user()->id_roles == 1)) {
            unset($data['status']); // Hapus field status jika bukan admin
        } elseif (Auth::check() && Auth::user()->id_roles == 1 && !isset($data['status'])) {
            // Jika admin dan status tidak di-set, pertahankan status lama
            $data['status'] = $company->status;
        } elseif (Auth::id() === $company->creator && $company->status === 'approved') {
            // Jika creator mengedit perusahaan yang sudah approved, kembalikan statusnya ke pending
            $data['status'] = 'pending';
        }


        if ($request->hasFile('company_picture')) {
            // Hapus gambar lama jika ada dan bukan gambar default
            if ($company->company_picture && $company->company_picture !== 'default_company.png' && Storage::exists('public/company/' . $company->company_picture)) {
                Storage::delete('public/company/' . $company->company_picture);
            }
            $file = $request->file('company_picture');
            $filename = Str::slug($data['company_name']) . '_' . time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('public/company', $filename);
            $data['company_picture'] = $filename;
        }

        $company->update($data);

        return new CompanyResource($company);
    }
    public function destroy(string $id)
    {
        $company = Company::findOrFail($id);

        // Kebijakan: Hanya pembuat atau admin yang bisa menghapus
        if (Auth::id() !== $company->creator && !(Auth::check() && Auth::user()->id_roles == 1)) {
            return response()->json(['message' => 'Forbidden. You do not have permission to delete this company.'], 403);
        }

        // Hapus gambar dari storage jika ada dan bukan default
        if ($company->company_picture && $company->company_picture !== 'default_company.png' && Storage::exists('public/company/' . $company->company_picture)) {
            Storage::delete('public/company/' . $company->company_picture);
        }

        $company->delete();

        return response()->json(['message' => 'Company successfully deleted.'], 200);
    }
    public function getTopCompany()
    {

        // Define how long to keep the cache in seconds (e.g., 3600 seconds = 1 hour)
        $cacheDuration = 3600;

        // Define a unique key for this cache entry
        $cacheKey = 'home_page_top_companies';

        $companies = Cache::remember($cacheKey, $cacheDuration, function () {

            return DB::table('company')
                ->join('jobs', 'company.id_company', '=', 'jobs.id_company')
                ->join('job_tracking', 'jobs.id_jobs', '=', 'job_tracking.id_jobs')
                ->join('user_details', 'job_tracking.id_userDetails', '=', 'user_details.id_userDetails')
                ->select(
                    'company.id_company',
                    'company.company_name',
                    DB::raw("COALESCE(company.company_picture, 'https://picsum.photos/id/870/200/300?grayscale&blur=2') as company_picture"),
                    DB::raw('count(distinct user_details.id_userDetails) as employee_count')
                )
                ->groupBy('company.id_company', 'company.company_name', 'company.company_picture')
                ->orderBy('employee_count', 'desc')
                ->paginate(5);

        });
        return response()->json([
            'message' => 'Successfully fetched posts and companies',
            'data' => $companies
        ]);
    }
}

