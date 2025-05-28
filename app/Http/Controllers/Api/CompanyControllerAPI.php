<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\CompanyResource;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

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
        return new CompanyResource($company);
    }
    public function update(Request $request, string $id)
    {
        $company = Company::findOrFail($id);

        if (Auth::id() !== $company->creator && !(Auth::check() && Auth::user()->id_roles == 1) ) {
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
}