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

Auth::routes();

Route::group(['middleware' => ['web']], function () {
  Route::get('/', 'StoreController@index')->name('store');
  Route::get('/details/{id}', 'StoreController@show')->name('details');
  Route::resource('/cart', 'CartController');
});

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function () {
  Route::get('/', 'HomeController@admin')->name('admin');
  Route::resource('product', 'ProductsController');
  Route::resource('category', 'CategoriesController');  
  Route::get('/order/{status?}', 'OrderController@show');
  Route::put('/order/edit/{id}', 'OrderController@changeStatus')->name('order.edit');
});

Route::group(['middleware' => 'auth'], function () {
  Route::resource('address', 'AddressController');
});

Route::group(['prefix' => 'purchase'], function() { 
    Route::get('/', 'CheckoutController@preparePurchase');
    Route::get('/shipping', 'CheckoutController@shipping')->name('checkout.shipping');
    Route::get('/payment/{id}', 'CheckoutController@payment')->name('checkout.payment');
    Route::post('/order/{id}', 'CheckoutController@order')->name('checkout.order');
});