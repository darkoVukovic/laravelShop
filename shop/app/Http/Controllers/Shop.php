<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class Shop extends Controller
{
    protected $data = [];

    public function index () {
        $this->data['view'] = 'shop';
        $productModel = new Product();
        $this->data['products'] = Product::all();

        return view('layout', $this->data);
    } 
}
