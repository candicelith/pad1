<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Company;
use App\Models\Vacancy;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //get posts
        $posts = DB::table('vacancy')
            ->join('users', 'vacancy.id_users', '=', 'users.id_users')
            ->join('user_details', 'users.id_users', '=', 'user_details.id_users')
            ->join('company', 'vacancy.id_company', '=', 'company.id_company')
            ->select('vacancy.*', 'users.*', 'user_details.*', 'company.*')
            ->paginate(3);

        foreach ($posts as $post) {

            $dateOpen = Carbon::parse($post->date_open);
            $now = Carbon::now();
            $daysDifference = $dateOpen->diffInDays($now);

            if ($daysDifference < 1) {
                $post->date_difference = 'Today';
            } else {
                $post->date_difference = $daysDifference . ' days ago';
            }
        }

        // Get Company Name, Picture, and Total Employees Count
        $company = DB::table('company')
        ->join('jobs', 'company.id_company', '=', 'jobs.id_company')
        ->join('job_tracking', 'jobs.id_jobs', '=', 'job_tracking.id_jobs')
        ->join('user_details', 'job_tracking.id_userDetails', '=', 'user_details.id_userDetails')
        ->select(
            'company.id_company',
            'company.company_name',
            // set default company picture
            DB::raw("COALESCE(company.company_picture, 'https://picsum.photos/id/870/200/300?grayscale&blur=2') as company_picture"),
            // set employee_count
            DB::raw('count(distinct user_details.id_userDetails) as employee_count')
        )
        ->groupBy('company.id_company', 'company.company_name', 'company.company_picture')
        ->orderBy('employee_count', 'desc')
        ->paginate(10);


        return view('content.home', compact('posts', 'company'));
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
