<?php

namespace App\Http\Controllers\invoice;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Traits\NumericTrait;
use App\invoice\InvoiceModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\PDF;

class InvoiceController extends Controller
{
    //adding numeric trait
    use NumericTrait;

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

    /**
     * @name invoiceView
     * @role list of all invoice view
     * @param 
     * @return compact array with view
     *
     */
    public function invoiceView(){
        $userId = Auth::user()->id;
        $invoices = InvoiceModel::where('user_id',$userId)->get();

        $data = [
            'invoices' => $invoices
        ];
        
        return view('invoice.invoicesView',$data);
    }


    /**
     * @name invoiceAddView
     * @role details of an invoice view
     * @param Request from array
     * @return compact array with view
     *
     */
    public function invoiceDetailsView(Request $request){

        $id = $request->id;
        $userId = Auth::user()->id;
        if (!InvoiceModel::where('id', $id)->exists()) abort(404);
        if (!InvoiceModel::where('id', $id)->where('user_id', $userId)->exists()) abort(401);
        
        $invoice = InvoiceModel::where('id', $id)->where('user_id', $userId)->with('user')->first();
        //dd($invoice);
        $data = [
            'invoice'      => $invoice,
        ];
        return view('invoice.invoiceDetailsView',$data);
    }


    /**
     * @name invoiceInsertAjax
     * @role insert invoice record into the database
     * @param Request from array
     * @return json response
     *
     */
    public function invoiceInsertAjax(Request $request){

        $userName = Auth::user()->name;
        $userId = Auth::user()->id;
        $defaultStatus = 1; //manual invoice status 1.Auto generated Invoice status 0

        //converting date to mysql supported format
        $dateIssue = date("Y-m-d", strtotime($request->date_issue));

        //generating invoice No
        $rowCount = InvoiceModel::count()+1;
        $invoicNo = "INV-".$this->addLeadingZero($rowCount,4);

        //gettings attributes
        $attributeNames = array(
            'user_id'                 => $userId,
            'date_issue'              => $dateIssue,
            'inv_no'                  => $invoicNo,
            'inv_name'                => $request->invoice_name,
            'bill_name'               => $request->bill_name,
            'bill_address'            => $request->bill_address,
            'bill_email'              => $request->bill_email,
            'bill_phone'              => $request->bill_phone,
            'bill_note'               => $request->bill_note,
            'original_rent'           => $request->original_rent,
            'collected_rent'          => $request->collected_rent,
            'due'                     => $request->due,
            'created_by'              => $userName,
            'updated_by'              => $userName,
            'status'                  => $defaultStatus,

        );

        //return dd($attributeNames);

        //validating the attributes
        $validator = Validator::make(
            $attributeNames,
            [

                'date_issue'        => 'required|date',
                'inv_name'          => 'required|min:3',
                'bill_name'         => 'required|min:3',
                'bill_address'      => 'required|min:5',
                'bill_email'        => 'required|email',
                'bill_phone'        => 'required|numeric|digits:11',
                'bill_note'         => 'required|min:5',
                'original_rent'     => 'required|numeric|min:1',
                'collected_rent'    => 'required|numeric|min:0',
                'due'               => 'required|numeric|min:0',

            ]
        );

        if ($validator->fails()) {
            return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        } else {

            //code...
            //generate pdf

            //update attribute array


            //insert Operation
            InvoiceModel::create($attributeNames);
            return response()->json("Success");
        }

        

    }
}
