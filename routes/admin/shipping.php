<?php

use App\Http\Controllers\Admin\Shipping\ShippingMethodsController;
use Illuminate\Support\Facades\Route;

Route::get('/create', [ShippingMethodsController::class, '_create'])->name('admin-shipping-create');
Route::post('/create', [ShippingMethodsController::class, 'create']);

