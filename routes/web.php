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

//Front-end
Route::get('/', 'HomeController@index');




//Backend
Route::get('/admin', 'AdminController@index');
Route::get('/dashboard', 'AdminController@show_dashboard');
Route::post('/admin-dashboard', 'AdminController@dashboard');
Route::get('/logout', 'AdminController@logout');

//category product

Route::get('/add-category-product', 'CategoryProduct@add_category_product');
Route::get('/edit-category-product/{category_product_id}', 'CategoryProduct@edit_category_product');
Route::get('/delete-category-product/{category_product_id}', 'CategoryProduct@delete_category_product');
Route::get('/all-category-product', 'CategoryProduct@all_category_product');

Route::get('/active_category_product/{category_product_id}', 'CategoryProduct@active_category_product');
Route::get('/unactive_category_product/{category_product_id}', 'CategoryProduct@unactive_category_product');


Route::post('/save-category-product', 'CategoryProduct@save_category_product');
Route::post('/update-category-product/{category_product_id}', 'CategoryProduct@update_category_product');

// brand product
Route::get('/add-brand-product', 'BrandproductController@add_brand_product');
Route::get('/edit-brand-product/{brand_product_id}', 'BrandproductController@edit_brand_product');
Route::get('/delete-brand-product/{brand_product_id}', 'BrandproductController@delete_brand_product');
Route::get('/all-brand-product', 'BrandproductController@all_category_product');

Route::get('/active_brand_product/{brand_product_id}', 'BrandproductController@active_brand_product');
Route::get('/unactive_brand_product/{brand_product_id}', 'BrandproductController@unactive_brand_product');


Route::post('/save-brand-product', 'BrandproductController@save_brand_product');
Route::post('/update-brand-product/{brand_product_id}', 'BrandproductController@update_brand_product');
