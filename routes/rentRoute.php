<?php
//apertment


//view route
Route::group(['middleware' => 'auth'], function () {
    Route::get('apertment/rents','rent\RentController@rentApertmentView');
    Route::get('apertment/rent/ajaxload','rent\RentController@rentApertmentAjaxLoad');
    Route::get('apertment/rent/details/{id}','rent\RentController@rentApertmentDetailsView');
 });

//internal
Route::group(['middleware' => 'auth'], function () {

    Route::post('apertment/rent/insert','rent\RentController@rentApertmentInsertAjax');
    Route::post('apertment/rent/update','rent\RentController@rentApertmentUpdatetAjax');
    Route::post('apertment/rent/delete','rent\RentController@rentApertmentDeleteAjax');
    Route::post('apertment/rent/getDetails','rent\RentController@getRentApertmentDetails');
     
 });








//shop