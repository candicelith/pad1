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

        $user = User::updateOrCreate(
            ['google_id' => $googleUser->id],
            [
                'email' => $googleUser->email,
                'id_roles' => 2,
                'password' => Str::password(8),
                'email_verified_at' => now(),
            ]
        );

        // UserDetails::updateOrCreate([
        //     'id_users' => $user->id_users,
        //     'name' => $googleUser->getName(),
        //     'nim' => "23/696969/SV/55555", // Not Have
        //     'graduate_year' => 2019, // Not Have
        //     'profile_photo' => $googleUser->getAvatar(),
        //     'modifiedBy' => $googleUser->getName()
        // ]);


        Auth::login($user);
        return redirect()->intended('/');
    }
}
