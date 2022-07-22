<?php

use App\Http\Controllers\Dashboard\Shipping\ShippingMethodsController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => [
    'localeSessionRedirect',
    'localizationRedirect',
    'localeViewPath'
]], function () {
    Route::get('/create', [ShippingMethodsController::class, '_create'])->name('admin-shipping-create');
    Route::post('/create', [ShippingMethodsController::class, 'create']);
});

