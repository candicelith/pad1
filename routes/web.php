<?php

use App\Models\Vacancy;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AlumniController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Middleware\Alumni;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/detailpost', function () {
    return view('content.detailpost');
})->name('detailpost');

Route::get('/postalumni', function () {
    return view('content.posts-alumni');
})->name('postalumni');

Route::get('/createpost', function () {
    return view('content.createpost');
})->name('createpost');

Route::get('/profilealumni', function () {
    return view('content.profile-alumni');
})->name('profilealumni');

Route::get('/editprofile', function () {
    return view('content.editprofile');
})->name('editprofile');

// Index
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/posts', [PostController::class, 'index'])->name('posts');
Route::get('/alumni', [AlumniController::class, 'index'])->name('alumni');
Route::get('/companies', [CompanyController::class, 'index'])->name('companies');


// Login
Route::controller(AuthController::class)->group(function(){
    Route::get('/login','login')->name('login');
    Route::post('/authenticate','authenticate')->name('authenticate');
    Route::post('/logout','logout')->name('logout');
    Route::get('/profile','profile')->name('profile');
});

// Mahasiswa
Route::controller(MahasiswaController::class)->group(function(){
    Route::get('/profile/mahasiswa','profile')->name('mahasiswa.profile');
});

// Alumni
Route::controller(AlumniController::class)->group(function(){
    Route::get('/profile/alumni','profile')->name('alumni.profile');
    Route::get('/profile/show','show')->name('alumni.show-profile');
    Route::get('/profile/edit','show')->name('alumni.edit-profile');
});

