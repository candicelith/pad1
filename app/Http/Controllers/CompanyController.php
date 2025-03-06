<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\CompanyResource;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $company = Company::paginate(10);
        return view('content.companies', compact('company'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('content.create_companies');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'company_name'=>'required|string|max:255',
            'company_field'=>'required|string|max:255',
            'company_description'=>'required|string|max:255',
            'company_phone'=>['/^(?:\+62|62|0)8[1-9][0-9]{6,11}$/','max:255'],
            'company_address'=>'string|max:255',
            'company_picture' => 'string|max:255'
        ]);

        $company = Company::create([
            'company_name'=> $request->company_name,
            'company_field'=> $request->company_field,
            'company_description'=> $request->company_description,
            'company_phone'=> $request->company_phone,
            'company_address'=> $request->company_address,
            'company_picture' => $request->company_picture,
        ]);

        return response()->json([
            "message" => "Succesfully Created a Company!",
            "company" => new CompanyResource($company)
        ],201);
    }

    /**
     * Display the specified resource.
     */
    public function show(String $id)
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
            ->where('company.id_company', '=', $id) // filter by company ID
            ->orderBy('user_details.name', 'asc')   // Optional: order workers by name
            ->paginate(10);


        return view('content.detailcompanies', compact('company','workers'));
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
            'company_name'=>'required|string|max:255',
            'company_field'=>'required|string|max:255',
            'company_description'=>'required|string|max:255',
            'company_phone'=>['/^(?:\+62|62|0)8[1-9][0-9]{6,11}$/','max:255'],
            'company_address'=>'string|max:255',
            'company_picture' => 'string|max:255'
        ]);

        $company = Company::findOrFail($id);
        $company->update([
            'company_name'=> $request->company_name,
            'company_field'=> $request->company_field,
            'company_description'=> $request->company_description,
            'company_phone'=> $request->company_phone,
            'company_address'=> $request->company_address,
            'company_picture' => $request->company_picture,
        ]);

        return response()->json([
            "message" => "Succesfully Updated The Company!",
            "company" => new CompanyResource($company)
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $company = Company::findOrFail($id);

        $company->delete();

        return response()->json([
            'message' => 'Successfully deleted the company!',
        ], 200);
    }
}
