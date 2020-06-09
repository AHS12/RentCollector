@extends('layouts.master')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title"><i class='bx bx-receipt'></i> All Invoices</h4>
            </div>
            <div class="card-content">
                <div class="card-body card-dashboard">

                    <div class="table-responsive" id="contentDiv">
                        <table class="table zero-configuration">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Date</th>
                                    <th>Invoice <br>No</th>
                                    <th>Invoice <br>name</th>
                                    <th>Original <br> Rent</th>
                                    <th>Collected <br> Rent</th>
                                    <th>Due</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($invoices as $invoice)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td onclick="invoiceDetails('{{$invoice->id}}')">{{date('d-m-Y', strtotime($invoice->date_issue))}}</td>
                                    <td><a href="{{url('invoice/details',$invoice->id)}}">{{$invoice->inv_no}}</a></td>
                                    <td onclick="invoiceDetails('{{$invoice->id}}')">{{$invoice->inv_name}}</td>
                                    <td>{{$invoice->original_rent}}</td>
                                    <td>{{$invoice->collected_rent}}</td>
                                    <td>{{$invoice->due}}</td>
                                    <td>
                                        <a href="javaScript:void(0);" onclick="invoiceDetails('{{$invoice->id}}')"
                                            style="padding: 5px 10px;" class="btn btn-default btn-xs border"
                                            data-toggle="tooltip" data-placement="top" title=""
                                            data-original-title="Details">
                                            <i class="bx bx-info-circle"></i>
                                        </a>
                                        <a href="javaScript:void(0);" onclick="editInvoice('{{encrypt($invoice->id)}}')"
                                            style="padding: 5px 10px;" class="btn btn-default btn-xs border"
                                            data-toggle="tooltip" data-placement="top" title=""
                                            data-original-title="Edit">
                                            <i class="bx bx-edit"></i>
                                        </a>
                                        <a href="javaScript:void(0);" onclick="deleteInvoice('{{encrypt($invoice->id)}}')"
                                            style="padding: 5px 10px;" class="btn btn-default btn-xs border"
                                            data-toggle="tooltip" data-placement="top" title=""
                                            data-original-title="Delete">
                                            <i class="bx bx-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach



                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Date</th>
                                    <th>Invoice <br>No</th>
                                    <th>Invoice <br>Name</th>
                                    <th>Original <br> Rent</th>
                                    <th>Collected <br> Rent</th>
                                    <th>Due</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


{{-- floating action button --}}
<button type="button" onclick="invoiceAdd()" data-toggle="tooltip" data-placement="top" title=""
    data-original-title="Create Invoice" class="btn btn-info chat-demo-button btn-circle btn-xl"><i
        class="fas fa-plus"></i>
</button>


<script>


      /**
     * @name invoiceAdd
     * @description redirect to invoice create page
     * @parameter apertment id
     * @return 
     */

     function invoiceAdd() {
        var url = "{{url('invoice/new')}}";
        window.location.href = url;
    }

     /**
     * @name apertmentDetails
     * @description redirect to invoice Details page
     * @parameter apertment id
     * @return 
     */

     function invoiceDetails(id) {
        //console.log(id);
        var url = "{{url('invoice/details','id')}}";
        url = url.replace('id',id);
        //console.log(url);
        window.location.href = url;
    }
</script>
@endsection