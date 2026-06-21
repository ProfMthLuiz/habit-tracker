<?php

use Illuminate\Support\Facades\Route;

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/', [\App\Http\Controllers\SiteController::class, 'index']);

// MVC
// Model -> database interaction ("BANCO")
// View -> user interface ("HTML")
// Controller -> business logic ("LÓGICA")
