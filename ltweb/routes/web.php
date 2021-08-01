<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\CartController;

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

Route::get('/',[HomeController::class,'index']);

Auth::routes();

Route::get('/home', [AdminController::class, 'index'])->name('home');
Route::get('/admin/{id}',[AdminController::class,'edit']);
Route::patch('/admin/{id}',[AdminController::class,'update']);
Route::get('/category',[CategoryController::class,'index']);
Route::get('/category/create',[CategoryController::class,'create']);
Route::post('/category/store',[CategoryController::class,'store']);
Route::get('/category/show/{id}',[CategoryController::class,'show']);
Route::get('/category/edit/{id}',[CategoryController::class,'edit']);
Route::patch('/category/update/{id}',[CategoryController::class,'update']);
Route::delete('/category/delete/{id}',[CategoryController::class,'destroy']);
Route::get('/product',[ProductController::class,'index']);
Route::get('/product-search',[ProductController::class,'search']);
Route::get('/product/create',[ProductController::class,'create']);
Route::post('/product/store',[ProductController::class,'store']);
Route::get('/product/show/{id}',[ProductController::class,'show']);
Route::get('/product/edit/{id}',[ProductController::class,'edit']);
Route::patch('/product/update/{id}',[ProductController::class,'update']);
Route::delete('/product/delete/{id}',[ProductController::class,'destroy']);
//Route::get('/customer',[CustomerController::class,'index']);

// frontend

Route::get('/index',[HomeController::class,'index']);
Route::get('/user-login',[CustomerController::class,'index']);
Route::post('/user-login',[CustomerController::class,'check']);
Route::get('/user-register',[CustomerController::class,'create']);
Route::post('/user-register/store',[CustomerController::class,'store']);
Route::get('/shop',function (){
    $products = \App\Models\Product::paginate(9);
    return view('user.views.shop',['title'=>'Shop'],compact('products'));
});

Route::get('/search',[SearchController::class,'search']);

Route::get('/shop/{id}',function ($id){
    $products = \App\Models\Product::where('category_id',$id)->paginate(9);
    return view('user.views.shop',['title'=>'Shop'],compact('products'));
});

Route::get('/shop/product-detail/{id}',function ($id){
    $product = \App\Models\Product::findOrFail($id);
    $category = \App\Models\Category::findOrFail($product->category_id);
   return view('user.views.product-detail',['title'=>$product->title],compact('product','category'));
});

Route::post('/save-cart',[App\Http\Controllers\CartController::class,'save']);

Route::get('/save-cart',function (){
    return view('user.views.shop-cart',['title'=>'Giỏ hàng']);
});

Route::post('/update',[CartController::class,'update']);

Route::get('/remove/{id}',[CartController::class,'remove']);

Route::get('/destroy',[CartController::class,'destroy']);
