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

Route::get('/', 'Product\ProductController@index');

Route::group(['middleware' => 'guest']  , function(){
    Route::get('/products', 'Product\ProductController@index')->name('products');
    Route::get('/products/add', 'Product\ProductController@addProduct')->name('products.add');
    Route::post('/products/add', 'Product\ProductController@addRequestProduct');
    Route::get('/products/edit/{id}', 'Product\ProductController@editProduct')
        ->where('id', '\d+')
        ->name('products.edit');
    Route::post('/products/edit/{id}', 'Product\ProductController@editRequestProduct')
        ->where('id', '\d+');
    Route::get('/products/priceHistory/{id}', 'Product\ProductController@priceHistory')
        ->where('products_id', '\d+')
        ->name('products.priceHistory');
    Route::delete('/products/delete', 'Product\ProductController@deleteProduct')->name('products.delete');
    });
