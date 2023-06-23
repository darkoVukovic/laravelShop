<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;


class Brands extends Controller
{
    protected $data;
    

    public function show ($name) {
        $this->data['view'] = 'brand';
        $product_Model = new Product();

        $this->data['brandName'] = $name;
        $this->data['brandProducts'] = $product_Model->getBrandProductsByName($name);
            
        return view('layout', $this->data);
    } 

    public function showProduct ($brandName, $productName) {

        $product_Model = new Product();
        $this->data['view'] = 'product';
        $this->data['product'] = $productName;
        $this->data['productData'] = $product_Model->getProductByName($productName);
            
        return view('layout', $this->data);

    } 
}
