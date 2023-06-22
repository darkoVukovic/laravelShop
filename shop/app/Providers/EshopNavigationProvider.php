<?php

namespace App\Providers;

use App\Libraries\RedisService;
use App\Models\ShopNavigations;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class EshopNavigationProvider extends ServiceProvider
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
        

        View::composer(['eshop'], function($view) {
            $redis = new RedisService();
            if(Redis::hgetall('laravelNavigation'))  {
                $navigationItems = $redis->instance()->getDecodedHash('laravelNavigation');
            }
            else {
                $shopNavigationModel = new ShopNavigations();

                $navigationItems = $shopNavigationModel->getActiveNavigations();
                foreach($navigationItems as $item) {
                    Redis::hset('laravelNavigation', $item->id, json_encode($item));
                    Redis::expire('laravelNavigation', 86400);
                }
            }
        
            $view->with('navigationItems', $navigationItems);
        });
    }
}
