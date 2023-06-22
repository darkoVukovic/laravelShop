<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Items;
use Illuminate\Http\Request;

class Categories extends Controller
{
    //

    public function  show ($id, $categoryName) {
        $categoryModel = new Category();
        $this->template['view'] = 'category';
        $this->template['category'] = $categoryModel->show($id, $categoryName);
        $productModel = new Items();
        $this->template['categoryProducts'] = $productModel->getCategoryProducts($id, $categoryName);
        $this->template['renderContentData'] = ['category', 'categoryProducts'];

        return view('eshop', $this->template);

    } 
}
