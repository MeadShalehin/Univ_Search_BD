<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\AboutUs;

class FooterComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        view()->composer('footer', function ($view) {
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
        view()->composer('*', function ($view) {
            // dd('View Composer executed'); // Add this line for debugging
            $aboutUs = AboutUs::first();
            $view->with('aboutUs', $aboutUs);
        });
    }
}
