<?php

use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\Categories\CategoriesController;
use App\Http\Controllers\Admin\Home\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/create', [CategoriesController::class, '_create']);
Route::post('/create', [CategoriesController::class, 'create'])->name('admin-categories-create');
Route::get('/', [CategoriesController::class, '_all'])->name('admin-categories-all');
Route::get('/edit/{id}', [CategoriesController::class, '_edit']);
Route::match(['GET', 'POST'], '/edit/{id}/{operation?}', [CategoriesController::class, 'edit'])->name('admin-categories-edit');
//Route::post('/edit/{id}', [CategoriesController::class, 'edit'])->name('admin-categories-edit');
