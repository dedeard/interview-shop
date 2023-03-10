<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('/carts', 'CartsController@index')->name('carts');
Route::get('/checkout', 'CheckoutController@index')->name('checkout');
Route::post('/checkout', 'CheckoutController@checkout')->name('checkout');

Route::get('/orders', 'OrdersController@index')->name('orders.index');
Route::get('/orders/{id}', 'OrdersController@show')->name('orders.show');
