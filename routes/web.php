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

Route::resource('buku', 'BukuController');
Route::post('buku/search','BukuController@search');
Route::resource('penerbit', 'PenerbitController');
Route::post('penerbit/search','PenerbitController@search');
Route::resource('stockbuku', 'StockBukuController');
Route::Post('stockbuku/search','StockBukuController@search');
Auth::routes();

Route::get('/', 'StockBukuController@index');
