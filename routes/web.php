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

Route::get('/', function () {
    return view('welcome');
});


Route::resource('media', 'PostsController');
Route::post('media/create/store','PostsController@storeBlog');
Route::get('media/category/{category}', 'PostsController@showCategory');

Route::resource('/photos', 'PhotosController', ['only' => ['create', 'store']]);
Route::resource('comment','CommentsController');
