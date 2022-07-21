<?php

namespace App\Providers;

use App\Models\Dashboard\ShippingMethod;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class SharingServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // Sharing all shipping methods
        $shippingMethods = ShippingMethod::select(['id'])->get();
        View::share('shippingMethods', $shippingMethods);


    }
}
