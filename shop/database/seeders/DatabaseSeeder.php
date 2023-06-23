<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\ShopNavigations;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         //\App\Models\User::factory(10)->create();

         ShopNavigations::create([
            'name' => 'home',
            'status' => 1,
         ]);

         ShopNavigations::create([
            'name' => 'categories',
            'status' => 1,
         ]);

         Category::create([
            'name' => 'IT',
         ]);
         Category::create([
            'name' => 'electronics',
         ]);

         Category::create([
            'name' => 'sports',
         ]);

         

    }
}
