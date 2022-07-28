<?php

namespace App\Http\Controllers\Admin\Shipping;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Shipping\AddShippingMethodRequest;
use App\Models\Admin\ShippingMethod;
use Illuminate\Http\Request;

class ShippingMethodsController extends Controller
{
    public function __construct() {
        $this->middleware('auth:admin');
    }

    public function _create() {
        return view('admin.shipping.create');
    }

    public function create(AddShippingMethodRequest $request) {
        $shippingMethods = ShippingMethod::create([
            'en' => [
                'name' => $request->name_en,
            ],
            'ar' => [
                'name' => $request->name_ar,
            ],
            'start_tariff' => $request->start_tariff,
            'kilogram_tariff' => $request->kilogram_tariff,
            'minimum_kilogram_tariff' => $request->minimum_kilogram_tariff,
            'is_active' => $request->is_active,
        ]);
        if($shippingMethods) {
            return redirect()
                ->route('admin-shipping-create')
                ->with(['success' => 'Shipping method was created successfully.']);
        }
        return redirect()
            ->route('admin-shipping-create')
            ->with(['success' => 'An error occurred.']);
    }
}
