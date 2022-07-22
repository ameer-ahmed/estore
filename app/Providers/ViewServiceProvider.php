<?php

namespace App\Providers;

use App\Models\Admin\ShippingMethod;
use App\View\Composers\ShippingMethodComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
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
        View::composer('admin.layouts.navigations.sidebar', ShippingMethodComposer::class);
//        $this->shareShippingMethods();
    }

//    private function shareShippingMethods() {
//        $shippingMethods = ShippingMethod::select('id')->get();
//        View::make('admin.layouts.main', ['name' => 'Ameer']);
//    }
}
