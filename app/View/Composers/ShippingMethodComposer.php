<?php

namespace App\View\Composers;

use App\Models\Admin\ShippingMethod;
use Illuminate\View\View;

class ShippingMethodComposer
{
    protected $shippingMethods;

    public function __construct(ShippingMethod $shippingMethods) {
        $this->shippingMethods = $shippingMethods;
    }

    public function compose(View $view)
    {
        $view->with('shippingMethods', $this->shippingMethods::select('id')->get());
    }

}
