<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ForgetPasswordController;


// posts rout
Route::get('/', [PostController::class, 'home'])->name('home');

// dashboard route
Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard')->middleware('auth');
Route::get('/user-manage', [UserController::class, 'manage'])->name('user.manage')->middleware('auth');
Route::post('/user-manage', [UserController::class, 'managePost'])->name('user.manage.post')->middleware('auth');

// Admin Route
Route::middleware(['auth'])->group(function()
 {
    Route::post('/user/{user}/assign-admin', [AdminController::class, 'assignAdmin'])->name('user.assign-admin');
    Route::delete('/user/{user}/revoke-admin', [AdminController::class, 'revokeAdmin'])->name('user.revoke-admin');
 });

// manage post
Route::resource('/posts', PostController::class);

// auth route
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'registerPost'])->name('register.post');
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'loginPost'])->name('login.post');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// forget password route
Route::get('/reset-password', [ForgetPasswordController::class, 'forgetPassword'])->name('forgetPasword');
Route::post('/reset-password', [ForgetPasswordController::class, 'forgetPasswordPost'])->name('forgetPassword.post');
Route::get('/password-reset/{token}', [ForgetPasswordController::class, 'resetPassword'])->name('resetPassword');
Route::post('/password-reset/{token}', [ForgetPasswordController::class, 'resetPasswordPost'])->name('password.reset.post');





