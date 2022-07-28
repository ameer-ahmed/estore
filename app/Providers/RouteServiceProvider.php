<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    public const HOME = '/home';

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     *
     * @return void
     */
    public function boot()
    {
        $this->configureRateLimiting();

        Route::middleware('api')
            ->prefix('api')
            ->group(base_path('routes/api.php'));

        $this->routes(function () {
            Route::group(['middleware' => [
                'localeSessionRedirect',
                'localizationRedirect',
                'localeViewPath',
            ]], function () {
                Route::middleware('web')
                    ->group(base_path('routes/web.php'));

                Route::middleware('web')
                    ->prefix(LaravelLocalization::setLocale().'/admin')
                    ->group(base_path('routes/admin/home.php'));

                Route::middleware('web')
                    ->prefix(LaravelLocalization::setLocale().'/admin')
                    ->group(base_path('routes/admin/auth.php'));

                Route::middleware('web')
                    ->prefix(LaravelLocalization::setLocale().'/admin/categories')
                    ->group(base_path('routes/admin/categories.php'));

                Route::middleware('web')
                    ->prefix(LaravelLocalization::setLocale().'/admin/shipping')
                    ->group(base_path('routes/admin/shipping.php'));

                Route::middleware('web')
                    ->prefix(LaravelLocalization::setLocale().'/seller')
                    ->group(base_path('routes/seller/home.php'));

                Route::middleware('web')
                    ->prefix(LaravelLocalization::setLocale().'/seller')
                    ->group(base_path('routes/seller/auth.php'));
            });
        });
    }

    /**
     * Configure the rate limiters for the application.
     *
     * @return void
     */
    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });
    }
}
