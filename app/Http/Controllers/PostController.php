<?php

namespace App\Http\Controllers;

use App\Models\Vacancy;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {


        // $vacancys = Vacancy::with(['user.userDetails','company'])->get();
        $vacancys = DB::table('vacancy')
                    ->join('users', 'vacancy.id_users', '=', 'users.id_users')
                    ->join('user_details', 'users.id_users', '=', 'user_details.id_users')
                    ->join('company', 'vacancy.id_company', '=', 'company.id_company')
                    ->select(
                        'vacancy.*',
                        'users.*',
                        'user_details.*',
                        'company.*',
                        DB::raw("COALESCE(user_details.profile_photo, 'https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/jese-leos.png') as profile_photo"))
                    ->paginate(10);

        foreach ($vacancys as $vc) {

            $dateOpen = Carbon::parse($vc->date_open);
            $now = Carbon::now();
            $daysDifference = $dateOpen->diffInDays($now);

            if ($daysDifference < 1) {
                $vc->date_difference = 'Today';
            }else{
                $vc->date_difference = $daysDifference . ' days ago';
            }
        }


        return view('content.posts',compact('vacancys'));
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
