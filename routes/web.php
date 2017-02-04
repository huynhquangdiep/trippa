<?php

use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/


Route::get('/', function () {
    return view('welcome');
});

Route::group(['namespace' => 'Frontend'], function() {
    Route::resource('home', 'HomeController');
});

Route::group(['namespace' => 'Backend'], function() {
    Route::resource('user', 'UserController');
});

Auth::routes();
