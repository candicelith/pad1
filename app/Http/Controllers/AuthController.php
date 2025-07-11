<?php

namespace App\Http\Controllers;

use Log;
use App\Models\User;
use App\Models\UserDetails;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class AuthController extends Controller
{
    /**
     * Inisiasi instansi AuthController
     */
    public function __construct()
    {
        $this->middleware('guest')->except([
            'logout',
            'profile',
            'registration',
            'create'
        ]);
    }

    public function registration()
    {
        return view('content.login-form');
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
                return redirect()->route('admin.home')->with('success', 'You Have Successfully Logged In as an Alumni!');
            } else if ($user->id_roles == '2') {
                return redirect()->route('alumni.profile')->with('success', 'Welcome back, Admin!');
            } else {
                return redirect()->route('mahasiswa.profile')->with('success', 'You Have Successfully Logged In!');
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
        $user = Auth::user();
        if ($user->id_roles == '1') {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect()->route('login-admin')->withSuccess('You Have Succesfully Logged Out!');
        }

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('profile')->withSuccess('You Have Succesfully Logged Out!');
    }

    public function create(Request $request)
    {
        // Get the authenticated user
        $user = Auth::user();
        $userDetails = UserDetails::where('id_users', $user->id_users)->first();

        // input validation
        $validationRules = ([
            'role' => 'required|in:student,alumni',
            'name' => 'required|string|max:255',
            'nim' => [
                    'required',
                    Rule::unique('user_details')->ignore($userDetails->id_userDetails, 'id_userDetails')
                ],
        ]);

        // Role Validation
        if ($request->input('role') === 'student') {
            $validationRules['entry_year'] = 'required|integer|min:2000|max:' . (date('Y'));
            $validationRules['graduate_year'] = 'nullable|integer|min:2000|max:' . (date('Y') + 5);
        } else if ($request->input('role') === 'alumni') {
            $validationRules['entry_year'] = 'required|integer|min:2000|max:' . (date('Y'));
            $validationRules['graduate_year'] = 'required|integer|min:2000|max:' . (date('Y'));
        }

        // Enforce that graduate_year must be equal to or after entry_year
        if ($request->filled('graduate_year') && $request->filled('entry_year')) {
            $validationRules['graduate_year'] .= '|gte:entry_year';
        }

        // Validate the input with the appropriate rules
        $validated = $request->validate($validationRules);


        // Determine role ID based on the selected role
        $roleId = ($request->input('role') === 'alumni') ? 2 : 3;

        // Update user role
        User::where('id_users', $user->id_users)->update([
            'id_roles' => $roleId
        ]);

        $profilePhotoFilename = null;
        $imageUrl = session('profile_photo'); // Assuming session contains the direct image URL

        if ($imageUrl) {
            try {
                $response = Http::get($imageUrl);
                if ($response->successful()) {
                    $imageContent = $response->body();

                    // Generate unique filename
                    $extension = pathinfo(parse_url($imageUrl, PHP_URL_PATH), PATHINFO_EXTENSION) ?: 'jpg';
                    $filename = 'profile_' . time() . '_' . Str::random(8) . '.' . $extension;

                    // Save to public/profile
                    Storage::disk('public')->put('profile/' . $filename, $imageContent);

                    $profilePhotoFilename = $filename;
                }
            } catch (\Exception $e) {
                Log::error('Failed to fetch image from session URL: ' . $e->getMessage());
            }
        }
        // Create user details
        $userDetails->update([
            'id_users' => $user->id_users,
            'name' => $request->name,
            'nim' => $request->nim,
            'entry_year' => $request->entry_year,
            'graduate_year' => $request->graduate_year,
            'profile_photo' => $profilePhotoFilename,
            'status' => "approved"
        ]);


        // Redirect based on role
        if ($roleId == 2) {
            return redirect()->route('alumni.profile')->with('success', 'Registration completed successfully!');
        } else {
            return redirect()->route('mahasiswa.profile')->with('success', 'Registration completed successfully!');
        }
    }
}
