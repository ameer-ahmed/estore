<?php

use App\Http\Controllers\Dashboard\Auth\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/test', function () {
   return 'it works!';
});
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
    Route::get('/', function () {
        return 'dashboard';
    })->name('admin-dashboard');
});
