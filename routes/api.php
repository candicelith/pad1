<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Api\PostControllerAPI;
use App\Http\Controllers\ApiAdminControllerAPI;
use App\Http\Controllers\Api\CommentControllerAPI;
use App\Http\Controllers\Api\AuthControllerAPI;
use App\Http\Controllers\Api\NewsControllerAPI;
use App\Http\Controllers\Api\UserControllerAPI;
use App\Http\Controllers\Api\CompanyControllerAPI;
use App\Http\Controllers\Api\UserExperiencesControllerAPI;
use App\Http\Controllers\Api\PostRegistrationControllerAPI;
use App\Http\Controllers\CompanyController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Fetch Alumni Data By Graduate Count
Route::get('/alumni-data', [AdminController::class, 'getChartData']);

// Rute Publik
Route::get('/home/top-company',[CompanyControllerAPI::class,'getTopCompany']);

Route::get('/news', [NewsControllerAPI::class, 'index']);
Route::get('/news/{news}', [NewsControllerAPI::class, 'show']);

Route::get('/companies', [CompanyControllerAPI::class, 'index']);
Route::get('/companies/{company}', [CompanyControllerAPI::class, 'show']);

// Rute Otentikasi
// Option 1: Email/Password Login (untuk Postman)
Route::post('/auth/login', [AuthControllerAPI::class, 'apiLogin']);
Route::post('/auth/register', [AuthControllerAPI::class, 'apiRegister']); // Set password
Route::post('/auth/check-email', [AuthControllerAPI::class, 'checkEmail']);

// Rute yang Memerlukan Otentikasi (Sanctum)
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/auth/logout', [AuthControllerAPI::class, 'logout']);
    Route::get('/auth/user', [AuthControllerAPI::class, 'me']); // Mendapatkan user yang terotentikasi

    // Company (jika create, update, delete butuh login)
    Route::post('/companies', [CompanyControllerAPI::class, 'store']);
    Route::put('/companies/{company}', [CompanyControllerAPI::class, 'update']);
    Route::delete('/companies/{company}', [CompanyControllerAPI::class, 'destroy']);

    // User
    Route::get('/users', [UserControllerAPI::class, 'index']); // Daftar semua user (hanya admin)
    Route::put('/users/{user}', [UserControllerAPI::class, 'update']); // Update profil sendiri

    Route::get('/users/alumni', [UserControllerAPI::class, 'listAlumni']); // Daftar alumni (approved)
    Route::get('/users/mahasiswa', [UserControllerAPI::class, 'listMahasiswa']); // Daftar mahasiswa (approved)
    Route::get('/users/{user}', [UserControllerAPI::class, 'show']); // Detail user (dengan logic otorisasi siapa boleh lihat siapa)

    // User Experiences (Alumni)
    Route::get('/users/{user}/experiences', [UserExperiencesControllerAPI::class, 'index']);
    Route::post('/users/{user}/experiences', [UserExperiencesControllerAPI::class, 'store']);
    Route::put('/experiences/{experience}', [UserExperiencesControllerAPI::class, 'update']);
    Route::delete('/experiences/{experience}', [UserExperiencesControllerAPI::class, 'destroy']);


    // Comments
    Route::get('/posts/{post}/comments', [CommentControllerAPI::class, 'index']); // Komentar untuk lowongan
    Route::post('/posts/{post}/comments', [CommentControllerAPI::class, 'store']);
    Route::put('/comments/{comment}', [CommentControllerAPI::class, 'update']);
    Route::delete('/comments/{comment}', [CommentControllerAPI::class, 'destroy']);


    // // Rute Khusus Admin (dengan middleware admin)
    // Route::prefix('admin')->middleware(['auth:sanctum', 'admin'])->group(function () { // isAdmin adalah middleware custom
    //     Route::get('/users', [AdminControllerAPI::class, 'listAllUsers']);
    //     Route::post('/users/{user}/approve', [AdminControllerAPI::class, 'approveUser']);
    //     Route::post('/companies/{company}/approve', [AdminControllerAPI::class, 'approveCompany']);
    //     Route::post('/companies/{company}/reject', [AdminControllerAPI::class, 'rejectCompany']);
    //     Route::get('/dashboard/stats', [AdminControllerAPI::class, 'getDashboardStats']);

    //     // News (jika create, update, delete butuh login)
    //     Route::post('/news', [NewsControllerAPI::class, 'store']);
    //     Route::put('/news/{news}', [NewsControllerAPI::class, 'update']);
    //     Route::delete('/news/{news}', [NewsControllerAPI::class, 'destroy']);
    //     });
});

