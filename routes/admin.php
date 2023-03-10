<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'DashboardController@index')->name('dashboard');

Route::resource('categories', 'CategoriesController')->except(['show']);

Route::resource('products', 'ProductsController')->except(['show']);
Route::post('/products/{product}/cover', 'ProductsController@updateCover')->name('products.update.cover');
Route::post('/products/{product}/video', 'ProductsController@updateVideo')->name('products.update.video');
