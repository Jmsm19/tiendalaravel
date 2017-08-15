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

Route::get('/', 'StoreController@index')->name('store');
Route::get('/details/{id}', 'StoreController@show')->name('details');

Auth::routes();

Route::get('/admin', 'HomeController@index')->name('home');

Route::resource('/cart', 'CartController');

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
  Route::get('/', 'HomeController@admin')->name('admin');
  Route::get('/admin/product/{$id}', 'ProductsController@showSorted');
  Route::resource('product', 'ProductsController');
  Route::resource('category', 'CategoriesController');  
});