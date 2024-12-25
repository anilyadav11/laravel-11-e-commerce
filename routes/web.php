<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminAuthController;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::middleware('guest:admin')->group(function () {
        Route::view('/login', 'admin.login')->name('login');
        Route::post('/login', [AdminAuthController::class, 'login'])->name('login.submit');
    });
    Route::middleware('auth:admin')->group(function () {
        Route::view('/dashboard', 'admin.dashboard')->name('dashboard');
        Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');
    });
})
;
