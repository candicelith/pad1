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

        // Update or create the user
        $user = User::updateOrCreate(
            ['email' => $googleUser->getEmail()],
            [
                'google_id' => $googleUser->getId(),
                'id_roles' => 3, // Default to student role
                'password' => Str::password(8),
                'email_verified_at' => now(),
            ]
        );

        // Check if user details exist
        $userDetails = UserDetails::where('id_users', $user->id_users)->first();

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