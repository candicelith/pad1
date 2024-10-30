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

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email'=> 'required|email',
            'password'=> 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('profile')->withSuccess('You Have Succesfully Logged In!');
        }

        return back()->withErrors([
            'email' => 'Your Provided Credentials do not match in our Records.'
        ])->onlyInput('email');
    }
}
