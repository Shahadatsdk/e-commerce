<?php

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

// Frontend routes
Route::get('/','HomeController@index');

// Show category wise product here
Route::get('/product_by_category/{category_id}','HomeController@show_product_by_category');
Route::get('/product_by_manufacture/{manufacture_id}','HomeController@show_product_by_manufacture');
Route::get('/view_product/{product_id}','HomeController@product_details_by_id');


// Cart routes
Route::post('/add_to_cart','CartController@add_to_cart');
Route::get('/show_cart','CartController@show_cart');
Route::get('/delete_to_cart/{rowId}','CartController@delete_to_cart');
Route::post('/update_to_cart','CartController@update_to_cart');


// Checkout routes
Route::post('/customer_registration','CheckoutController@customer_registration');
Route::post('/customer_login','CheckoutController@customer_login');
Route::get('/login_check','CheckoutController@login_check');
Route::get('/customer_logout','CheckoutController@customer_logout');
Route::get('/checkout','CheckoutController@checkout');
Route::post('/save_shipping','CheckoutController@save_shipping');

Route::get('/payment','CheckoutController@payment');
Route::post('/order_place','CheckoutController@order_place');







// Backend routes
Route::get('/logout','SuperAdminController@logout');
Route::get('/admin','AdminController@index');
Route::get('/dashboard','SuperAdminController@index');
Route::post('/admin_dashboard','AdminController@dashboard');


// Category routes
Route::get('/add_category','CategoryController@index');
Route::post('/save_category','CategoryController@save_category');
Route::get('/all_category','CategoryController@all_category');
Route::get('/unactive_category/{category_id}','CategoryController@unactive_category');
Route::get('/active_category/{category_id}','CategoryController@active_category');
Route::get('/edit_category/{category_id}','CategoryController@edit_category');
Route::post('/update_category/{category_id}','CategoryController@update_category');
Route::get('/delete_category/{category_id}','CategoryController@delete_category');


// Brand routes
Route::get('/add_manufacture','ManufactureController@index');
Route::post('/save_manufacture','ManufactureController@save_manufacture');
Route::get('/all_manufacture','ManufactureController@all_manufacture');
Route::get('/unactive_manufacture/{manufacture_id}','ManufactureController@unactive_manufacture');
Route::get('/active_manufacture/{manufacture_id}','ManufactureController@active_manufacture');
Route::get('/edit_manufacture/{manufacture_id}','ManufactureController@edit_manufacture');
Route::post('/update_manufacture/{manufacture_id}','ManufactureController@update_manufacture');
Route::get('/delete_manufacture/{manufacture_id}','ManufactureController@delete_manufacture');


// Product routes
Route::get('/add_product','ProductController@index');
Route::post('/save_product','ProductController@save_product');
Route::get('/all_product','ProductController@all_product');
Route::get('/unactive_product/{product_id}','ProductController@unactive_product');
Route::get('/active_product/{product_id}','ProductController@active_product');
Route::get('/delete_product/{product_id}','ProductController@delete_product');


// Slider routes
Route::get('/add_slider','SliderController@index');
Route::post('/save_slider','SliderController@save_slider');
Route::get('/all_slider','SliderController@all_slider');
Route::get('/unactive_slider/{slider_id}','SliderController@unactive_slider');
Route::get('/active_slider/{slider_id}','SliderController@active_slider');
Route::get('/delete_slider/{slider_id}','SliderController@delete_slider');



// Order routes
Route::get('/manage_order','CartController@manage_order');
Route::get('/view_order/{order_id}','CartController@view_order');
