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
});