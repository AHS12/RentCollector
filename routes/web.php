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


Route::group(['middleware' => 'auth'], function () {

    Route::get('/', function () {
        return view('welcome');
    });
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


//home route
include 'homeRoute.php';
//shop route
include 'shopRoute.php';
//rent route
include 'rentRoute.php';
//attachment route
include 'attachmentRoute.php';