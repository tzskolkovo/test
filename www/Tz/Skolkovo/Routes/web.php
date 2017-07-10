<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your module. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
Route::group(['as' => 'skolkovo_'], function () {
    Route::get('/', ['uses' => 'MainController@index', 'as' => 'index']);
    Route::post('/order', ['uses' => 'OrdersController@store', 'as' => 'order_store']);
});
