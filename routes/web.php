<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;



//backend Route..

Route::get('/adminn', [AdminController::class, 'index']);
Route::get('/dashboard', [SuperAdminController::class, 'dashboard']);
Route::get('/logout', [SuperAdminController::class, 'logout']);
Route::post('//admin-dashboard', [AdminController::class, 'show_dashboard']);

//resourse route.. for category
Route::resource('/categories', CategoryController::class);
Route::get('/cat-status{category}', [CategoryController::class, 'change_status']);

//resourse route.. for sub category
Route::resource('/sub-categories', SubCategoryController::class);
Route::get('/subcat-status{subcategory}', [SubCategoryController::class, 'change_status']);

//resourse route.. for brand
Route::resource('/brands', BrandController::class);
Route::get('/brand-status{brand}', [BrandController::class, 'change_status']);

//resourse route.. for unit
Route::resource('/units', UnitController::class);
Route::get('/unit-status{unit}', [UnitController::class, 'change_status']);

//resourse route.. for Product
Route::resource('/products', ProductController::class);
Route::get('/product-status{product}', [ProductController::class, 'change_status']);


//frontend route..
Route::get('/', [HomeController::class, 'index']);
Route::get('/view-product/{id}', [HomeController::class, 'view_details']);
Route::get('/product-by-cat/{id}', [HomeController::class, 'product_by_cat']);
Route::get('/product-by-subcat/{id}', [HomeController::class, 'product_by_subcat']);
Route::get('/product-by-brand/{id}', [HomeController::class, 'product_by_brand']);



//cart route..
Route::post('/add-to-cart', [CardController::class, 'add_to_cart']);
Route::get('/delete-cart/{id}', [CardController::class, 'delete_card']);

//checkout route...
Route::get('/checkout', [CheckoutController::class, 'index']);
Route::get('/login-check', [CheckoutController::class, 'login_check']);



//customer login reg and logout route....
Route::post('/customer-login', [CustomerController::class, 'login']);
Route::post('/customer-registration', [CustomerController::class, 'registration']);
Route::get('/cus-logout', [CustomerController::class, 'logout']);
Route::post('/shipping_address', [CheckoutController::class, 'shipping_address']);
Route::get('/payment', [CheckoutController::class, 'payment']);
Route::post('/order-place', [CheckoutController::class, 'order_place']);

//order routes...
Route::get('/manage-order', [OrderController::class, 'manage_order']);
Route::get('/view-order/{id}', [OrderController::class, 'view_order']);

