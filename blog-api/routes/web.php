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

Route::get('/', 'PostController@index');
Route::get('/create', 'PostController@create');
Route::get('/view_post/{id}', 'PostController@show');
Route::get('/edit_post/{id}', 'PostController@edit');
Route::resource('posts', 'PostController');

Route::get('/welcome', function () {
    return view('welcome');
});