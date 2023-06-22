<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'shop_category';    
    
    protected $fillable = ['item_id', 'category_id'];
    public   $timestamps;

    
    public function index () {
        return  Category::all();
        
    } 

    public function show ($id, $name) {
        $this->primaryKey = 'id_shopCategory';

        return Category::where('id_shopCategory', $id, 'and')
        ->where('name', $name)
        ->first();
    } 

    public function store ($itemId, $values) {
        $this->table = 'shop_category_item';
        $this->timestamps = false;
        foreach($values as $val) {
            Category::create([
                'item_id' => $itemId,
                'category_id' => $val
            ]);
        } 
       
    } 

    public function myUpdate ($itemId, $values) {
        $this->table = 'shop_category_item';
        $this->timestamps = false;
        Category::where('item_id', $itemId)->delete();
        
        foreach($values as $val) {
            Category::create([
                'item_id' => $itemId,
                'category_id' => $val
            ]);
        } 
       
    } 

    public function deleteProductCategories ($id) {
        $this->table = 'shop_category_item';
        $this->timestamps = false;
        Category::where('item_id', $id)->delete();
    } 



}
