<?php

namespace App\Providers;

use App\Models\Category;
use App\Libraries\RedisService;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\ServiceProvider;

class SidebarItems extends ServiceProvider
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
            if(Redis::hgetall('categories'))  {
                $categoryItems = $redis->instance()->getDecodedHash('categories');
            }
            else {
                $categoryModel = new Category();
                $categoryItems = $categoryModel->index();
                foreach($categoryItems as $item) {
                    Redis::hset('categories', $item->id_shopCategory, json_encode($item));
                    Redis::expire('categories', 86400);

                }
            }

            $view->with('categories', $categoryItems);
        });

      
    
    }
}
