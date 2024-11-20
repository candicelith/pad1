<?php

use App\Models\Vacancy;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AlumniController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
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

// Route::get('/detailpost', function () {
//     return view('content.detailpost');
// })->name('detailpost');

Route::get('/detailalumni', function () {
    return view('content.detailalumni');
})->name('detailalumni');

Route::get('/postalumni', function () {
    return view('content.posts-alumni');
})->name('postalumni');

Route::get('/detailcompanies', function () {
    return view('content.detailcompanies');
})->name('detailcompanies');

// Route::get('/createpost', function () {
//     return view('content.createpost');
// })->name('createpost');

Route::get('/profilealumni', function () {
    return view('content.profile-alumni');
})->name('profilealumni');

Route::get('/editprofile', function () {
    return view('content.editprofile');
})->name('editprofile');

Route::get('/adminhome', function () {
    return view('content.admin-home');
})->name('adminhome');

// Route::get('/404', function () {
//     return view('errors.404');
// })->name('404');

Route::get('/505', function () {
    return view('errors.505');
})->name('505');

// Index
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/companies', [CompanyController::class, 'index'])->name('companies');


// Posts Controller
Route::controller(PostController::class)->group(function () {
    Route::get('/posts', 'index')->name('posts');
    Route::get('/posts/detail/{id}', 'show')->name('posts.detail');
    Route::get('/posts/create','create')->name('posts.create');
    Route::post('/posts/store','store')->name('posts.store');
});

// Comment Controller
Route::controller(CommentController::class)->group(function(){
    Route::post('/posts/detail/{vacancy}/comment', 'store')->name('posts.detail.comment');
    Route::post('/posts/detail/{vacancy}/comment/{id}', 'store')->name('posts.detail.reply');
});


// Company Controller
Route::controller(CompanyController::class)->group(function () {
    Route::get('/companies', 'index')->name('companies');
    Route::get('/companies/detail/{id}', 'show')->name('companies.detail');
});


// Login
Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'login')->name('login');
    Route::post('/authenticate', 'authenticate')->name('authenticate');
    Route::post('/logout', 'logout')->name('logout');
    Route::get('/profile', 'profile')->name('profile');
});

// Mahasiswa
Route::controller(MahasiswaController::class)->group(function () {
    Route::get('/profile/mahasiswa', 'profile')->name('mahasiswa.profile');
});

// Alumni
Route::controller(AlumniController::class)->group(function () {
    Route::get('/alumni', 'index')->name('alumni');
    Route::get('/profile/alumni', 'profile')->name('alumni.profile');
    Route::get('/profile/show', 'show')->name('alumni.show-profile');
    Route::get('/alumni/detail/{id}', 'detail')->name('alumni.detail');
});
