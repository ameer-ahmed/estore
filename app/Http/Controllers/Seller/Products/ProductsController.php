<?php

namespace App\Http\Controllers\Seller\Products;

use App\Http\Controllers\Controller;
use App\Http\Requests\Seller\Products\AddProductStepOneRequest;
use App\Models\Admin\Category;
use App\Models\Mutual\Products\Product;
use App\Models\Mutual\Products\ProductNumberOfSetting;
use App\Models\Mutual\Products\ProductOptionExistedSetting;
use Illuminate\Support\Str;

class ProductsController extends Controller
{

    // TODO: Make '/create' route for not-submitted products section contains all products which not in step 4 or 0

    public function __construct() {
        $this->middleware('auth:seller');
    }

    public function _stepOne() {
        $categories = Category::select('id')->where('is_active', 1)->get();
        $productExistedSettings = ProductOptionExistedSetting::all();
        return view('seller.products.create.step1', compact('categories', 'productExistedSettings'));
    }

    public function stepOne(AddProductStepOneRequest $request) {
        $product = Product::create([
            'en' => [
                'initial_name' => $request->init_name_en,
                'slug' => Str::slug($request->init_name_en) . '-' . floor(time() / 2),
            ],
            'ar' => [
                'initial_name' => $request->init_name_ar,
                'slug' => Str::slug($request->init_name_ar, language: 'ar') . '-' . floor(time() / 2),
            ],
            'seller_id' => auth()->guard('seller')->user()->id,
            'category_id' => $request->category,
            'initial_price' => $request->init_price,
            'status' => false,
            'step' => 2,
        ]);
        $number_of_options = count($request->option);
        for($i = 0; $i < $number_of_options; $i++) {
            ProductNumberOfSetting::create([
                'product_id' => $product->id,
                'number_of_settings' => $request->option_number[$i],
                'setting_id' => $request->option[$i],
            ]);
        }
        return redirect()->route('seller-product-create-2', $product->id);
    }

}
