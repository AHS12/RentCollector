<?php

//view Route
Route::group(['middleware' => 'auth'], function () {
   Route::get('apertments','home\ApertmentController@apertmentView');
});

//internal Route
Route::group(['middleware' => 'auth'], function () {

    
});