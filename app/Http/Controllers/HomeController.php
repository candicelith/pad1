<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Vacancy;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Vacancy::paginate(3);
        $company = Company::all();

        // Count currently active employees
        $activeEmployees = DB::table('job_tracking as jt')
            ->join('jobs as j', 'jt.id_jobs', '=', 'j.id_jobs')
            ->join('company as c', 'j.id_company', '=', 'c.id_company')
            ->select('c.company_name', DB::raw('COUNT(*) as activeEmployees'))
            ->whereNull('jt.date_end')
            ->orWhere('jt.date_end', '>', now())
            ->groupBy('c.company_name')
            ->get();

        // Count all employees who were ever active
        $totalEmployees = DB::table('job_tracking as jt')
            ->join('jobs as j', 'jt.id_jobs', '=', 'j.id_jobs')
            ->join('company as c', 'j.id_company', '=', 'c.id_company')
            ->select('c.company_name', DB::raw('COUNT(*) as totalEmployees'))
            ->groupBy('c.company_name')
            ->get();

        $testjob = Job::with([
            'company','jobTrackings'
        ]) ->get();

        // dd($testjob);

        return view('content.home', compact('posts','company','activeEmployees','totalEmployees','testjob'));
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
    public function show(string $id)
    {
        //
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
