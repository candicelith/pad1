<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Inisiasi instansi AuthController
     */
    public function __construct()
    {
        $this->middleware('admin')->except([
            'getChartData'
        ]);
    }
    public function index()
    {
        $admin = Auth::user();
        return view('content.admin-home', compact('admin'));
    }

    public function show()
    {
        $admin = Auth::user();
        return view('content.admin-profile', compact('admin'));
    }

    public function store(Request $request)
    {
        // $request->validate([
        //     'name' => 'required|string|max:255',
        //     'nim' => 'required|string',
        //     'email' => 'required|email',
        // ]);

        // // Extract the 'nim_part' (i.e., the middle portion of NIM)
        // $nimPart = $this->getNimPart($request->nim);

        // User::create([
        //     'email' => $request->email,
        //     'password' => Hash::make($nimPart),
        //     'nim' => $request->nim
        // ]);

        return view('content.admin-alumni');
    }

    // Helper function to extract the nim_part from the NIM
    private function getNimPart($nim)
    {
        // Extract the middle part of the NIM, e.g., 523246 from '23/523246/SV/23875'
        $parts = explode('/', $nim); // Split the NIM by '/'
        return $parts[1]; // Return the second part
    }

    public function getAlumni()
    {
        $alumni = User::join('user_details', 'users.id_users', '=', 'user_details.id_users')
            ->select(
                'users.*',
                'user_details.*',
                DB::raw("SUBSTRING_INDEX(SUBSTRING_INDEX(NIM, '/', 2), '/', -1) as nim_part"),
            )
            ->whereRaw('id_roles = ?', [2])
            ->get();

        return view('content.admin-alumni', compact('alumni'));
    }

    public function getChartData()
    {
        $queryData = DB::table('user_details')
            ->selectRaw('graduate_year AS x, COUNT(*) AS y')
            ->groupBy('graduate_year')
            ->orderBy('graduate_year')
            ->get();

        return response()->json($queryData); // Return data as JSON for frontend
    }
}
