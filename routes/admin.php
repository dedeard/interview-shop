<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'DashboardController@index')->name('dashboard');

Route::resource('users', 'UsersController')->except(['show']);

Route::resource('categories', 'CategoriesController')->except(['show']);

Route::resource('products', 'ProductsController')->except(['show']);
Route::post('/products/{product}/cover', 'ProductsController@updateCover')->name('products.update.cover');
Route::post('/products/{product}/video', 'ProductsController@updateVideo')->name('products.update.video');

Route::resource('orders', 'OrdersController')->only(['index', 'show', 'destroy']);
Route::post('orders/{order}/confirm-transaction', 'OrdersController@confirmTransaction')->name('orders.confirm.transaction');
Route::post('orders/{order}/update-receipt', 'OrdersController@updateReceipt')->name('orders.update.receipt');
