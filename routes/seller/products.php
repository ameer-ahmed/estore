<?php

use App\Http\Controllers\Seller\Products\ProductsController;
use Illuminate\Support\Facades\Route;

Route::get('/create', function () {
    return 'not-submitted products.';
});
Route::get('/create/step-one', [ProductsController::class, '_stepOne'])->name('seller-product-create-1');
Route::post('/create/step-one', [ProductsController::class, 'stepOne']);
Route::get('/create/step-two/{id}', function ($id) {
    return 'step two! id: '.$id;
})->name('seller-product-create-2');
