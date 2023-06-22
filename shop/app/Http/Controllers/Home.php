<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Images;
use App\Models\Brands;
use App\Models\Product;


class Home extends Controller
{
    protected $data;
    
   public function __construct () {
    $brands_model = new Brands();
    $this->data['brands'] = $brands_model->getAllBrands();

   }  

    public function index () {
        $images_model = new Images();
        $this->data['mainImages'] = $images_model->getAllImages();
        $this->data['view'] = 'main';
        $this->data['page'] = 'home';
        $products_model = new Product();
        $this->data['products'] = $products_model->getAllProducts();
        return view('layout', $this->data);
    } 

    public function brands () {
        $this->data['page'] = 'brands';
        $this->data['view'] = 'brands';

        return view('layout', $this->data);
    } 
    public function products () {
        $this->data['page'] = 'products';
        $this->data['view'] = 'products';

        return view('layout', $this->data);
    } 
}
