<?php

//view Route
Route::group(['middleware' => 'auth'], function () {
   Route::get('apertments','home\ApertmentController@apertmentView');
   Route::get('apertment/details/{id}','home\ApertmentController@apertmentDetailsView');
});

//internal Route
Route::group(['middleware' => 'auth'], function () {

   Route::post('apertment/insert','home\ApertmentController@apertmentInsertAjax');
   Route::post('apertment/update','home\ApertmentController@apertmentUpdatetAjax');
   Route::post('apertment/delete','home\ApertmentController@apertmentDeleteAjax');
   Route::post('apertment/getDetails','home\ApertmentController@getApertmentDetails');
    
});