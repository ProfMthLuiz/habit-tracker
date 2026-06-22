<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;

// SITE
Route::get('/', [\App\Http\Controllers\SiteController::class, 'index'])->name('site.index');

// LOGIN
Route::get('/login', [LoginController::class, 'index'])->name('site.login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('auth.login');


// AUTH
Route::middleware('auth')->group(function () {
    // DASHBOARD
    Route::get('/dashboard', [SiteController::class, 'dashboard'])->name('site.dashboard');

    // LOGOUT
    Route::post('/logout', [LoginController::class, 'logout'])->name('auth.logout');
});

// MVC
// Model -> database interaction ("BANCO")
// View -> user interface ("HTML")
// Controller -> business logic ("LÓGICA")
