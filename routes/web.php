<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;

// public routes
Route::view('/', 'welcome')->name('welcome');

Route::middleware('guest')->group(function() {
    Route::view('/login', 'auth.login')->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
    Route::get('/register', [AuthController::class, 'register'])->name('auth.register');
    Route::resource('/users', AuthController::class);
});


Route::middleware(['auth'])->group(function() {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::view('referrals', 'dashboard.referral.index')->name('referral.index');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
