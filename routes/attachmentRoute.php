<?php 
//internal Route
Route::group(['middleware' => 'auth'], function () {


    Route::post('attachment/delete','attachment\AttachmentController@attachmentDeleteAjax');
    Route::post('attachment/download','attachment\AttachmentController@attachmentDownload');
    
     
 });