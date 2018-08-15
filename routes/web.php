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

// ini manual sendiri2
// Route::get('product', 'ProductController@index');
// ini utk otomatis
Route::resource('product', 'ProductController');
Route::resource('problem', 'ProblemController');

Route::post('problem/search', 'ProblemController@search');

Route::get('problems', function () {
    return App\Problem::all();
});

