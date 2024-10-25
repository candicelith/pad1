<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function profile()
    {
        if (Auth::check()) {
            return redirect()->route('profile')->with('success','You Have Succesfully Logged In!');
        }
        return view('content.login');
    }
}
