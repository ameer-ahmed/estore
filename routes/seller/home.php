<?php

use App\Http\Controllers\Seller\Home\HomeController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, '_home'])->name('seller-dashboard');
