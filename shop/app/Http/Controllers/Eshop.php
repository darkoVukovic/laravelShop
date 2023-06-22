<?php

namespace App\Http\Controllers;

use App\Models\Items;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

use function Ramsey\Uuid\v1;

class Eshop extends Controller
{     
   

   public function index () {
      $this->template['view'] = 'index';
      $itemsModel = new Items();
      //$this->template['items'] = $itemsModel->index();
      $this->template['items'] = Items::latest()->filter(request(['search', 'category']))->paginate(12);
      $this->template['renderContentData'] = ['items'];
      
      return view('eshop', $this->template);



   } 


   public function  show ($id ,$productName) {
      $itemsModel = new Items();
      $userModel = new User();
      $this->template['view'] = 'item';
      $this->template['item'] = $itemsModel->show($id, $productName);
      $this->template['seller'] = $userModel->getSellerById($this->template['item']['user_id']);
      $this->template['renderContentData'] = ['item', 'seller'];
      return view('eshop', $this->template);
   } 

   public function create () {
      $this->template['view'] = 'create';
      $this->template['categories'] = Category::all();
      $this->template['renderContentData'] = 'categories';
      return view('eshop', $this->template);
   } 

   public function store (Request $request) {
     $formFields = $request->validate([
      'name' => 'required',
      'about' => 'required',
      'price' => 'required',
      'categories' => 'required',
     ]);

     $itemModel = new Items();
     if($request->hasFile('image')) {
      $formFields['image'] = $request->file('image')->store('images/items', 'public');
     }
     $formFields['user_id'] = auth()->id();

     $itemId = $itemModel->storeNewItem($formFields);
     // if insert true  update mtm table
     $categoryModel = new Category();
     $categoryModel->store($itemId, $formFields['categories']);

      return redirect('/')->with('message', 'product kreiran uspesno');     

   } 

   public function edit (Request $request, Items $items, Category $categoryModel, $itemId) {
      $this->template['view'] = 'edit';
      $this->template['item'] = $items->edit($itemId);
      $this->template['categories'] = $categoryModel->index();
      $this->template['renderContentData'] = ['item', 'categories'];

      return view('eshop', $this->template);

   } 

   public function update (Request $request, Items $items, Category $categoryModel, $itemId) {
       $formFields = $request->validate([
      'name' => 'required',
      'about' => 'required',
      'price' => 'required',
      'categories' => 'required',
     ]);
     
     $itemModel = new Items();
     if($request->hasFile('image')) {
      $formFields['image'] = $request->file('image')->store('images/items', 'public');
     }
     
      $itemModel->updateItem($itemId, $formFields);
      $this->template['item'] = $items->edit($itemId);
      $this->template['categories'] = $categoryModel->index();
      $this->template['renderContentData'] = ['item', 'categories'];

      $categoryModel->myUpdate($itemId, $formFields['categories']);

      return back()->with('message', 'product editovan uspesno');     
      
   }  

   public function destroy ($id) {
         $itemModel = new Items();
         $categoryModel = new Category();
         $categoryModel->deleteProductCategories($id);
         $deletion = $itemModel->myDestroy($id);
         
         return redirect('/')->with('message', 'product deleted {{$deletion}}' );
   } 
}
