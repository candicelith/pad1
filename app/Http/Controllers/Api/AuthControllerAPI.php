<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class AuthControllerAPI extends Controller
{
    /**
     * API Login dengan Email/Password untuk Postman
     */
    public function apiLogin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }

        // Cek apakah user ada di database
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return response()->json([
                'error' => 'User not found',
                'message' => 'Email not registered. Please register first via web interface.'
            ], 404);
        }

        // Verifikasi password
        if (!Hash::check($request->password, $user->password)) {
            return response()->json([
                'error' => 'Invalid credentials',
                'message' => 'Wrong password'
            ], 401);
        }

        // Cek status user
        $userDetails = UserDetails::where('id_users', $user->id_users)->first();
        if ($userDetails && $userDetails->status !== 'approved') {
            return response()->json([
                'error' => 'Account not approved',
                'message' => 'Your account is still pending approval',
                'status' => $userDetails->status ?? 'pending'
            ], 403);
        }

        // Generate API token
        $token = $user->createToken('api-token')->plainTextToken;

        return response()->json([
            'success' => true,
            'message' => 'Login successful',
            'token' => $token,
            'expires_in' => '24 hours',
            'user' => [
                'id' => $user->id_users,
                'email' => $user->email,
                'role_id' => $user->id_roles,
                'google_id' => $user->google_id,
            ],
            'user_details' => $userDetails
        ]);
    }

    /**
     * API Register - Buat password untuk user yang sudah ada dari Google OAuth
     */
    public function apiRegister(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users,email',
            'password' => 'required|string|min:6|confirmed',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }

        $user = User::where('email', $request->email)->first();

        // Update password untuk user yang sudah ada
        $user->password = Hash::make($request->password);
        $user->save();

        return response()->json([
            'success' => true,
            'message' => 'Password set successfully. You can now login via API.',
            'user' => [
                'id' => $user->id_users,
                'email' => $user->email,
                'role_id' => $user->id_roles,
            ]
        ]);
    }

    /**
     * Check apakah email sudah terdaftar
     */
    public function checkEmail(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => 'Invalid email format'
            ], 422);
        }

        $user = User::where('email', $request->email)->first();
        $userDetails = $user ? UserDetails::where('id_users', $user->id_users)->first() : null;

        if (!$user) {
            return response()->json([
                'exists' => false,
                'message' => 'Email not registered',
                'action_required' => 'Please register via web interface first'
            ]);
        }

        // Cek apakah user punya password untuk API
        $hasApiPassword = !empty($user->password) && $user->password !== Hash::make('');

        return response()->json([
            'exists' => true,
            'has_api_password' => $hasApiPassword,
            'user_status' => $userDetails->status ?? 'pending',
            'user' => [
                'id' => $user->id_users,
                'email' => $user->email,
                'role_id' => $user->id_roles,
                'has_google_auth' => !empty($user->google_id),
            ],
            'message' => $hasApiPassword
                ? 'User can login via API'
                : 'User needs to set password for API access'
        ]);
    }
    public function me(Request $request)
    {
        $user = $request->user();
        $userDetails = UserDetails::where('id_users', $user->id_users)->first();

        return response()->json([
            'user' => [
                'id' => $user->id_users,
                'email' => $user->email,
                'role_id' => $user->id_roles,
                'google_id' => $user->google_id,
            ],
            'user_details' => $userDetails
        ]);
    }

    public function logout(Request $request)
    {
        $token = $request->bearerToken();
        if ($token) {
            cache()->forget($token);
            return response()->json(['message' => 'API token revoked successfully']);
        }

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return response()->json(['message' => 'Successfully logged out']);
    }
}
