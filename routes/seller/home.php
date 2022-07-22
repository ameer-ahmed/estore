<?php

use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\Home\HomeController;
use Illuminate\Support\Facades\Route;

Route::group([
    'middleware' => [
        'localeSessionRedirect',
        'localizationRedirect',
        'localeViewPath'
    ]
], function () {
    Route::group([
        'middleware' => 'guest:seller'
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
