<?php 

//view route
Route::group(['middleware' => 'auth'], function () {
    Route::get('invoices','invoice\InvoiceController@invoiceView');
    Route::get('invoice/ajaxload','invoice\InvoiceController@invoiceAjaxLoad');
    Route::get('invoice/new','invoice\InvoiceController@invoiceAddView');
    Route::get('invoice/details/{id}','invoice\InvoiceController@invoiceDetailsView');
    Route::get('invoice/edit/{id}','invoice\InvoiceController@invoiceEditView');
 });

//internal
Route::group(['middleware' => 'auth'], function () {

    Route::post('invoice/insert','invoice\InvoiceController@invoiceInsertAjax');
    Route::post('invoice/update','invoice\InvoiceController@invoiceUpdatetAjax');
    Route::post('invoice/delete','invoice\InvoiceController@invoiceDeleteAjax');
    Route::post('invoice/getDetails','invoice\InvoiceController@getInvoiceDetails');
     
 });