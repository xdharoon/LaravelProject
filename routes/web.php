<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\productcatcontroller;
use App\Http\Controllers\productcontroller;
use App\Http\Controllers\dashbordcontroller;



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

Route::get('/dashbord/index',[dashbordcontroller::class,'index']);


Route::get('/dashbord/product-category',[productcatcontroller::class,'productcategory']);
Route::get('/dashbord/add-product-category',[productcatcontroller::class,'addproductcategory']);
Route::post('/dashbord/store-product-category',[productcatcontroller::class,'storeproductcategory']);
Route::get('/dashbord/edit-product-category/{id}',[productcatcontroller::class,'editproductcategory']);
Route::post('/dashbord/update-product-category/{id}',[productcatcontroller::class,'updateproductcategory']);
Route::get('/dashbord/delete-product-category/{id}',[productcatcontroller::class,'deleteproductcategory']);

Route::get('/dashbord/product',[productcontroller::class,'product']);
Route::get('/dashbord/add-product',[productcontroller::class,'addproduct']);
Route::post('/dashbord/store-product',[productcontroller::class,'storeproduct']);
Route::get('/dashbord/edit-product/{id}',[productcontroller::class,'editproduct']);
Route::post('/dashbord/update-product/{id}',[productcontroller::class,'updateproduct']);
Route::get('/dashbord/delete-product/{id}',[productcontroller::class,'deleteproduct']);
