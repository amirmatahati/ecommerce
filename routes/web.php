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

Route::get('/', function () {
    return view('welcome');
});
*/

Auth::routes();
Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/get-product-home', 'HomeController@GetProduct');
Route::get('/category-product/{alias}', 'HomeController@CategoryProduct');
Route::get('/product/{product_alias}', 'HomeController@DetailProduct');

Route::get('/admin', 'Admin\HomeController@index')->name('admin');
Route::get('/admin/create-product', 'Admin\HomeController@createProduct')->name('admin');
Route::post('/admin/save-product', 'Admin\HomeController@storeProduct')->name('saveproduct');
Route::get('/admin/list-product', 'Admin\HomeController@IndexProduct')->name('listproduct');
Route::get('/admin/edit-product/{id}', 'Admin\HomeController@EditProduct')->name('editproduct');
Route::post('/admin/update-product/{id}', 'Admin\HomeController@UpdateProduct')->name('updateproduct');
