<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\AboutUs;

class HeaderComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        view()->composer('header', function ($view) {
            $aboutUs = AboutUs::first();
            $view->with('aboutUs', $aboutUs);
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('header', function ($view) {
            $aboutUs = AboutUs::first();
            $view->with('aboutUs', $aboutUs);
        });
    }
}
