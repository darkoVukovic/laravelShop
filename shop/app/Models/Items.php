<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Items extends Model
{
    use HasFactory;

    protected $table = 'item_category_view';    
    protected $fillable = ['name', 'about', 'price', 'categories', 'image', 'imagePath', 'user_id'];

    public function index () {
    return Items::latest()->get();

    } 

    
    
    public function show ($id, $productName) {
        return Items::where('id_shopItem', $id, 'and')
                    ->where('product_name', $productName)
                    ->first();
    } 

    public function getCategoryProducts ($id, $productName) {

        $this->table = 'shop_item';
        $this->primaryKey = 'id_shopItem';

        return Items::join('shop_category_item', 'id_shopItem', '=', 'item_id')
                    ->join('shop_category', 'shop_category_item.category_id', '=', 'id_shopCategory')
                    ->select('*', 'shop_item.name as item_name')
                    ->where('shop_category.name', $productName)
                    ->where('shop_category_item.category_id', $id)
                    ->get();
    } 


    public function scopeFilter ($query, array $filters) {
        if($filters['search'] ?? false) {
            $query->where('product_name', 'like', '%'.request('search').'%')
                    ->orWhere('about', 'like', '%'.request('search').'%')
                    ->orWhere('category_names', 'like', '%'.request('search').'%');
        }
        
        if($filters['category'] ?? false) {
            $query->where('category_names', 'like', '%'.request('category').'%');
        }
    } 

    public  function storeNewItem ($values) {
        $this->table = 'shop_item';
        $this->primaryKey = 'id_shopItem';

      $item =    Items::create([
            'name' => $values['name'],
            'about' => $values['about'],
            'price' => $values['price'],
            'imagePath' => $values['image'],
            'user_id' => $values['user_id']
         ]);

         return $item->id;
    } 

    public function updateItem ($itemId, $values) {
        $this->table = 'shop_item';
        $this->primaryKey = 'id_shopItem';

         Items::where('id_shopItem', $itemId)->update([
              'name' => $values['name'],
              'about' => $values['about'],
              'price' => $values['price'],
              'imagePath' => $values['image']
           ]);


    } 

    public function edit ($id) {
       return Items::where('id_shopItem', $id)->first();
    } 
 

    public function myDestroy ($id) {
        $this->table = 'shop_item';
        $this->primaryKey = 'id_shopItem';

        return Items::where('id_shopItem', $id)->delete();
    } 

    public function user () {
        return $this->belongsTo(User::class, 'user_id');
    } 
} 




