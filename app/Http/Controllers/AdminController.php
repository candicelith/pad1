<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Inisiasi instansi AuthController
     */
    public function __construct()
    {
        $this->middleware('admin')->except([
            // add later.
        ]);
    }
    public function index()
    {
        $admin = Auth::user();
        return view('content.admin-home',compact('admin'));
    }

    public function show()
    {
        $admin = Auth::user();
        return view('content.admin-profile',compact('admin'));
    }
}
