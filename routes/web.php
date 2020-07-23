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
    return view('index');
})->name('home');

Route::group(['prefix' => 'vendors', 'as' => 'vendors.'], function () {

  Route::get('/', 'SalesmanController@index')->name('index');
  Route::get('/create', 'SalesmanController@create')->name('create');
  Route::post('/', 'SalesmanController@store')->name('store');
  Route::get('{user}/sales', 'SalesmanController@sales')->name('sales');

});

Route::group(['prefix' => 'sales', 'as' => 'sales.'], function () {

  Route::get('/', 'SaleController@index')->name('index');
  Route::get('/create', 'SaleController@create')->name('create');
  Route::post('/', 'SaleController@store')->name('store');

});
