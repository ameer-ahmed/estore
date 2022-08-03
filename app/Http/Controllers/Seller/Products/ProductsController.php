<?php

namespace App\Http\Controllers\Seller\Products;

use App\Http\Controllers\Controller;
use App\Http\Requests\Seller\Products\AddProductStepOneRequest;
use App\Models\Admin\Category;
use App\Models\Mutual\Products\ProductOptionExistedSetting;

class ProductsController extends Controller
{

    /*
     * TODO: Make '/create' route for not-submitted products section contains all products which not in step 4 or 0
     * */

    public function __construct() {
        $this->middleware('auth:seller');
    }

    public function _stepOne() {
        $categories = Category::select('id', 'slug')->where('is_active', 1)->get();
        $productExistedSettings = ProductOptionExistedSetting::all();
        return view('seller.products.create.step1', compact('categories', 'productExistedSettings'));
    }

    public function stepOne(AddProductStepOneRequest $request) {
        return $request;
    }

}
