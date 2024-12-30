<?php

use App\Http\Controllers;
use Illuminate\Support\Facades\Route;

// FRONTEND
Route::controller(Controllers\FrontController::class)->group(function () {
    Route::get('/', 'index');
});

Route::controller(Controllers\AuthController::class)->group(function () {
    Route::get('masuk', 'login')->name('login');
    Route::post('masuk', 'login_post')->name('login.post');
});

Route::prefix('min')->middleware('auth')->name('min.')->group(function () {
    Route::post('logout', [Controllers\AuthController::class, 'logout'])->name('logout');

    Route::controller(Controllers\HomeController::class)->group(function () {
        Route::get('/', 'index')->name('index');
    });
});
