@extends('layouts.master')
@section('content')

<section class="invoice-edit-wrapper">
    <div class="row">
        <!-- invoice view page -->
        <div class="col-xl-12 col-md-12 col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"><i class='bx bx-receipt'></i> Create Invoice</h4>
                </div>
                <form id="invoiceInsertForm">
                    <div class="card-content">
                        <div class="card-body pb-0 mx-25">
                            <!-- header section -->
                            <div class="row mx-0">
                                {{-- <div class="col-xl-4 col-md-12 d-flex align-items-center pl-0">
                                    <h6 class="invoice-number mr-75">Invoice#</h6>
                  <input type="text" class="form-control pt-25 w-50" placeholder="#000">
                                </div> --}}
                                <div class="col-xl-8 col-md-12 px-0 pt-xl-0 pt-1">
                                    <div>
                                        <div class="d-flex align-items-center">
                                            <small class="text-muted mr-75">Date Issue: </small>
                                            <fieldset class="d-flex">
                                                <input type="text" id="invoice-date-issue" name="date_issue"
                                                    class="form-control pickadate-months-year" placeholder="Select Date"
                                                    required data-error="#errordateissue"
                                                    data-value="{{date('yy/m/d')}}">
                                                <div id="errordateissue"></div>
                                            </fieldset>

                                        </div>

                                    </div>
                                </div>
                            </div>
                            <hr>
                            <!-- logo and title -->
                            <div class="row my-2 py-50">
                                <div class="col-sm-6 col-12 order-2 order-sm-1">
                                    <h4 class="text-primary">Invoice Name</h4>
                                    <input type="text" id="invoice-name" name="invoice_name" class="form-control"
                                        placeholder="Invoice Name" data-error="#errorinvname" required>
                                    <div id="errorinvname"></div>
                                </div>


                            </div>
                            <hr>
                            <!-- invoice address and contact -->
                            <div class="row invoice-info">
                                <div class="col-lg-6 col-md-12 mt-25">
                                    <h6 class="invoice-to">Bill To</h6>
                                    <fieldset class="invoice-address form-group">
                                        <input type="text" id="bill-name" name="bill_name" class="form-control"
                                            placeholder="Concern Person" data-error="#errorbillname" required>
                                        <div id="errorbillname"></div>
                                    </fieldset>
                                    <fieldset class="invoice-address form-group">
                                        <textarea class="form-control" id="bill-address" name="bill_address" rows="4"
                                            placeholder="Address" data-error="#errorbilladdress" required></textarea>
                                        <div id="errorbilladdress"></div>
                                    </fieldset>
                                    <fieldset class="invoice-address form-group">
                                        <input type="email" id="bill-email" name="bill_email" class="form-control"
                                            placeholder="Email" data-error="#errorbillemail" required>
                                        <div id="errorbillemail"></div>
                                    </fieldset>
                                    <fieldset class="invoice-address form-group">
                                        <input type="number" id="bill-phone" name="bill_phone" class="form-control"
                                            placeholder="Phone No." data-error="#errorbillphone" required>
                                        <div id="errorbillphone"></div>
                                    </fieldset>
                                </div>
                            </div>
                            <hr>
                        </div>
                        <div class="card-body pt-50">
                            <!-- product details table-->
                            <div class="invoice-product-details ">

                                <div data-repeater-list="group-a">
                                    <div data-repeater-item="">
                                        <div class="row mb-50">
                                            <div class="col-4 col-md-4 invoice-item-title text-center">Original Rent
                                            </div>
                                            <div class="col-4 col-md-4 invoice-item-title text-center">Collected Rent
                                            </div>
                                            <div class="col-4 col-md-4 invoice-item-title text-center">Due</div>

                                        </div>
                                        <div class="invoice-item  border rounded mb-1">
                                            <div class="invoice-item-filed row pt-1 px-1">
                                                <div class="col-12 col-md-4 form-group">
                                                    <input type="number" onkeyup=" calculateDueByRent(this, 1)"
                                                        id="original-rent" name="original_rent"
                                                        class="touchspin form-control text-center" data-bts-step="0.01"
                                                        data-bts-decimals="2" min="1" value="0" required
                                                        data-error="#errororent">
                                                    <div id="errororent"></div>
                                                </div>
                                                <div class="col-md-4 col-12 form-group">
                                                    <input type="number" onkeyup="calculateDueByRentCollected(this,1)"
                                                        id="collected-rent" name="collected_rent"
                                                        class="touchspin form-control text-center" data-bts-step="0.01"
                                                        data-bts-decimals="2" min="0" value="0" required
                                                        data-error="#errorcrent">
                                                    <div id="errorcrent"></div>
                                                </div>
                                                <div class="col-md-4 col-12 form-group">
                                                    <input type="number" onkeyup="calculateDue(this, 1)" id="due"
                                                        name="due" class="touchspin form-control text-center"
                                                        data-bts-step="0.01" data-bts-decimals="2" min="0" value="0"
                                                        required data-error="#errordue">
                                                    <div id="errordue"></div>
                                                </div>


                                            </div>

                                        </div>
                                    </div>
                                </div>


                            </div>
                            <!-- invoice subtotal -->
                            <hr>
                            <div class="invoice-subtotal pt-50">
                                <div class="row">
                                    <div class="col-md-5 col-12">

                                        <div class="form-group">
                                            <input type="text" id="bill-note" name="bill_note" class="form-control"
                                                placeholder="Add client Note" data-error="#errorbillnote" required>
                                            <div id="errorbillnote"></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-5 col-md-7 offset-lg-2 col-12">
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item d-flex justify-content-between border-0 pb-0">
                                                <span class="invoice-subtotal-title">Original Rent</span>
                                                <h6 class="invoice-subtotal-value mb-0">BDT <span
                                                        id="original-rent-span">00.00</span></h6>
                                            </li>
                                            <li class="list-group-item d-flex justify-content-between border-0 pb-0">
                                                <span class="invoice-subtotal-title">Collected Rent</span>
                                                <h6 class="invoice-subtotal-value mb-0">BDT <span
                                                        id="collected-rent-span">00.00</span></h6>
                                            </li>
                                            <li class="list-group-item d-flex justify-content-between border-0 pb-0">
                                                <span class="invoice-subtotal-title">Due</span>
                                                <h6 class="invoice-subtotal-value mb-0">BDT <span
                                                        id="due-span">00.00</span></h6>
                                            </li>
                                            <li class="list-group-item py-0 border-0 mt-25">
                                                <hr>
                                            </li>

                                            <li class="list-group-item border-0 pb-0">
                                                <button type="submit"
                                                    class="btn btn-success btn-block invoice-send-btn">
                                                    <i class='bx bx-save'></i>
                                                    <span>Save Invoice</span>
                                                </button>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- invoice action  -->
        {{-- <div class="col-xl-3 col-md-4 col-12">
            <div class="card invoice-action-wrapper shadow-none border">
                <div class="card-body">
                    <div class="invoice-action-btn mb-1">
                        <button class="btn btn-success btn-block invoice-send-btn">
                            <i class='bx bx-save'></i>
                            <span>Save Invoice</span>
                        </button>
                    </div>
                    <div class="invoice-action-btn mb-1">
                        <button class="btn btn-primary btn-block">
                            <i class='bx bx-show' ></i>
                            <span>Preview Invoice</span>
                        </button>
                    </div>
                </div>
            </div>
            
        </div> --}}
    </div>
</section>

<script>
    $(document).ready(function () {
        var today = new Date();

        //initialize current insert form validations
        initValidation();

        //datepicker  init
        $(".pickadate-months-year").pickadate({
            selectYears: !0,
            selectMonths: !0
        });


        //initializing the thouchspin function of Original rent
        $('#original-rent').on('touchspin.on.startspin', function () {
            calculateDueByRent(this, 1);
        });

        $('#original-rent').on('touchspin.on.stopspin', function () {
            calculateDueByRent(this, 1);
        });

        //initializing the thouchspin function of Original rent
        $('#collected-rent').on('touchspin.on.startspin', function () {
            calculateDueByRentCollected(this, 1);
        });

        $('#collected-rent').on('touchspin.on.stopspin', function () {
            calculateDueByRentCollected(this, 1);
        });

        //initializing the touchspin function of due
        $('#due').on('touchspin.on.startspin', function () {
            calculateDue(this, 1);
        });

        $('#due').on('touchspin.on.stopspin', function () {
            calculateDue(this, 1);
        });



    });

    var rules = {};
    var messages = {};



    /**
     * @name initValidation
     * @description initiate jquery validation for new form elements.
     * @parameter
     * @return 
     */
    function initValidation() {
        // $("input,select,textarea").not("[type=submit]").jqBootstrapValidation();


        //get input, select, textarea of form
        $('#invoiceInsertForm').find('input, select, textarea').each(function () {
            var name = $(this).attr('name');
            rules[name] = {};
            messages[name] = {};

            rules[name] = {
                required: true
            }; // set required true against every name
            //apply more rules, you can also apply custom rules & messages




        });

        console.log(rules);


    }


    /**
     * @name form onsubmit
     * @description override the default form submission and submit the form manually.
     *              also validate with .validate() method from jquery validation
     * @parameter formid
     * @return 
     */


    $('#invoiceInsertForm').submit(function (e) {
        e.preventDefault();
    }).validate({
        rules: rules,
        // messages: messages,
        highlight: function (element) {
            $(element).closest('.form-group').addClass('has-error');
            $(element).addClass('select-class');

        },
        unhighlight: function (element) {
            $(element).closest('.form-group').removeClass('has-error');
            $(element).removeClass('select-class');
        },
        errorClass: 'help-block',
        errorPlacement: function (error, element) {
            var placement = $(element).data('error');
            if (placement) {
                $(placement).append(error)
            } else {
                error.insertAfter(element);
            }
        },
        submitHandler: function (form) {
            //console.log(form);
            swal({
                    title: "Are you sure to submit?",
                    text: "Your data will be inserted!",
                    type: "info",
                    showCancelButton: true,
                    confirmButtonClass: "btn-info",
                    cancelButtonClass: "btn-warning",
                    confirmButtonText: "Yes",
                    cancelButtonText: "No",
                    closeOnConfirm: false,
                    closeOnCancel: false,
                    showLoaderOnConfirm: true
                },
                function (isConfirm) {
                    if (isConfirm) {
                        $("#xlarge").modal('hide');
                        var formData = new FormData(form);
                        $.ajax({
                            url: "{{ url('invoice/insert') }}",
                            method: "POST",
                            data: formData,
                            enctype: 'multipart/form-data',
                            processData: false,
                            cache: false,
                            contentType: false,
                            timeout: 600000,
                            success: function (result) {
                                if (typeof result.errors !== 'undefined') {
                                    // the variable is defined
                                    swal.close()
                                    var html = '';
                                    var htmlDiv = '';
                                    //console.log(result.errors);
                                    $.each(result.errors, function (index, val) {
                                        //console.log(index, val)
                                        $.each(val, function (index, val) {
                                            //console.log(index, val)
                                            html +=
                                                '<li class="list-group-item text-danger"><i class="bx bx-error"></i> ' +
                                                val + '</li>';
                                        });
                                    });


                                    htmlDiv += '<ul class="list-group border-danger">';
                                    htmlDiv += html
                                    htmlDiv += '</ul>';


                                    // html += '<div class="alert border-danger mb-2" role="alert">';
                                    // html +='<i class="bx bx-error"></i> Good Morning! Start your day with some alerts.';
                                    // html += '</div>';
                                    Swal.fire({
                                        title: '<strong>Error!</strong>',
                                        icon: 'error',
                                        html: htmlDiv,
                                        showCloseButton: true,
                                        confirmButtonText: 'Close!',
                                    })


                                } else if (typeof result.dbErrors !== 'undefined') {
                                    swal("Error!", "Database Error!Please Try Again later!",
                                        "warning");
                                } else {
                                    $(form).trigger('reset');
                                    $("#tableDiv").load(location.href + " #tableDiv");
                                    $("#home-align-end").load(location.href +
                                        " #home-align-end");
                                    swal(result, "Data inserted Successfully.", "success");
                                }

                            },
                            error: function (jqXHR, exception) {
                                var msg = '';
                                if (jqXHR.status === 0) {
                                    msg = 'Not connect.Verify Network.';
                                    swal("Error!", msg, "warning");
                                } else if (jqXHR.status == 404) {
                                    msg = 'Requested page not found. [404]';
                                    swal("Error!", msg, "warning");
                                } else if (jqXHR.status == 413) {
                                    msg = 'Request entity too large. [413]';
                                    swal("Error!", msg, "warning");
                                } else if (jqXHR.status == 500) {
                                    msg = 'Internal Server Error [500].';
                                    swal("Error!", msg, "warning");
                                } else if (exception === 'parsererror') {
                                    msg = 'Requested JSON parse failed.';
                                    swal("Error!", msg, "warning");
                                } else if (exception === 'timeout') {
                                    msg = 'Time out error.';
                                    swal("Error!", msg, "warning");
                                } else if (exception === 'abort') {
                                    msg = 'Ajax request aborted.';
                                    swal("Error!", msg, "warning");
                                } else {
                                    msg = 'Uncaught Error.\n' + jqXHR.responseText;
                                    swal("Error!", msg, "warning");
                                }

                            }
                        });


                    } else {
                        swal("Cancelled", "Your canceled this operation", "warning");
                    }
                });
            //console.log("validation success");
        }
    });

    /**
     * @name calculateDueByRent
     * @description calculate the due based on collected rent while adding original rent
     * @parameter this of original rent
     * @return 
     */
    function calculateDueByRent(data, phase) {
        console.log(data.value);
        console.log(phase);

        if (phase == 1) {
            var originalRent = parseFloat(data.value).toFixed(2);
            $("#original-rent-span").text(originalRent);
            var collectedRent = parseFloat($('#collected-rent').val());
            if (collectedRent > originalRent) {
                // swal("Error!","Invalid Value", "warning");
                $('#collected-rent').val(0);
                $('#collected-rent-span').text("00.00");
            }
            if (collectedRent >= 0) {
                var due = parseFloat(originalRent - collectedRent).toFixed(2);
                if (due > 0) {
                    $('#due').val(due);
                    $('#due-span').text(due);
                } else {
                    $('#due').val(0);
                    $('#due-span').text("00.00");
                }

            }
        } else {
            var originalRent = parseFloat(data.value);
            $("#original-rent-span").text(originalRent);
            var collectedRent = parseFloat($('#collected-rent-update').val());
            if (collectedRent > originalRent) {
                // swal("Error!","Invalid Value", "warning");
                $('#collected-rent-update').val(0);
                $('#collected-rent-span').text("00.00");
            }
            if (collectedRent >= 0) {
                var due = parseFloat(originalRent - collectedRent).toFixed(2);
                if (due > 0) {
                    $('#due-update').val(due);
                    $('#due-span').text(due);
                } else {
                    $('#due-update').val(0);
                    $('#due-span').text("00.00");
                }

            }
        }

    }

    /**
     * @name calculateDueByRentCollected
     * @description calculate the due based on original rent while adding collected rent
     * @parameter this of collected rent
     * @return 
     */
    function calculateDueByRentCollected(data, phase) {
        console.log(data.value);
        console.log(phase);
        if (phase == 1) {
            var collectedRent = parseFloat(data.value);
            $("#collected-rent-span").text(collectedRent);
            var originalRent = parseFloat($('#original-rent').val());
            if (collectedRent > originalRent) {
                swal("Error!", "Invalid Collected Rent Value", "warning");
                $('#collected-rent').val(0);
                $('#collected-rent-span').text("00.00");
                var due = parseFloat(originalRent - $('#collected-rent').val()).toFixed(2);
                if (due > 0) {
                    $('#due').val(due);
                    $('#due-span').text(due);
                } else {
                    $('#due').val(0);
                    $('#due-span').text("00.00");
                }
            } else if (originalRent > 0 && collectedRent >= 0) {
                var due = parseFloat(originalRent - collectedRent).toFixed(2);
                if (due > 0) {
                    $('#due').val(due);
                    $('#due-span').text(due);
                } else {
                    $('#due').val(0);
                    $('#due-span').text("00.00");
                }

            }
        } else {
            var collectedRent = parseFloat(data.value);
            $("#collected-rent-span").text(collectedRent);
            var originalRent = parseFloat($('#original-rent-update').val());
            if (collectedRent > originalRent) {
                swal("Error!", "Invalid Collected Rent Value", "warning");
                $('#collected-rent-update').val(0);
                $('#collected-rent-span').text("00.00");
                var due = parseFloat(originalRent - $('#collected-rent-update').val()).toFixed(2);
                if (due > 0) {
                    $('#due-update').val(due);
                    $('#due-span').text(due);
                } else {
                    $('#due-update').val(0);
                    $('#due-span').text("00.00");
                }
            } else if (originalRent > 0 && collectedRent >= 0) {
                var due = parseFloat(originalRent - collectedRent).toFixed(2);
                if (due > 0) {
                    $('#due-update').val(due);
                    $('#due-span').text(due);
                } else {
                    $('#due-update').val(0);
                    $('#due-span').text("00.00");
                }

            }
        }


    }

    /**
     * @name calculateDue
     * @description balance the collected rent amount based on due amount chnages
     * @parameter this of due
     * @return 
     */
    function calculateDue(data, phase) {
        console.log(data.value);
        console.log(phase);

        if (phase == 1) {
            var due = data.value;
            $('#due-span').text(due);
            var originalRent = parseFloat($('#original-rent').val()).toFixed(2);
            var collectedRent = parseFloat($('#collected-rent').val()).toFixed(2);

            if (collectedRent > originalRent) {
                swal("Error!", "Invalid Value", "warning");
                $('#collected-rent').val(0);
                $('#collected-rent-span').text("00.00");

            } else if (due > originalRent) {
                swal("Error!", "Invalid Due Value", "warning");

                //$("#due").val(0)
                $('#collected-rent').val(0);
                $('#collected-rent-span').text("00.00");
                var due = parseFloat(originalRent - $('#collected-rent').val()).toFixed(2);
                if (due > 0) {
                    $('#due').val(due);
                    $('#due-span').text(due);
                } else {
                    $('#due').val(0);
                    $('#due-span').text(due);
                    $('#due-span').text("00.00");
                }
            } else if (originalRent > 0) {
                var collectedRent = parseFloat(originalRent - due).toFixed(2);
                $('#collected-rent').val(collectedRent);
                $('#collected-rent-span').text(collectedRent);
                var due = parseFloat(originalRent - collectedRent).toFixed(2);
                if (due > 0) {
                    $('#due').val(due);
                    $('#due-span').text(due);
                } else {
                    $('#due').val(0);
                    $('#due-span').text("00.00");
                }


            }
        } else {
            var due = data.value;
            $('#due-span').text(due);
            var originalRent = parseFloat($('#original-rent-update').val()).toFixed(2);
            var collectedRent = parseFloat($('#collected-rent-update').val()).toFixed(2);

            if (collectedRent > originalRent) {
                swal("Error!", "Invalid Value", "warning");
                $('#collected-rent-update').val(0);
                $('#collected-rent-span').text("00.00");
            } else if (due > originalRent) {
                swal("Error!", "Invalid Due Value", "warning");

                //$("#due").val(0)
                $('#collected-rent-update').val(0);
                $('#collected-rent-span').text("00.00");
                var due = parseFloat(originalRent - $('#collected-rent-update').val()).toFixed(2);
                if (due > 0) {
                    $('#due').val(due);
                    $('#due-span').text(due);
                } else {
                    $('#due').val(0);
                    $('#due-span').text("00.00");
                }
            } else if (originalRent > 0) {
                var collectedRent = parseFloat(originalRent - due).toFixed(2);
                $('#collected-rent-update').val(collectedRent);
                $('#collected-rent-span').text(collectedRent);
                var due = parseFloat(originalRent - collectedRent).toFixed(2);
                if (due > 0) {
                    $('#due-update').val(due);
                    $('#due-span').text(due);
                } else {
                    $('#due-update').val(0);
                    $('#due-span').text("00.00");
                }


            }
        }




    }

</script>
@endsection
