<?php

use App\Http\Controllers;
use Illuminate\Support\Facades\Route;

// FRONTEND
Route::controller(Controllers\FrontController::class)->group(function () {
    Route::get('/', 'index');
});

Route::prefix('min')->group(function () {
    Route::controller(Controllers\HomeController::class)->group(function () {
        Route::get('/', 'index');
    });
});
