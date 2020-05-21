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

                    <div class="table-responsive">
                        <table class="table zero-configuration">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Month</th>
                                    <th>Original <br> Rent</th>
                                    <th>Collected <br> Rent</th>
                                    <th>Due</th>
                                    <th>Expense</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>




                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Date</th>
                                    <th>Month</th>
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
                <h4 class="modal-title" id="myModalLabel16">Add Rent</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
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
                                    <select data-placeholder="Select Apertment" class="select2-icons form-control"
                                        id="apertment" name="apertment" required data-error="#errorapertment">
                                        <option value="" data-icon="bx bx-building-house" selected>--SELECT--</option>
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
                                    <input type="number" onkeyup="calculateDueByRent(this)" id="original-rent"
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
                                    <input type="number" onkeyup="calculateDueByRentCollected(this)" id="collected-rent"
                                        name="collected_rent" class="touchspin form-control text-center"
                                        data-bts-step="0.5" data-bts-decimals="2" min="0" value="0" required
                                        data-error="#errorcrent">

                                </div>
                                <div id="errorcrent"></div>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">

                                <div class="controls">
                                    <label for="first-name-vertical">Due</label>
                                    <input type="number" name="due_rent" onkeyup="calculateDue(this)"
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
                <button type="button" class="btn btn-light-secondary" data-dismiss="modal">
                    <i class="bx bx-x d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Close</span>
                </button>
                <button type="submit" class="btn btn-primary ml-1">
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
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel16">Edit Apertment</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" id="rentUpdateForm">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">

                                <div class="controls">
                                    <label for="first-name-vertical">Apertment Name</label>
                                    <input type="text" name="name" minlength="3" id="name_update" class="form-control"
                                        placeholder="Apertment Name" required>
                                    <input type="hidden" name="id" id="id_update">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">

                                <div class="controls">
                                    <label for="first-name-vertical">Address</label>
                                    <input type="text" name="address" class="form-control" id="address_update"
                                        placeholder="Apertment Address" minlength="5" required>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">

                                <div class="controls">
                                    <label for="first-name-vertical">Concern Person Name</label>
                                    <input type="text" name="concern_person" class="form-control"
                                        id="concern_person_update" placeholder="Concern Person Name" minlength="3"
                                        required>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">

                                <div class="controls">
                                    <label for="first-name-vertical">Concern Person Phone</label>
                                    <input type="number" pattern="^\d{11}$" minlength="11" maxlength="11"
                                        name="concern_phone" id="concern_phone_update" class="form-control"
                                        placeholder="Concern Person Phone" required>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">

                                <div class="controls">
                                    <label for="first-name-vertical">Concern Person Email</label>
                                    <input type="email" name="concern_email" id="concern_email_update"
                                        class="form-control" placeholder="Concern Person Email" required>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">

                                <div class="controls">
                                    <label for="first-name-vertical">Concern Person NID/Birth Certificate/Passport
                                        No</label>
                                    <input type="number" min="0" pattern="^\d*" id="concern_nid_birth_update"
                                        name="concern_nid_birth" class="form-control" minlength="9"
                                        placeholder="Concern Person NID/Birth Certificate No/Passport No" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6" id="fileholder_update">
                            <div class="form-group">

                                <div class="controls" id="attachment-div_update">
                                    <label for="first-name-vertical">Concern Person Documents</label>
                                    <input type="file" name="attachment[0]" id="attachment_update"
                                        class="form-control fileInputUpdate">
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <button type="button" onclick="addAttachmentUpdate()" class="btn btn-info  btn-circle"><i
                                    class="bx bx-plus"></i></button>
                            <button type="button" onclick="removeAttachmentUpdate()"
                                class="btn btn-danger btn-circle"><i class="bx bx-minus"></i></button>
                        </div>





                    </div>
                    {{-- <button type="submit" class="btn btn-primary">Submit</button> --}}

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-secondary" data-dismiss="modal">
                    <i class="bx bx-x d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Close</span>
                </button>
                <button type="submit" class="btn btn-primary ml-1">
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
            calculateDueByRent(this);
        })

        //initializing the thouchspin function of Original rent
        $('#collected-rent').on('touchspin.on.startspin', function () {
            calculateDueByRentCollected(this);
        })

        //initializing the touchspin function of due
        $('#due').on('touchspin.on.startspin', function () {
            calculateDue(this);
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
    function calculateDueByRent(data) {
        console.log(data.value);
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
    }

    /**
     * @name calculateDueByRentCollected
     * @description calculate the due based on original rent while adding collected rent
     * @parameter this of collected rent
     * @return 
     */
    function calculateDueByRentCollected(data) {
        console.log(data.value);
        var collectedRent = parseFloat(data.value);
        var originalRent = parseFloat($('#original-rent').val());
        if (collectedRent > originalRent) {
            swal("Error!","Invalid Collected Rent Value", "warning");
            $('#collected-rent').val(0);
            var due = originalRent - $('#collected-rent').val();
            if (due > 0) {
                $('#due').val(due);
            } else {
                $('#due').val(0);
            }
        }
        else if (originalRent > 0 && collectedRent >= 0) {
            var due = originalRent - collectedRent;
            if (due > 0) {
                $('#due').val(due);
            } else {
                $('#due').val(0);
            }

        }

    }

    /**
     * @name calculateDue
     * @description balance the collected rent amount based on due amount chnages
     * @parameter this of due
     * @return 
     */
    function calculateDue(data) {
        console.log(data.value);
        var due = data.value;
        var originalRent = parseFloat($('#original-rent').val());
        var collectedRent = parseFloat($('#collected-rent').val());

        if (collectedRent > originalRent) {
            swal("Error!","Invalid Value", "warning");
            $('#collected-rent').val(0)
        }

        else if (due > originalRent) {
            swal("Error!","Invalid Due Value", "warning");
            
            //$("#due").val(0)
            $('#collected-rent').val(0);
            var due = originalRent - $('#collected-rent').val();
            if (due > 0) {
                $('#due').val(due);
            } else {
                $('#due').val(0);
            }
        }


        else if (originalRent > 0) {
            var collectedRent = originalRent - due;
            $('#collected-rent').val(collectedRent);
            var due = originalRent - collectedRent;
            if (due > 0) {
                $('#due').val(due);
            } else {
                $('#due').val(0);
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
                        $("#xlarge").modal('hide');
                        var formData = new FormData(form);
                        $.ajax({
                            url: "{{ url('apertment/insert') }}",
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
                        $("#apertment-update-modal").modal('hide');
                        var formData = new FormData(form);
                        $.ajax({
                            url: "{{ url('apertment/update') }}",
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
            if (name === "concern_email") {
                update_rules[name].email = true;
                //messages[name].email = "Please provide valid email";
            }
            $('#rentUpdateForm').find('.fileInputUpdate').each(function (index, value) {
                //console.log(index);
                if (name === "attachment[" + index + "]") {
                    update_rules[name].required = false;
                }
            });



        });

        // console.log(update_rules);


    }


    /**
     * @name openModal
     * @description open modal from button click.
     * @parameter
     * @return 
     */
    function openModal(id) {
        $("#" + id).modal('show');
    }



    /**
     * @name editApertment
     * @description open modal from button click and populate the edit modal.
     * @parameter apertment id
     * @return 
     */
    function editRent(id) {
        $("#apertment-update-modal").modal('show');
        $.ajax({
            url: "{{ url('apertment/getDetails') }}",
            method: "POST",
            data: {
                id: id
            },
            success: function (response) {

                //setting value
                //console.log(response);
                $("#id_update").val(response.apertment.id);
                $("#name_update").val(response.apertment.name);
                $("#address_update").val(response.apertment.address);
                $("#concern_person_update").val(response.apertment.conecrn_person);
                $("#concern_phone_update").val(response.apertment.conecrn_phone);
                $("#concern_email_update").val(response.apertment.conecrn_email);
                $("#concern_nid_birth_update").val(response.apertment.conecrn_nid_birth_passport);

                $("#attachment-update-holder").empty();
                var markup = "";
                $.each(response.attachments, function (index, value) {

                    markup += '<tr>';
                    markup += '<td><img height="100" width="100"src="' + value.path +
                        '"alt=""></td>';
                    markup += '<td class="text-bold-500 text-muted line-ellipsis">' + value.name +
                        '</td>';
                    markup += '<td><a href="#" onclick="deleteAttacment(' + value.id +
                        ',this)"><i class="badge-circle badge-circle-light-secondary bx bx-trash font-medium-1"></i></a>'
                    markup += '</td>';
                    markup += '</tr>';

                });

                //console.log(markup);
                $("#attachment-update-holder").append(markup);
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
                        url: "{{ url('apertment/delete') }}",
                        method: "POST",
                        data: {
                            id: id
                        },
                        success: function (result) {
                            if (typeof result.errors !== 'undefined') {
                                swal("Error!", "Database Error!Please Try Again later!",
                                    "warning");
                            } else {
                                $("#tableDiv").load(location.href + " #tableDiv");
                                $("#home-align-end").load(location.href + " #home-align-end");
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
