<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserDetails;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleAuthController extends Controller
{
    public function redirect()
    {
        return Socialite::driver("google")->redirect();
    }

    public function callback()
    {
        $googleUser = Socialite::driver("google")->user();

        // Email Validation
        $email = $googleUser->getEmail();
        $allowedDomains = ['mail.ugm.ac.id', 'ugm.ac.id']; // Current Allowed Domains
        $domain = substr(strrchr($email, "@"), 1);

        if (!in_array($domain, $allowedDomains)) {
            Auth::logout();
            return redirect()->route('login')->with('error', 'Login failed. Please use a valid UGM email address.');
        }
        $user = User::firstOrCreate(
            ['email' => $googleUser->getEmail()],
            [
                'google_id' => $googleUser->getId(),
                'id_roles' => 3, // only used if user is new
                'password' => Str::password(8),
                'email_verified_at' => now(),
            ]
        );

        // If the user exists, you might want to update google_id or email_verified_at, but not the role
        if (!$user->google_id) {
            $user->google_id = $googleUser->getId();
            $user->save();
        }

        // Check if user details exist
        $userDetails = UserDetails::where('id_users', $user->id_users)->first();

        // NEW: Create token instead of just using Auth::login()
        $token = $user->createToken('web-session')->plainTextToken;

        // Store token in secure cookie
        cookie()->queue(
            'auth_token',
            $token,
            60 * 24, // 24 hours
            '/',
            null,
            true, // secure
            false  // httpOnly
         );
        // Log in the user
        Auth::login($user);

        // If user details don't exist, redirect to registration page
        if ($userDetails->status == 'pending') {
            session()->put('email', $googleUser->getEmail());
            session()->put('name', $googleUser->getName());
            session()->put('profile_photo', $googleUser->getAvatar());

            session()->put('userDetails', $userDetails);
            return redirect()->route('registration');
        }
        return redirect()->intended('/');
    }
}