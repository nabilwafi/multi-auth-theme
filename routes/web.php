<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\MainAdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainUserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'admin', 'middleware' => ['admin:admin']], function() {
    Route::get('/login', [AdminController::class, 'loginForm']);
    Route::post('/login', [AdminController::class, 'store'])->name('admin.login');
});

Route::middleware(['auth:sanctum,admin', 'verified'])->get('/admin/dashboard', function () {
    return view('admin.index');
})->name('dashboard');

Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', function () {
    return view('user.index');
})->name('dashboard');

/**
 * @WEBPAGES Route Admin
 * GET/admin/logout -> to destroy sessions
 * 
 * 
 */
Route::get('/admin/logout', [AdminController::class, 'destroy'])->name('admin.logout');

/**
 * @WEBPAGES Route User
 * GET/user/logout -> to destroy sessions
 * GET/user/view/profile -> to get userprofile page
 * GET/user/edit/profile -> To get edit profile page
 * POST/user/update/profile -> To update profile from old data to new data
 * GET/user/edit/password -> To Get edit password page
 * 
 */
Route::get('/user/logout', [MainUserController::class, 'logout'])->name('user.logout');
Route::get('/user/view/profile', [MainUserController::class, 'userProfile'])->name('user.profile');
Route::get('/user/edit/profile', [MainUserController::class, 'editProfile'])->name('user.edit');
Route::post('/user/update/profile', [MainUserController::class, 'updateProfile'])->name('user.update');
Route::get('/user/edit/password', [MainUserController::class, 'changePassword'])->name('user.change.password');
Route::post('/user/update/password', [MainUserController::class, 'updatePassword'])->name('user.update.password');

/**
 * @WEBPAGES Route Admin
 * GET/admin/view/profile -> to get adminprofile page
 * GET/admin/edit/profile -> To get edit profile page
 * POST/admin/update/profile -> To update profile from old data to new data
 * GET/admin/edit/password -> To Get edit password page
 * 
 */
Route::get('/admin/view/profile', [MainAdminController::class, 'adminProfile'])->name('admin.profile');
Route::get('/admin/edit/profile', [MainAdminController::class, 'adminEditProfile'])->name('admin.edit');
Route::post('/admin/update/profile', [MainAdminController::class, 'adminUpdateProfile'])->name('admin.update');
Route::get('/admin/edit/password', [MainAdminController::class, 'changePassword'])->name('admin.change.password');
Route::post('/admin/update/password', [MainAdminController::class, 'updatePassword'])->name('admin.update.password');