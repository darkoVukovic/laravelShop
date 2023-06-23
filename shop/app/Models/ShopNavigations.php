<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShopNavigations extends Model
{
    public $count = 0;

    use HasFactory;
    protected $table = 'shop_navigations';    


    public function index () {
        return ShopNavigations::all();

    } 
    
    public function getActiveNavigations () {

       return  ShopNavigations::where('status', '=', '1')
                            ->get();
    } 
    
}
