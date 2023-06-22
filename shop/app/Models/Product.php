<?php

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    public function getAllProducts () {
        //$data = Product::all()->sortByDesc('popularity')->take(10);
        $data = Product::join('brands', 'products.brand', '=', 'brands.id_brands')
                            ->orderBy('products.popularity', 'desc')
                            ->select('products.*', 'brands.name as bName')
                            ->get()
                            ->take(10);
                       
                        
        return $data;
    } 

    public function getBrandProductsByName ($name) {
        $data = Product::join('brands', 'products.brand', '=', 'brands.id_brands')
                        ->where('brands.name', strtolower($name))
                        ->get('products.*', 'brands.name as bName');
        return $data;

    } 

    public function getProductByName ($name) {
        $name = str_replace('-', ' ', $name);
        $data = Product::all()->where('name', $name);
        return $data;
    } 


}
