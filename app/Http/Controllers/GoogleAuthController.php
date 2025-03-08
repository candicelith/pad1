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
            ['google_id' => $googleUser->getId()],
            [
                'email' => $googleUser->getEmail(),
                'id_roles' => 2,
                'password' => Str::password(8),
                'email_verified_at' => now(),
            ]
        );

            // Only create a new user detail if it doesn't exist
            UserDetails::updateOrcreate([
                'id_users' => $user->id_users,
                'name' => $googleUser->getName(),
                // 'nim' => "23/696969/SV/55555", // Default value
                'graduate_year' => 2019, // Default value
                'profile_photo' => $googleUser->getAvatar(),
                'modifiedBy' => $googleUser->getName(),
            ]);



        // Log in the user
        Auth::login($user);

        // Redirect to the intended page
        return redirect()->intended('/');
    }
}
