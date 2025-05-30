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

        $user = User::firstOrCreate(
            ['email' => $googleUser->getEmail()],
            [
                'google_id' => $googleUser->getId(),
                'id_roles' => 3,
                'password' => Str::password(8),
                'email_verified_at' => now(),
            ]
        );

        if (!$user->google_id) {
            $user->google_id = $googleUser->getId();
            $user->save();
        }

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
            true  // httpOnly
        );

        // Keep your existing logic
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