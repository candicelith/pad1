<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class MahasiswaController extends Controller
{

    /**
     * Inisiasi instansi AuthController
     */
    public function __construct()
    {
        $this->middleware('mahasiswa')->except([
            'profile'
        ]);
    }
    /**
     * Get Mahasiswa Profile
     */
    public function profile()
    {
        if (Auth::check()) {
            $user = Auth::user();
            $userDetails = $user->userDetails;

            if ($user->id_roles == '3') {
                return view('content.profile', compact('user', 'userDetails'));
            }
        }
        return redirect()->route('login');
    }
}
