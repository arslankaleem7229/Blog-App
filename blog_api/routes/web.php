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

Route::get('dashboard', 'App\Http\Controllers\DashboardController@index');
Route::get('create-category', 'App\Http\Controllers\CategoryController@create');
Route::post('post-category-form', 'App\Http\Controllers\CategoryController@store');
Route::get('all-categories', 'App\Http\Controllers\CategoryController@index');
Route::get('edit-category/{id}', 'App\Http\Controllers\CategoryController@edit');
Route::post('update-category/{id}', 'App\Http\Controllers\CategoryController@update');
Route::get('delete-category/{id}', 'App\Http\Controllers\CategoryController@destroy');
Route::get('delete-all-category', 'App\Http\Controllers\CategoryController@truncate');
Route::get('get-blog-post-form', 'App\Http\Controllers\BlogPostController@create');
Route::post('store-blog-post', 'App\Http\Controllers\BlogPostController@store');
Route::get('get-blog-posts', 'App\Http\Controllers\BlogPostController@index');
Route::get('blog-post-details/{id}', 'App\Http\Controllers\BlogPostController@details');
Route::get('edit-blogpost/{id}', 'App\Http\Controllers\BlogPostController@edit');
Route::get('update-blog-post/{id}', 'App\Http\Controllers\BlogPostController@update');