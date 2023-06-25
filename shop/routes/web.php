<?php

use App\Http\Controllers\Home;
use App\Http\Controllers\Shop;
use App\Http\Controllers\Admin;
use App\Http\Controllers\Eshop;
use App\Http\Controllers\Brands;
use App\Http\Controllers\Categories;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::redirect('/home', '/');

Route::get('/', [Eshop::class, 'index']);

Route::get('/product/create', [Eshop::class, 'create'])->middleware('auth');

Route::get('/product/{id}/edit', [Eshop::class, 'edit'])->middleware('auth');


Route::post('/product', [Eshop::class, 'store'])->middleware('auth');
Route::put('/product/{id}', [Eshop::class, 'update'])->middleware('auth');


Route::get('/product/{id}/{productName}', [Eshop::class, 'show']);


Route::get('/category/{id}/{categoryName}', [Categories::class, 'show']);


Route::get('/register', [UserController::class, 'create'])->middleware('guest');
Route::post('/users', [UserController::class, 'store']);

Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

Route::delete('/product/{id}', [Eshop::class, 'destroy'])->middleware('auth');


Route::post('/users/authenticate', [UserController::class, 'authenticate']);
// Route::get('/user/followlist', [UserController::class, 'index']);



/// ajax

Route::post('/user/followitem', [UserController::class, 'storeFollowItem'])->name('storeFollow');