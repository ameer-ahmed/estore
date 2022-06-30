<?php

use App\Http\Controllers\Dashboard\Auth\LoginController;
use App\Http\Controllers\Dashboard\Home\HomeController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::get('/test', function () {
   return 'it works!';
});

Route::group([
    'middleware' => [
        'localeSessionRedirect',
        'localizationRedirect',
        'localeViewPath'
    ]
], function () {
    Route::group([
        'middleware' => 'guest:admin'
    ], function () {
        Route::get('/login', [LoginController::class, '_login'])->name('admin-login');
        Route::post('/login', [LoginController::class, 'login']);
    });


    Route::group([
        'namespace' => 'Dashboard',
        'middleware' => 'auth:admin'
    ], function () {
        Route::get('/logout', [LoginController::class, 'logout'])->name('admin-logout');
        Route::get('/', [HomeController::class, '_home'])->name('admin-dashboard');
    });
});
