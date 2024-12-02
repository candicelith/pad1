<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Inisiasi instansi AuthController
     */
    public function __construct()
    {
        $this->middleware('guest')->except([
            'logout',
            'profile'
        ]);
    }

    public function login()
    {
        return view('content.login');
    }

    public function profile()
    {
        if (Auth::check()) {
            return view('content.profile');
        }
        return redirect()->route('login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Check user role and redirect accordingly
            $user = Auth::user();
            if ($user->id_roles == '1') {
                return redirect()->route('admin.home')->with('success','You Have Successfully Logged In as an Alumni!');
            } else if($user->id_roles == '2') {
                return redirect()->route('alumni.profile')->with('success','Welcome back, Admin!');
            } else{
                return redirect()->route('mahasiswa.profile')->with('success','You Have Successfully Logged In!');
            }
        }
        return back()->withErrors([
            'email' => 'Your Provided Credentials do not match in our Records.'
        ])->onlyInput('email');
    }


    /**
     * Melakukan Operasi Logout Oleh Pengguna
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('profile')->withSuccess('You Have Succesfully Logged Out!');;
    }
}
