<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\SslCommerzPaymentController;



Route::get('/',[FrontendController::class,'index']);
Route::get('product/details/{product_id}',[FrontendController::class,'productdetails']);
Route::get('/contact',[FrontendController::class,'contact']);
Route::get('/shop',[FrontendController::class,'shop']);
Route::get('shop/category/{category_id}',[FrontendController::class,'shop_category']);


Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::post('user/insert', [HomeController::class, 'userinsert'])->name('userinsert');
Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');

//category controller
Route::get('/category', [CategoryController::class, 'index'])->name('category');
Route::post('/category/create', [CategoryController::class, 'create'])->name('create');
Route::get('/category/delete/{cat_id}', [CategoryController::class, 'delete']);

//subcategory controller
Route::get('/subcategory', [SubCategoryController::class, 'index'])->name('subcategory');
Route::post('/category/add', [SubCategoryController::class, 'add'])->name('add');
Route::get('/subcategory/delete/{subcategory_id}', [SubCategoryController::class, 'delete']);
Route::get('/subcategory/edit/{subcategory_id}', [SubCategoryController::class, 'edit']);
Route::post('/subcategory/update', [SubCategoryController::class, 'update'])->name('update');

//profile controller

Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
Route::post('/profile/change', [ProfileController::class, 'change'])->name('change');
Route::post('/profile/password/change', [ProfileController::class, 'passwordchange']);
Route::post('/profile/photo/change', [ProfileController::class, 'photochange']);


//product controller
Route::get('/product', [ProductController::class, 'index']);
Route::post('/product/insert', [ProductController::class, 'insert']);

//cart

Route::post('/add/to/cart', [CartController::class, 'addtocart']);
Route::get('/cart/delete/{cart_id}', [CartController::class, 'cartdelete']);
Route::get('/cart', [CartController::class, 'cart']);//cart page without coupon
Route::get('/cart/{coupon_name}', [CartController::class, 'cart']);//cart page with coupon
Route::post('update/cart', [CartController::class, 'updatecart']);

//Checkout
Route::get('checkout',[CheckoutController::class,'index']);
Route::post('getCityList',[CheckoutController::class,'getCityList']);
Route::post('checkout/post',[CheckoutController::class,'checkoutpost']);




//coupon
Route::get('/coupon', [CouponController::class, 'index']);
Route::post('/coupon/insert', [CouponController::class, 'insert'])->name('insert');

// SSLCOMMERZ Start
Route::get('/example1', [SslCommerzPaymentController::class, 'exampleEasyCheckout']);
Route::get('/online/payment', [SslCommerzPaymentController::class, 'exampleHostedCheckout']);

Route::post('/pay', [SslCommerzPaymentController::class, 'index']);
Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

Route::post('/success', [SslCommerzPaymentController::class, 'success']);
Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);
//SSLCOMMERZ END