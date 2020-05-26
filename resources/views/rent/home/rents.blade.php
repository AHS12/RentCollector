@extends('layouts.master')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title"><i class='bx bx-money'></i> Apertment Rents</h4>
            </div>
            <div class="card-content">
                <div class="card-body card-dashboard">

                    <div class="table-responsive" id="contentDiv">
                        <table class="table zero-configuration">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Date</th>
                                    <th>Month</th>
                                    <th>Apertment</th>
                                    <th>Original <br> Rent</th>
                                    <th>Collected <br> Rent</th>
                                    <th>Due</th>
                                    <th>Expense</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($rents as $rent)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$rent->date}}</td>
                                    <td>{{$rent->month}}</td>
                                    <td>{{$rent->apertment->name}}</td>
                                    <td>{{$rent->original_rent}}</td>
                                    <td>{{$rent->rent}}</td>
                                    <td>{{$rent->due}}</td>
                                    <td>{{$rent->expense}}</td>
                                    <td>
                                        <a href="javaScript:void(0);" onclick="editRent('{{encrypt($rent->id)}}')"
                                            style="padding: 5px 10px;" class="btn btn-default btn-xs border"
                                            data-toggle="tooltip" data-placement="top" title=""
                                            data-original-title="Delete">
                                            <i class="bx bx-edit"></i>
                                        </a>
                                        <a href="javaScript:void(0);" onclick="deleteRent('{{encrypt($rent->id)}}')"
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
                                    <th>Month</th>
                                    <th>Apertment</th>
                                    <th>Original <br> Rent</th>
                                    <th>Collected <br> Rent</th>
                                    <th>Due</th>
                                    <th>Expense</th>
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
<button type="button" onclick="openModal('rent-add-modal')" data-toggle="tooltip" data-placement="top" title=""
    data-original-title="Add New Rent" class="btn btn-info chat-demo-button btn-circle btn-xl"><i
        class="fas fa-plus"></i>
</button>


{{-- add rent modal --}}
<div class="modal fade text-left w-100" id="rent-add-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel16"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="rent-add-modal-title">Add Rent</h4>
                <button type="button" class="close" onclick="closeModalStatic('rent-add-modal')" aria-label="Close">
                    <i class="bx bx-x"></i>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" id="rentInsertForm">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <div class="controls">
                                    <label for="first-name-vertical">Choose Date</label>
                                    <fieldset class="form-group position-relative has-icon-left">
                                        <input type="text" id="rent-date" name="rent_date"
                                            class="form-control pickadate-months-year" placeholder="Select Date"
                                            required data-error="#errorDate">
                                        <div id="errorDate"></div>
                                        <div class="form-control-position">
                                            <i class='bx bx-calendar'></i>
                                        </div>
                                    </fieldset>

                                </div>

                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="controls">
                                    <label for="first-name-vertical">Select Apertment</label>
                                    <select class=" form-control" id="apertment" name="apertment" required
                                        data-error="#errorapertment">
                                        <option value="" data-icon="bx bx-building-house" selected>
                                            --SELECT APERTMENT--
                                        </option>
                                        @foreach ($apertments as $apertment)
                                        <option value="{{$apertment->id}}" data-icon="bx bx-building-house">
                                            {{$apertment->name}}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div id="errorapertment"></div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">

                                <div class="controls">
                                    <label for="first-name-vertical">Original Rent</label>
                                    <input type="number" onkeyup="calculateDueByRent(this,1)" id="original-rent"
                                        name="original_rent" class="touchspin form-control text-center"
                                        data-bts-step="0.5" data-bts-decimals="2" min="1" value="0" required
                                        data-error="#errororent">
                                </div>
                                <div id="errororent"></div>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">

                                <div class="controls">
                                    <label for="first-name-vertical">Collected Rent</label>
                                    <input type="number" onkeyup="calculateDueByRentCollected(this,1)"
                                        id="collected-rent" name="collected_rent"
                                        class="touchspin form-control text-center" data-bts-step="0.5"
                                        data-bts-decimals="2" min="0" value="0" required data-error="#errorcrent">

                                </div>
                                <div id="errorcrent"></div>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">

                                <div class="controls">
                                    <label for="first-name-vertical">Due</label>
                                    <input type="number" name="due_rent" onkeyup="calculateDue(this,1)"
                                        class="touchspin form-control text-center" id="due" value="0"
                                        data-bts-step="0.5" data-bts-decimals="2" min="0" required
                                        data-error="#errordue">
                                </div>
                                <div id="errordue"></div>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">

                                <div class="controls">
                                    <label for="first-name-vertical">Expense</label>
                                    <input type="number" id="expense" name="expense"
                                        class="touchspin form-control text-center" value="0" data-bts-step="0.5"
                                        data-bts-decimals="2" min="0" required data-error="#errorexpense">
                                </div>
                                <div id="errorexpense"></div>
                            </div>
                        </div>








                    </div>
                    {{-- <button type="submit" class="btn btn-primary">Submit</button> --}}

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-secondary" onclick="closeModalStatic('rent-add-modal')">
                    <i class="bx bx-x d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Close</span>
                </button>
                <button type="submit" id="save-btn" class="btn btn-primary ml-1">
                    <i class="bx bx-check d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Save</span>
                </button>
                </form>
            </div>
        </div>
    </div>
</div>


{{-- Apertment Update Modal --}}

<div class="modal fade text-left w-100" id="rent-update-modal" tabindex="-1" role="dialog"
    aria-labelledby="myModalLabel16" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="rent-add-modal-title">Edit Rent</h4>
                <button type="button" class="close" onclick="closeModalStatic('rent-update-modal')" aria-label="Close">
                    <i class="bx bx-x"></i>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" id="rentUpdateForm">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <div class="controls">
                                    <label for="first-name-vertical">Choose Date</label>
                                    <fieldset class="form-group position-relative has-icon-left">
                                        <input type="text" id="rent-date-update" name="rent_date"
                                            class="form-control pickadate-months-year" placeholder="Select Date"
                                            required data-error="#errorDateUpdate">
                                        <input type="hidden" name="id" id="rentid">
                                        <div id="errorDateUpdate"></div>
                                        <div class="form-control-position">
                                            <i class='bx bx-calendar'></i>
                                        </div>
                                    </fieldset>

                                </div>

                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="controls">
                                    <label for="first-name-vertical">Select Apertment</label>
                                    <select class=" form-control" id="apertment-update" name="apertment" required
                                        data-error="#errorapertmentupdate">
                                        <option value="" data-icon="bx bx-building-house" selected>
                                            --SELECT APERTMENT--
                                        </option>
                                        @foreach ($apertments as $apertment)
                                        <option value="{{$apertment->id}}" data-icon="bx bx-building-house">
                                            {{$apertment->name}}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div id="errorapertmentupdate"></div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">

                                <div class="controls">
                                    <label for="first-name-vertical">Original Rent</label>
                                    <input type="number" onkeyup="calculateDueByRent(this,2)" id="original-rent-update"
                                        name="original_rent" class="touchspin form-control text-center"
                                        data-bts-step="0.5" data-bts-decimals="2" min="1" value="0" required
                                        data-error="#errororentupdate">
                                </div>
                                <div id="errororentupdate"></div>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">

                                <div class="controls">
                                    <label for="first-name-vertical">Collected Rent</label>
                                    <input type="number" onkeyup="calculateDueByRentCollected(this,2)"
                                        id="collected-rent-update" name="collected_rent"
                                        class="touchspin form-control text-center" data-bts-step="0.5"
                                        data-bts-decimals="2" min="0" value="0" required data-error="#errorcrentupdate">

                                </div>
                                <div id="errorcrentupdate"></div>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">

                                <div class="controls">
                                    <label for="first-name-vertical">Due</label>
                                    <input type="number" name="due_rent" onkeyup="calculateDue(this,2)"
                                        class="touchspin form-control text-center" id="due-update" value="0"
                                        data-bts-step="0.5" data-bts-decimals="2" min="0" required
                                        data-error="#errordueupdate">
                                </div>
                                <div id="errordueupdate"></div>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">

                                <div class="controls">
                                    <label for="first-name-vertical">Expense</label>
                                    <input type="number" id="expense-update" name="expense"
                                        class="touchspin form-control text-center" value="0" data-bts-step="0.5"
                                        data-bts-decimals="2" min="0" required data-error="#errorexpenseupdate">
                                </div>
                                <div id="errorexpenseupdate"></div>
                            </div>
                        </div>








                    </div>
                    {{-- <button type="submit" class="btn btn-primary">Submit</button> --}}

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-secondary" onclick="closeModalStatic('rent-update-modal')">
                    <i class="bx bx-x d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Close</span>
                </button>
                <button type="submit" id="save-btn" class="btn btn-primary ml-1">
                    <i class="bx bx-check d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Save</span>
                </button>
                </form>
            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function () {

        //initialize current insert form validations
        initValidation();
        //initialize update form validation
        initValidationUpdate();



        //datepicker  init
        $(".pickadate-months-year").pickadate({
            selectYears: !0,
            selectMonths: !0
        })

        //initializing the thouchspin function of Original rent
        $('#original-rent').on('touchspin.on.startspin', function () {
            calculateDueByRent(this, 1);
        })

        //initializing the thouchspin function of Original rent
        $('#collected-rent').on('touchspin.on.startspin', function () {
            calculateDueByRentCollected(this, 1);
        })

        //initializing the touchspin function of due
        $('#due').on('touchspin.on.startspin', function () {
            calculateDue(this, 1);
        });

        //initializing the thouchspin function of Original rent update
        $('#original-rent-update').on('touchspin.on.startspin', function () {
            calculateDueByRent(this, 2);
        })

        //initializing the thouchspin function of Original rent update
        $('#collected-rent-update').on('touchspin.on.startspin', function () {
            calculateDueByRentCollected(this, 2);
        })

        //initializing the touchspin function of due update
        $('#due-update').on('touchspin.on.startspin', function () {
            calculateDue(this, 2);
        });


    });

    //start global vairable

    //set global rules & messages array to use in validator
    var rules = {};
    var messages = {};
    var update_rules = {};
    var counter = 1;
    var counter_update = 1;
    //end global variable



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
            var originalRent = parseFloat(data.value);
            var collectedRent = parseFloat($('#collected-rent').val());
            if (collectedRent > originalRent) {
                // swal("Error!","Invalid Value", "warning");
                $('#collected-rent').val(0)
            }
            if (collectedRent >= 0) {
                var due = originalRent - collectedRent;
                if (due > 0) {
                    $('#due').val(due);
                } else {
                    $('#due').val(0);
                }

            }
        } else {
            var originalRent = parseFloat(data.value);
            var collectedRent = parseFloat($('#collected-rent-update').val());
            if (collectedRent > originalRent) {
                // swal("Error!","Invalid Value", "warning");
                $('#collected-rent-update').val(0)
            }
            if (collectedRent >= 0) {
                var due = originalRent - collectedRent;
                if (due > 0) {
                    $('#due-update').val(due);
                } else {
                    $('#due-update').val(0);
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
            var originalRent = parseFloat($('#original-rent').val());
            if (collectedRent > originalRent) {
                swal("Error!", "Invalid Collected Rent Value", "warning");
                $('#collected-rent').val(0);
                var due = originalRent - $('#collected-rent').val();
                if (due > 0) {
                    $('#due').val(due);
                } else {
                    $('#due').val(0);
                }
            } else if (originalRent > 0 && collectedRent >= 0) {
                var due = originalRent - collectedRent;
                if (due > 0) {
                    $('#due').val(due);
                } else {
                    $('#due').val(0);
                }

            }
        } else {
            var collectedRent = parseFloat(data.value);
            var originalRent = parseFloat($('#original-rent-update').val());
            if (collectedRent > originalRent) {
                swal("Error!", "Invalid Collected Rent Value", "warning");
                $('#collected-rent-update').val(0);
                var due = originalRent - $('#collected-rent-update').val();
                if (due > 0) {
                    $('#due-update').val(due);
                } else {
                    $('#due-update').val(0);
                }
            } else if (originalRent > 0 && collectedRent >= 0) {
                var due = originalRent - collectedRent;
                if (due > 0) {
                    $('#due-update').val(due);
                } else {
                    $('#due-update').val(0);
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
            var originalRent = parseFloat($('#original-rent').val());
            var collectedRent = parseFloat($('#collected-rent').val());

            if (collectedRent > originalRent) {
                swal("Error!", "Invalid Value", "warning");
                $('#collected-rent').val(0)
            } else if (due > originalRent) {
                swal("Error!", "Invalid Due Value", "warning");

                //$("#due").val(0)
                $('#collected-rent').val(0);
                var due = originalRent - $('#collected-rent').val();
                if (due > 0) {
                    $('#due').val(due);
                } else {
                    $('#due').val(0);
                }
            } else if (originalRent > 0) {
                var collectedRent = originalRent - due;
                $('#collected-rent').val(collectedRent);
                var due = originalRent - collectedRent;
                if (due > 0) {
                    $('#due').val(due);
                } else {
                    $('#due').val(0);
                }


            }
        } else {
            var due = data.value;
            var originalRent = parseFloat($('#original-rent-update').val());
            var collectedRent = parseFloat($('#collected-rent-update').val());

            if (collectedRent > originalRent) {
                swal("Error!", "Invalid Value", "warning");
                $('#collected-rent-update').val(0)
            } else if (due > originalRent) {
                swal("Error!", "Invalid Due Value", "warning");

                //$("#due").val(0)
                $('#collected-rent-update').val(0);
                var due = originalRent - $('#collected-rent-update').val();
                if (due > 0) {
                    $('#due').val(due);
                } else {
                    $('#due').val(0);
                }
            } else if (originalRent > 0) {
                var collectedRent = originalRent - due;
                $('#collected-rent-update').val(collectedRent);
                var due = originalRent - collectedRent;
                if (due > 0) {
                    $('#due-update').val(due);
                } else {
                    $('#due-update').val(0);
                }


            }
        }




    }


    /**
     * @name form onsubmit
     * @description override the default form submission and submit the form manually.
     *              also validate with .validate() method from jquery validation
     * @parameter formid
     * @return 
     */


    $('#rentInsertForm').submit(function (e) {
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
                        $("#rent-add-modal").modal('hide');
                        var formData = new FormData(form);
                        $.ajax({
                            url: "{{ url('apertment/rent/insert') }}",
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
                                    $("#contentDiv").load(
                                        '{{URL("apertment/rent/ajaxload")}}');
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
     * @name form onsubmit
     * @description override the default form submission and submit the form manually.
     *              also validate with .validate() method from jquery validation
     * @parameter formid
     * @return 
     */


    $('#rentUpdateForm').submit(function (e) {
        e.preventDefault();
    }).validate({
        rules: update_rules,
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
                        $("#rent-update-modal").modal('hide');
                        var formData = new FormData(form);
                        $.ajax({
                            url: "{{ url('apertment/rent/update') }}",
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

                                } else {
                                    $(form).trigger('reset');
                                    $("#contentDiv").load(
                                        '{{URL("apertment/rent/ajaxload")}}');
                                    swal(result, "Data Updated Successfully.", "success");
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
     * @name initValidation
     * @description initiate jquery validation for new form elements.
     * @parameter
     * @return 
     */
    function initValidation() {
        // $("input,select,textarea").not("[type=submit]").jqBootstrapValidation();


        //get input, select, textarea of form
        $('#rentInsertForm').find('input, select, textarea').each(function () {
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
     * @name initValidation
     * @description initiate jquery validation for new form elements.
     * @parameter
     * @return 
     */
    function initValidationUpdate() {
        // $("input,select,textarea").not("[type=submit]").jqBootstrapValidation();


        //get input, select, textarea of form
        $('#rentUpdateForm').find('input, select, textarea').each(function () {
            var name = $(this).attr('name');
            update_rules[name] = {};
            messages[name] = {};

            update_rules[name] = {
                required: true
            }; // set required true against every name
            //apply more rules, you can also apply custom rules & messages




        });

        console.log(update_rules);


    }


    /**
     * @name openModal
     * @description open modal from button click.
     * @parameter modal id
     * @return 
     */
    function openModal(id) {
        $("#" + id).modal('show');
    }

    /**
     * @name openModalStatic
     * @description open modal from button click. cann't be closed from kerboard or ouline click
     * @parameter modal id
     * @return 
     */
    function openModalStatic(id) {
        $("#" + id).modal({
            backdrop: 'static',
            keyboard: false,
            show: true
        });
    }


    /**
     * @name closeModalStatic
     * @description clsoe an static modal.also changed the modal form id
     * @parameter modal id
     * @return 
     */
    function closeModalStatic(id) {
        modal = $('#' + id);
        modal.find('form select').prop("selectedIndex", 0);
        modal.modal('hide');

    }



    /**
     * @name editApertment
     * @description open modal from button click and populate the edit modal.
     * @parameter apertment id
     * @return 
     */
    function editRent(id) {
        modal = $('#rent-update-modal');
        openModalStatic(modal.attr('id'));
        initValidationUpdate();

        $.ajax({
            url: "{{ url('apertment/rent/getDetails') }}",
            method: "POST",
            data: {
                id: id
            },
            success: function (response) {

                //setting value
                console.log(response);
                $("#rentid").val(response.id);
                $("#rent-date-update").val(response.date);
                $("#apertment-update").val(response.aprt_id);
                $("#original-rent-update").val(response.original_rent);
                $("#collected-rent-update").val(response.rent);
                $("#due_rent-update").val(response.due);
                $("#expense-update").val(response.expense);


                //$("#attachment-update-holder").load(location.href + "#attachment-update-holder");




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


    }


    /**
     * @name deleteApertment
     * @description send delete request to server
     * @parameter apertment id
     * @return json response
     */
    function deleteRent(id) {
        swal({
                title: "Are you sure to Delete This?",
                text: "You will not be able to recover this!",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: "btn-danger",
                cancelButtonClass: "btn-secondary",
                confirmButtonText: "Yes",
                cancelButtonText: "No",
                closeOnConfirm: false,
                closeOnCancel: false,
                showLoaderOnConfirm: true
            },
            function (isConfirm) {
                if (isConfirm) {
                    $.ajax({
                        url: "{{ url('apertment/rent/delete') }}",
                        method: "POST",
                        data: {
                            id: id
                        },
                        success: function (result) {
                            if (typeof result.errors !== 'undefined') {
                                swal("Error!", "Database Error!Please Try Again later!",
                                    "warning");
                            } else {
                                $("#contentDiv").load(
                                    '{{URL("apertment/rent/ajaxload")}}');
                                swal(result, "Deleted Successfully.", "success");
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
    }

</script>
@endsection
