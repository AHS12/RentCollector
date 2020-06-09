@extends('layouts.master')
@section('content')
<section class="invoice-view-wrapper">
    <div class="row">
      <!-- invoice view page -->
      <div class="col-xl-9 col-md-8 col-12">
        <div class="card">
          <div class="card-content">
            <div class="card-body pb-0 mx-25">
              <!-- header section -->
              <div class="row">
                <div class="col-xl-4 col-md-12">
                  <span class="invoice-number mr-50">Invoice#</span>
                <span>{{$invoice->inv_no}}</span>
                </div>
                <div class="col-xl-8 col-md-12">
                  <div class="d-flex align-items-center justify-content-xl-end flex-wrap">
                    {{-- <div class="mr-3">
                      <small class="text-muted">Date Issue:</small>
                      <span>08/10/2019</span>
                    </div> --}}
                    <div>
                      <small class="text-muted">Date Issue:</small>
                    <span>{{$invoice->date_issue}}</span>
                    </div>
                  </div>
                </div>
              </div>
              <!-- logo and title -->
              <div class="row my-3">
                <div class="col-6">
                  <h4 class="text-primary">Invoice</h4>
                <span>{{$invoice->inv_name}}</span>
                </div>
                
              </div>
              <hr>
              <!-- invoice address and contact -->
              <div class="row invoice-info">
                <div class="col-6 mt-1">
                  <h6 class="invoice-from">Bill From</h6>
                  <div class="mb-1">
                  <span>{{$invoice->user->name}}</span>
                  </div>
                  <div class="mb-1">
                  <span>{{$invoice->user->email}}</span>
                  </div>
                  {{-- <div class="mb-1">
                    <span>hello@clevision.net</span>
                  </div>
                  <div class="mb-1">
                    <span>601-678-8022</span>
                  </div> --}}
                </div>
                <div class="col-6 mt-1">
                  <h6 class="invoice-to">Bill To</h6>
                  <div class="mb-1">
                  <span>{{$invoice->bill_name}}</span>
                  </div>
                  <div class="mb-1">
                  <span>{{$invoice->bill_address}}</span>
                  </div>
                  <div class="mb-1">
                  <span>{{$invoice->bill_email}}</span>
                  </div>
                  <div class="mb-1">
                  <span>{{$invoice->bill_phone}}</span>
                  </div>
                </div>
              </div>
              <hr>
            </div>
            <!-- product details table-->
            <div class="invoice-product-details table-responsive mx-md-25">
              <table class="table table-borderless mb-0">
                <thead>
                  <tr class="border-0">
                    <th scope="col" class="text-center">Original <br>Rent</th>
                    <th scope="col" class="text-center">Collected <br>Rent</th>
                    <th scope="col" class="text-center">Due</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                  <td class="text-primary text-center font-weight-bold">BDT {{number_format($invoice->original_rent, 2)}}</td>
                  <td class="text-primary text-center font-weight-bold">BDT {{number_format($invoice->collected_rent, 2)}}</td>
                  <td class="text-primary text-center font-weight-bold">BDT {{number_format($invoice->due, 2)}}</td>
                  </tr>
                </tbody>
              </table>
            </div>
  
            <!-- invoice subtotal -->
            <div class="card-body pt-0 mx-25">
              <hr>
              <div class="row">
                <div class="col-4 col-sm-6 mt-75">
                <p>{{$invoice->bill_note}}</p>
                </div>
                <div class="col-8 col-sm-6 d-flex justify-content-end mt-75">
                  <div class="invoice-subtotal">
                    <div class="invoice-calc d-flex justify-content-between">
                      <span class="invoice-title">Original Rent</span>
                    <span class="invoice-value">BDT <span>{{ number_format($invoice->original_rent, 2)}}</span></span>
                    </div>
                    <div class="invoice-calc d-flex justify-content-between">
                      <span class="invoice-title">Collected Rent</span>
                      <span class="invoice-value">BDT <span>{{number_format($invoice->collected_rent, 2)}}</span></span>
                    </div>
                    <hr>
                    <div class="invoice-calc d-flex justify-content-between">
                      <span class="invoice-title">Due</span>
                      <span class="invoice-value">BDT <span>{{number_format($invoice->due, 2)}}</span></span>
                    </div>
                    
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- invoice action  -->
      <div class="col-xl-3 col-md-4 col-12">
        <div class="card invoice-action-wrapper shadow-none border">
          <div class="card-body">
            <div class="invoice-action-btn">
              <button class="btn btn-success btn-block invoice-send-btn">
                <i class="bx bx-send"></i>
                <span>Send Invoice</span>
              </button>
            </div>
            <div class="invoice-action-btn">
                <button class="btn btn-info btn-block">
                  <i class='bx bx-edit'></i>
                  <span>Edit Invoice</span>
                </button>
              </div>
            <div class="invoice-action-btn">
              <button class="btn btn-primary btn-block">
                <i class='bx bx-printer'></i>
                <span>Print Invoice</span>
              </button>
            </div>
            <div class="invoice-action-btn">
                <button class="btn btn-info btn-block">
                    <i class='bx bx-download'></i>
                  <span>Download Invoice</span>
                </button>
              </div>
            <div class="invoice-action-btn">
                <button class="btn btn-danger btn-block">
                  <i class='bx bx-trash'></i>
                  <span>Delete Invoice</span>
                </button>
              </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection