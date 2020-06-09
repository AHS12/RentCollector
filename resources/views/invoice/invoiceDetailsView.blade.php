@extends('layouts.master')
@section('content')
<section class="invoice-view-wrapper">
    <div class="row">
      <!-- invoice view page -->
      <div id="invoiceDiv" class="col-xl-9 col-md-8 col-12">
        <div class="card invoice-print-area">
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
              <button class="btn btn-primary btn-block invoice-print">
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


  <script>
    //  function PrintElem(elem) {
    //   Popup(jQuery(elem).html());
    //   }



    //   function Popup(data) {
    
    //   var mywindow = window.open('', 'Report', 'height=768,width=1366');
    //     mywindow.document.write('<html><head><title></title>');
    //     mywindow.document.write('<link rel="shortcut icon" type="image/x-icon" href="{{asset('favicon.ico')}}">');
    //     mywindow.document.write('<link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,600%7CIBM+Plex+Sans:300,400,500,600,700" rel="stylesheet">');
    //     mywindow.document.write('<link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/vendors.min.css')}}">');
    //     mywindow.document.write('<link rel="stylesheet" type="text/css" href="{{asset('app-assets/fonts/fontawesome/css/all.css')}}">');
    //     mywindow.document.write('<link rel="stylesheet" type="text/css" href="{{asset('app-assets/fonts/boxicons/css/boxicons.min.css')}}">');
    //     mywindow.document.write('<link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/tables/datatable/datatables.min.css')}}">');
    //     mywindow.document.write('<link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/ui/prism.min.css')}}">');
    //     mywindow.document.write('<link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/file-uploaders/dropzone.min.css')}}">');
    //     mywindow.document.write('<link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/forms/select/select2.min.css')}}">');
    //     mywindow.document.write('<link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/pickers/pickadate/pickadate.css')}}">');
    //     mywindow.document.write('<link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/pickers/daterange/daterangepicker.css')}}">');
    //     mywindow.document.write('<link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/forms/spinner/jquery.bootstrap-touchspin.css')}}">');
    //     mywindow.document.write('<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/bootstrap.min.css')}}">');
    //     mywindow.document.write('<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/bootstrap-extended.min.css')}}">');
    //     mywindow.document.write('<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/colors.min.css')}}">');
    //     mywindow.document.write('<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/components.min.css')}}">');
    //     mywindow.document.write('<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/themes/dark-layout.min.css')}}">');
    //     mywindow.document.write('<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/themes/semi-dark-layout.min.css')}}">');
    //     mywindow.document.write('<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/core/menu/menu-types/vertical-menu.min.css')}}">');
    //     mywindow.document.write('<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/plugins/file-uploaders/dropzone.min.css')}}">');
    //     mywindow.document.write('<link rel="stylesheet" type="text/css" href="{{asset('packages/bootstrap-sweetalert/dist/sweetalert.css')}}">');
    //     mywindow.document.write('<link rel="stylesheet" type="text/css" href="{{asset('packages/sweetalert2/dist/sweetalert2.min.css')}}">');
    //     mywindow.document.write('<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/pages/app-invoice.min.css')}}">');
    //     mywindow.document.write('<link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">');
    //     mywindow.document.write('<script src="{{asset('app-assets/vendors/js/vendors.min.js')}}"><\/script>');
    //     mywindow.document.write('</head><body>');
       
    //     mywindow.document.write(data);
        
    //     mywindow.document.write('<script src="{{asset('app-assets/fonts/LivIconsEvo/js/LivIconsEvo.tools.min.js')}}"><\/script>');
    //     mywindow.document.write('<script src="{{asset('app-assets/fonts/LivIconsEvo/js/LivIconsEvo.defaults.min.js')}}"><\/script>');
    //     mywindow.document.write('<script src="{{asset('app-assets/fonts/LivIconsEvo/js/LivIconsEvo.min.js')}}"><\/script>');
    //     mywindow.document.write('<script src="{{asset('app-assets/vendors/js/tables/datatable/datatables.min.js')}}"><\/script>');
    //     mywindow.document.write('<script src="{{asset('app-assets/vendors/js/tables/datatable/dataTables.bootstrap4.min.js')}}"><\/script>');
    //     mywindow.document.write('<script src="{{asset('app-assets/vendors/js/tables/datatable/dataTables.buttons.min.js')}}"><\/script>');
    //     mywindow.document.write('<script src="{{asset('app-assets/vendors/js/tables/datatable/buttons.html5.min.js')}}"><\/script>');
    //     mywindow.document.write('<script src="{{asset('app-assets/vendors/js/tables/datatable/buttons.print.min.js')}}"><\/script>');
    //     mywindow.document.write('<script src="{{asset('app-assets/vendors/js/tables/datatable/buttons.bootstrap.min.js')}}"><\/script>');
    //     mywindow.document.write('<script src="{{asset('app-assets/vendors/js/tables/datatable/pdfmake.min.js')}}"><\/script>');
    //     mywindow.document.write('<script src="{{asset('app-assets/vendors/js/tables/datatable/vfs_fonts.js')}}"><\/script>');
    //     mywindow.document.write('<script src="{{asset('app-assets/vendors/js/forms/validation/jqBootstrapValidation.js')}}"><\/script>');
    //     mywindow.document.write('<script src="{{asset('app-assets/vendors/js/extensions/dropzone.min.js')}}"><\/script>');
    //     mywindow.document.write('<script src="{{asset('app-assets/vendors/js/ui/prism.min.js')}}"><\/script>');
    //     mywindow.document.write('<script src="{{asset('packages/bootstrap-sweetalert/dist/sweetalert.min.js')}}"><\/script>');
    //     mywindow.document.write('<script src="{{asset('app-assets/vendors/js/extensions/polyfill.min.js')}}"><\/script>');
    //     mywindow.document.write('<script src="{{asset('app-assets/vendors/js/forms/select/select2.full.min.js')}}"><\/script>');
    //     mywindow.document.write('<script src="{{asset('app-assets/vendors/js/pickers/pickadate/picker.js')}}"><\/script>');
    //     mywindow.document.write('<script src="{{asset('app-assets/vendors/js/pickers/pickadate/picker.date.js')}}"><\/script>');
    //     mywindow.document.write('<script src="{{asset('app-assets/vendors/js/pickers/pickadate/picker.time.js')}}"><\/script>');
    //     mywindow.document.write('<script src="{{asset('app-assets/vendors/js/pickers/pickadate/legacy.js')}}"><\/script>');
    //     mywindow.document.write('<script src="{{asset('app-assets/vendors/js/pickers/daterange/moment.min.js')}}"><\/script>');
    //     mywindow.document.write('<script src="{{asset('app-assets/vendors/js/pickers/daterange/daterangepicker.js')}}"><\/script>');
    //     mywindow.document.write('<script src="{{asset('app-assets/vendors/js/forms/spinner/jquery.bootstrap-touchspin.js')}}"><\/script>');
    //     mywindow.document.write('<script src="{{asset('app-assets/vendors/js/forms/repeater/jquery.repeater.min.js')}}"><\/script>');
    //     mywindow.document.write('<script src="{{asset('app-assets/js/scripts/configs/vertical-menu-light.min.js')}}"><\/script>');
    //     mywindow.document.write('<script src="{{asset('app-assets/js/core/app-menu.min.js')}}"><\/script>');
    //     mywindow.document.write('<script src="{{asset('app-assets/js/core/app.min.js')}}"><\/script>');
    //     mywindow.document.write('<script src="{{asset('app-assets/js/scripts/components.min.js')}}"><\/script>');
    //     mywindow.document.write('<script src="{{asset('app-assets/js/scripts/footer.min.js')}}"><\/script>');
    //     mywindow.document.write('<script src="{{asset('app-assets/js/scripts/customizer.min.js')}}"><\/script>');
    //     mywindow.document.write('<script src="{{asset('app-assets/js/scripts/datatables/datatable.min.js')}}"><\/script>');
    //     mywindow.document.write('<script src="{{asset('app-assets/js/scripts/modal/components-modal.min.js')}}"><\/script>');
    //     mywindow.document.write('<script src="{{asset('app-assets/js/scripts/forms/select/form-select2.min.js')}}"><\/script>');
    //     mywindow.document.write('<script src="{{asset('app-assets/js/scripts/forms/number-input.min.js')}}"><\/script>');
    //     mywindow.document.write('<script src="{{asset('app-assets/js/scripts/pages/app-invoice.min.js')}}"><\/script>');
    //     mywindow.document.write('</body></html>');
    //   mywindow.document.close();
    //   setTimeout(function () {
    //   mywindow.print();
    //   }, 200)

    //   }
  </script>
@endsection