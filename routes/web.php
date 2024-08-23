<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EarningController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\ReferralController;

// public routes
Route::redirect('/', '/login')->name('welcome');

Route::middleware('guest')->group(function() {
    Route::view('/login', 'auth.login')->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
    Route::get('/register', [AuthController::class, 'register'])->name('auth.register');
    Route::post('/register', [AuthController::class, 'store'])->name('users.store');
});


Route::middleware(['auth'])->group(function() {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::resource('referrals', ReferralController::class);
    Route::resource('earnings',EarningController::class);
    Route::resource('purchases', PurchaseController::class);
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
