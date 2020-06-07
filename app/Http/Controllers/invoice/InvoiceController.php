<?php

namespace App\Http\Controllers\invoice;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InvoiceController extends Controller
{
    //

    /**
     * @name invoiceAddView
     * @role add a new manual invoice view
     * @param 
     * @return compact array with view
     *
     */
    public function invoiceAddView(){

        return view('invoice.invoiceAdd');
    }
}
