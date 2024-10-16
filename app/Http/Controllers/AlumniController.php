<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Termwind\Components\Dd;

class AlumniController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $alumnis = DB::table('roles')
                        ->join('users','roles.id_roles','=','users.id_roles')
                        ->join('user_details','users.id_users','=','user_details.id_users')
                        ->join('job_tracking','user_details.id_userDetails','=','job_tracking.id_userDetails')
                        ->select('users.*','user_details.*','job_tracking.*')
                        ->where('roleName','=','Alumni')
                        ->get();

        // $current_job =  DB::table('roles')
        //                     ->join('users','roles.id_roles','=','users.id_roles')
        //                     ->join('user_details','users.id_users','=','user_details.id_users')
        //                     ->join('job_tracking','user_details.id_userDetails','=','job_tracking.id_userDetails')
        //                     ->select('users.*','user_details.*','job_tracking.*')
        //                     ->where('roleName','=','Alumni')
        //                     ->where('status','=','Active')
        //                     ->get();


        return view('content.alumni',compact('alumnis'));
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
