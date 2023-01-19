<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\Admin\UploadProduct;
use App\Http\Controllers\Public\Allproducts;
use App\Http\Controllers\Admin\UploadCategories;
use App\Http\Controllers\Public\Allcategory;
use App\Http\Controllers\Public\Customized;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\UploadPricetype;
use App\Http\Controllers\CartController;
use App\Http\Controllers\SearchProduct;
use App\Http\Controllers\Admin\UploadBanner;
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

Route::get('/my_account',[MainController::class, 'my_account']);
Route::get('/home',[MainController::class, 'home'])->name('home');
Route::get('/',[MainController::class, 'home']);
// Route::get('/',[Allcategory::class,'getcategories']);
Route::post('/register',[MainController::class, 'register']);
Route::post('/login',[MainController::class, 'login']);
Route::get('/logout',[MainController::class, 'logout']);
// admin routes
Route::get('/admin/dashboard',[AdminController::class, 'dashboard'])->middleware('adminAccess');
Route::view('/admin/dashboard/uploadproduct','Admin.addProducts')->middleware('adminAccess');
// Route::get('/admin/dashboard/uploadproduct',[UploadProduct::class, 'addProducts']);
// Route::view('/admin/addProducts','Admin.addProducts');
// Product Section
Route::get('/admin/products',[UploadProduct::class, 'index'])->middleware('adminAccess');
Route::get('/admin/products/addProduct',[UploadProduct::class, 'addProduct'])->middleware('adminAccess');
Route::post('/addproducts',[UploadProduct::class, 'save'])->middleware('adminAccess');
Route::get('deleteProduct/{id}',[UploadProduct::class, 'deleteProduct'])->middleware('adminAccess');
Route::get('/admin/products/editProduct/{id}',[UploadProduct::class, 'editProduct'])->middleware('adminAccess');
Route::post('/updateProduct/{id}',[UploadProduct::class, 'updateProduct']);
Route::get('/admin/dashboard/uploadproduct',[UploadCategories::class, 'getcategory'])->middleware('adminAccess');

Route::get('/demo/ajax/{id}',[UploadProduct::class, 'destroy']);

// Route::view('/admin/dashboard/addcategory','Admin.addcategories');
// Category Section
Route::get('/admin/categories',[UploadCategories::class,'index'])->name('categories')->middleware('adminAccess');
Route::get('/admin/categories/addcategory',[UploadCategories::class, 'addcategory'])->middleware('adminAccess');
Route::post('/addcategory',[UploadCategories::class, 'save']); // add category ka save action
Route::get('/admin/categories/editcategory/{id}',[UploadCategories::class, 'editcategory'])->middleware('adminAccess');
Route::post('/updatecategory/{id}',[UploadCategories::class, 'updatecategory'])->middleware('adminAccess');
Route::get('delete_cat/{id}',[UploadCategories::class, 'delete_cat'])->middleware('adminAccess');

Route::get('/admin/Pricetype',[UploadPricetype::class, 'index'])->middleware('adminAccess');
Route::get('/admin/Pricetype/addprice',[UploadPricetype::class, 'addprice'])->middleware('adminAccess');
Route::post('/addpricetype',[UploadPricetype::class,'save'])->middleware('adminAccess'); // add price
Route::get('/admin/Pricetype/edit/{id}',[UploadPricetype::class, 'editData'])->middleware('adminAccess'); 
Route::POST('/updatepricetype/{id}',[UploadPricetype::class, 'update'])->middleware('adminAccess');
Route::get('/deletepricetype/{id}',[UploadPricetype::class, 'delete'])->middleware('adminAccess');
Route::get('/admin/products/customize/{id}',[UploadProduct::class, 'customizepricetype'])->middleware('adminAccess');
Route::POST('/customize/pricequantity/',[UploadProduct::class, 'Updatepricequantity'])->middleware('adminAccess');
Route::get('/admin/products/updatepricetype/',[UploadProduct::class, 'updatepricetype'])->middleware('adminAccess');
Route::get('/admin/product/savePricetype',[UploadProduct::class, 'savePricetype'])->middleware('adminAccess');

Route::get('/admin/banner',[UploadBanner::class,'index'])->middleware('adminAccess');
Route::get('/admin/banner/add',[UploadBanner::class,'add'])->middleware('adminAccess');
Route::post('/addbanner',[UploadBanner::class,'save'])->middleware('adminAccess');
Route::get('/admin/banner/edit/{id}',[UploadBanner::class, 'edit'])->middleware('adminAccess');
Route::post('/updatebanner/{id}',[UploadBanner::class,'update'])->middleware('adminAccess');
Route::get('delete_banner/{id}',[UploadBanner::class, 'delete'])->middleware('adminAccess');
Route::get('/admin/banner/status',[UploadBanner::class, 'status'])->middleware('adminAccess');

// end of admin routes
Route::get('/products',[Allproducts::class,'getallproducts']);
Route::get('/products/{id}',[Allproducts::class,'getsingleproduct']);

Route::get('/categories',[Allcategory::class,'getallcategory']);
Route::get('/categories/{id}',[Allproducts::class,'categoryProducts']);
Route::get('/trycode',[MainController::class,'trycode']);
Route::get('/customize/{id}',[Customized::class,'coustomize'])->name('customize');
Route::POST('/customized',[Customized::class, 'customized_add']);


Route::get('/public/header/products',[MainController::class, 'headerProducts']);


// cart route
Route::get('/cart',[CartController::class, 'index']);
Route::get('/cart/add/{id}',[CartController::class, 'add']);
Route::get('/cart/remove/',[CartController::class,'remove']);
Route::get('/cart/update-cart/', [CartController::class, 'update'])->name('update_cart');


// search route
Route::POST('/searchproducts',[SearchProduct::class, 'index']);