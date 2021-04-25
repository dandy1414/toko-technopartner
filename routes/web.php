<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/product/index', 'ProductController@index')->name('index');
Route::get('/image/index', 'ProductController@imageIndex')->name('image.index');
Route::get('/product/create', 'ProductController@create')->name('create');
Route::get('/image/create', 'ProductController@imageCreate')->name('image.create');
Route::post('/product/store', 'ProductController@store')->name('store');
Route::post('/image/store', 'ProductController@imageStore')->name('image.store');
Route::get('/product/edit/{id}', 'ProductController@edit')->name('product.edit');
