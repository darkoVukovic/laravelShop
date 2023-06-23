<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Navigation;
use Illuminate\Support\Facades\View;

class NavigationServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(['partials._header'], function($view) {
            $navigation = Navigation::where('status', '=', '1')
                            ->get();
            $view->with('navigation', $navigation);
        });

        
    }
}
