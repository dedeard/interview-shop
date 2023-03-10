<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes(['reset' => false, 'confirm' => false, 'verify' => false,]);

Route::get('/', 'HomeController@index')->name('home');

Route::get('/carts', 'CartsController@index')->name('carts');
Route::get('/checkout', 'CheckoutController@index')->name('checkout');
Route::post('/checkout', 'CheckoutController@checkout')->name('checkout');

Route::get('/orders', 'OrdersController@index')->name('orders.index');
Route::get('/orders/{id}', 'OrdersController@show')->name('orders.show');
Route::post('/orders/{id}/proof', 'OrdersController@updateProof')->name('orders.update.proof');
Route::get('/orders/{id}/confirm', 'OrdersController@confirmReceived')->name('orders.update.confirm.received');
Route::delete('/orders/{id}', 'OrdersController@cancelOrder')->name('orders.cancel');

Route::get('/products', 'ProductsController@index')->name('products.index');
Route::get('/products/{slug}', 'ProductsController@show')->name('products.show');
