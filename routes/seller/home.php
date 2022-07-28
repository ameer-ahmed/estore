<?php

use App\Http\Controllers\Seller\Auth\LoginController;
use App\Http\Controllers\Seller\Home\HomeController;
use Illuminate\Support\Facades\Route;

Route::group([
    'middleware' => [
        'localeSessionRedirect',
        'localizationRedirect',
        'localeViewPath',
    ]
], function () {
    Route::group(['middleware' => 'guest:seller'], function () {
        Route::get('/login', [LoginController::class, '_login'])->name('seller-login');
        Route::post('/login', [LoginController::class, 'login']);
    });

    Route::group(['middleware' => 'auth:seller'], function () {
        Route::get('/', [HomeController::class, '_home'])->name('seller-dashboard');
        Route::get('/logout', [LoginController::class, 'logout']);
    });
});
