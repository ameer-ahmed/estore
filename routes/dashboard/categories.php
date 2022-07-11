<?php

use App\Http\Controllers\Dashboard\Auth\LoginController;
use App\Http\Controllers\Dashboard\Categories\CategoriesController;
use App\Http\Controllers\Dashboard\Home\HomeController;
use Illuminate\Support\Facades\Route;

Route::group([
    'middleware' => [
        'localeSessionRedirect',
        'localizationRedirect',
        'localeViewPath'
    ]
], function () {
    Route::get('create', [CategoriesController::class, '_create'])->name('admin-categories-create');
    Route::post('create', [CategoriesController::class, 'create']);
    Route::get('/', [CategoriesController::class, '_all']);
});
