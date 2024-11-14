<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $company = DB::table('company')
            ->select(
                'company.*',
                DB::raw("COALESCE(company.company_picture, 'https://picsum.photos/id/870/200/300?grayscale&blur=2') as company_picture")
            )
            ->get(10);

        return view('content.companies', compact('company'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(String $id)
    {
        $company = DB::table('company')
            ->select(
                'company.*',
                DB::raw("COALESCE(company.company_picture, 'https://picsum.photos/id/870/200/300?grayscale&blur=2') as company_picture")
            )
            ->where('company.id_company', $id)
            ->first();


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
                DB::raw('COALESCE(user_details.profile_photo, "https://www.gravatar.com/avatar/2c7d99fe281ecd3bcd65ab915bac6dd5?s=250") as profile_photo')
                )
            ->where('company.id_company', '=', $id) // filter by company ID
            ->orderBy('user_details.name', 'asc')   // Optional: order workers by name
            ->paginate(10);


        // dd($workers);
        return view('content.detailcompanies', compact('company','workers'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
