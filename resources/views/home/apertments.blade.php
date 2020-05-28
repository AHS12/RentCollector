@extends('layouts.master')
@section('content')

{{-- main tab layout for grid and list view --}}
<section id="nav-tabs-end">
    <div class="row">
        <div class="col-sm-12">
            <div>
                <div>
                    <h4 class="card-title"><i class="far fa-building"></i> Apertments</h4>
                </div>
                <div>
                    <div>
                        <ul class="nav nav-tabs justify-content-end" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab-end" data-toggle="tab" href="#home-align-end"
                                    aria-controls="home-align-end" role="tab" aria-selected="true">
                                    <i class="fas fa-th"></i> Grid
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" id="service-tab-end" data-toggle="tab" href="#service-align-end"
                                    aria-controls="service-align-end" role="tab" aria-selected="false">
                                    <i class="fas fa-list"></i> List
                                </a>
                            </li>

                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="home-align-end" aria-labelledby="home-tab-end"
                                role="tabpanel">
                                <div class="row">
                                    @foreach ($apertments as $apertment)
                                    <div class="col-xl-3 col-md-4 col-sm-6">
                                        <div class="card text-center">
                                            <div class="card-content">
                                                <div class="card-body"
                                                    onclick="apertmentDetails({{$apertment->id}})">
                                                    <div
                                                        class="badge-circle badge-circle-lg badge-circle-light-info mx-auto my-1">
                                                        <i class="bx bx-home font-medium-5"></i>
                                                    </div>
                                                    <h4 class="text-muted mb-0 line-ellipsis">{{$apertment->name}}</h4>
                                                    <p class="text-muted mb-0 line-ellipsis">{{$apertment->address}}</p>

                                                </div>
                                                <div class="dropdown text-right mr-1 mb-1">
                                                    <span
                                                        class="bx bx-dots-vertical-rounded font-medium-3 dropdown-toggle nav-hide-arrow cursor-pointer"
                                                        data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false" role="menu"></span>
                                                    <div class="dropdown-menu dropdown-menu-right"
                                                        x-placement="bottom-end"
                                                        style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(132px, 0px, 0px);">
                                                        <a class="dropdown-item" href="javascript:void(0)"
                                                            onclick="editApertment('{{encrypt($apertment->id)}}')"><i
                                                                class="bx bx-edit-alt mr-1"></i> edit</a>
                                                        <a class="dropdown-item" href="javascript:void(0)"
                                                            onclick="deleteApertment('{{encrypt($apertment->id)}}')"><i
                                                                class="bx bx-trash mr-1"></i> delete</a>
                                                    </div>
                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                    @endforeach

                                </div>

                            </div>
                            <div class="tab-pane" id="service-align-end" aria-labelledby="service-tab-end"
                                role="tabpanel">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-content">
                                                <div class="card-body card-dashboard">
                                                    <div class="table-responsive" id="tableDiv">
                                                        <table class="table zero-configuration">
                                                            <thead>
                                                                <tr>
                                                                    <th>Name</th>
                                                                    <th>Address</th>
                                                                    <th>Concern Person<br>Name</th>
                                                                    <th>Concern Person <br>Phone</th>
                                                                    <th>Concern Person <br>Email</th>
                                                                    <th>Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($apertments as $apertment)
                                                                <tr>
                                                                    <td  onclick="apertmentDetails({{$apertment->id}})">{{$apertment->name}}</td>
                                                                    <td>{{$apertment->address}}</td>
                                                                    <td>{{$apertment->conecrn_person}}</td>
                                                                    <td>{{$apertment->conecrn_phone}}</td>
                                                                    <td>{{$apertment->conecrn_email}}</td>

                                                                    <td>
                                                                        <button
                                                                            class="btn btn-outline-dark round mr-1 mb-1 btn-xs"
                                                                            data-toggle="tooltip" data-placement="top"
                                                                            title="" data-original-title="Edit"
                                                                            onclick="editApertment('{{encrypt($apertment->id)}}')"><i
                                                                                class='bx       '></i></button>
                                                                        <button
                                                                            class="btn btn-outline-dark round mr-1 mb-1 btn-xs"
                                                                            data-toggle="tooltip" data-placement="top"
                                                                            title="" data-original-title="Delete"
                                                                            onclick="deleteApertment('{{encrypt($apertment->id)}}')"><i
                                                                                class='bx bx-trash'></i></button>
                                                                    </td>
                                                                </tr>
                                                                @endforeach
                                                            </tbody>
                                                            <tfoot>
                                                                <tr>
                                                                    <th>Name</th>
                                                                    <th>Address</th>
                                                                    <th>Concern Person<br>Name</th>
                                                                    <th>Concern Person <br>Phone</th>
                                                                    <th>Concern Person <br>Email</th>
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
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- floating action button --}}
<button type="button" onclick="openModal('xlarge')" data-toggle="tooltip" data-placement="top" title=""
    data-original-title="Add Apertments" class="btn btn-info chat-demo-button btn-circle btn-xl"><i
        class="fas fa-plus"></i></button>



{{-- Apertment Add Modal --}}

<div class="modal fade text-left w-100" id="xlarge" tabindex="-1" role="dialog" aria-labelledby="myModalLabel16"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel16">Add Apertment</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" id="apertmentInsertForm">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">

                                <div class="controls">
                                    <label for="first-name-vertical">Apertment Name</label>
                                    <input type="text" name="name" minlength="3" class="form-control"
                                        placeholder="Apertment Name" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">

                                <div class="controls">
                                    <label for="first-name-vertical">Address</label>
                                    <input type="text" name="address" class="form-control"
                                        placeholder="Apertment Address" minlength="5" required>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">

                                <div class="controls">
                                    <label for="first-name-vertical">Concern Person Name</label>
                                    <input type="text" name="concern_person" class="form-control"
                                        placeholder="Concern Person Name" minlength="3" required>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">

                                <div class="controls">
                                    <label for="first-name-vertical">Concern Person Phone</label>
                                    <input type="number" pattern="^\d{11}$" minlength="11" maxlength="11"
                                        name="concern_phone" id="concern_phone" class="form-control"
                                        placeholder="Concern Person Phone" required>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">

                                <div class="controls">
                                    <label for="first-name-vertical">Concern Person Email</label>
                                    <input type="email" name="concern_email" class="form-control"
                                        placeholder="Concern Person Email" required>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">

                                <div class="controls">
                                    <label for="first-name-vertical">Concern Person NID/Birth Certificate/Passport
                                        No</label>
                                    <input type="number" min="0" pattern="^\d*" name="concern_nid_birth"
                                        class="form-control" minlength="9"
                                        placeholder="Concern Person NID/Birth Certificate No/Passport No" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6" id="fileholder">
                            <div class="form-group">

                                <div class="controls" id="attachment-div">
                                    <label for="first-name-vertical">Concern Person Documents</label>
                                    <input type="file" name="attachment[0]" id="attachment"
                                        class="form-control fileInput" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <button type="button" onclick="addAttachment()" class="btn btn-info  btn-circle"><i
                                    class="bx bx-plus"></i></button>
                            <button type="button" onclick="removeAttachment()" class="btn btn-danger btn-circle"><i
                                    class="bx bx-minus"></i></button>
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

<div class="modal fade text-left w-100" id="apertment-update-modal" tabindex="-1" role="dialog"
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
                <form class="form-horizontal" id="apertmentUpdateForm">
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
                        <br>

                        <hr>
                        <div class="col-12">


                            <div id="attachment-div_update">
                                <h4>Current Documents</h4>
                                <div class="">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>PREVIEW</th>
                                                <th>NAME</th>
                                                <th>ACTION</th>

                                            </tr>
                                        </thead>
                                        <tbody id="attachment-update-holder">


                                        </tbody>
                                    </table>
                                </div>
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



<script>
    $(document).ready(function () {

        //initialize current insert form validations
        initValidation();
        //initialize update form validation
        initValidationUpdate();


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
     * @name form onsubmit
     * @description override the default form submission and submit the form manually.
     *              also validate with .validate() method from jquery validation
     * @parameter formid
     * @return 
     */


    $('#apertmentInsertForm').submit(function (e) {
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


    $('#apertmentUpdateForm').submit(function (e) {
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
        $('#apertmentInsertForm').find('input, select, textarea').each(function () {
            var name = $(this).attr('name');
            rules[name] = {};
            messages[name] = {};

            rules[name] = {
                required: true
            }; // set required true against every name
            //apply more rules, you can also apply custom rules & messages
            if (name === "concern_email") {
                rules[name].email = true;
                //messages[name].email = "Please provide valid email";
            } else if (name === 'url') {
                rules[name].required = false; // url filed is not required
                //add other rules & messages
            }


        });

        //console.log(rules);


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
        $('#apertmentUpdateForm').find('input, select, textarea').each(function () {
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
            $('#apertmentUpdateForm').find('.fileInputUpdate').each(function (index, value) {
                //console.log(index);
                if (name === "attachment[" + index + "]") {
                    update_rules[name].required = false;
                }
            });



        });

        console.log(update_rules);


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
     * @name apertmentDetails
     * @description redirect to apertment Details page
     * @parameter apertment id
     * @return 
     */

    function apertmentDetails(id) {
        console.log(id);
        var url = "{{url('apertment/details','id')}}";
        url = url.replace('id',id);
        console.log(url);
        window.location.href = url;

    }

    /**
     * @name editApertment
     * @description open modal from button click and populate the edit modal.
     * @parameter apertment id
     * @return 
     */
    function editApertment(id) {
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
    function deleteApertment(id) {
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

    /**
     * @name deleteAttacment
     * @description send delete request to server
     * @parameter attachment id
     * @return json response
     */
    function deleteAttacment(id, data) {
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
                        url: "{{ url('attachment/delete') }}",
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
                                $(data).closest('tr').remove();
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

    /**
     * @name addAttachment
     * @description add a file input row in the form
     * @parameter
     * @return 
     */
    function addAttachment() {

        var markup = "";
        markup += '<div class="form-group">';
        markup += '<div class="controls" id="attachment-div' + counter + '">';
        markup += '<label for="first-name-vertical">Concern Person Documents</label>';
        markup += '<input type="file" name="attachment[' + counter + ']" id="attachment' + counter +
            '" class="form-control fileInput" required>';
        markup += '</div>';
        markup += '</div>';
        //markup += '<div class="help-block"></div>';
        counter++;
        //row++;
        $("#fileholder").append(markup);

        //initValidation("#apertmentInsertForm");
        initValidation();


    }

    /**
     * @name removeAttachment
     * @description remove file input row from the form
     * @parameter
     * @return 
     */
    function removeAttachment() {
        counter--;
        $("#attachment-div" + counter).remove();
    }


    /**
     * @name addAttachment
     * @description add a file input row in the form
     * @parameter
     * @return 
     */
    function addAttachmentUpdate() {

        var markup = "";
        markup += '<div class="form-group">';
        markup += '<div class="controls" id="attachment-div_update' + counter_update + '">';
        markup += '<label for="first-name-vertical">Concern Person Documents</label>';
        markup += '<input type="file" name="attachment[' + counter_update + ']" id="attachment_update' + counter_update +
            '" class="form-control fileInputUpdate" required>';
        markup += '</div>';
        markup += '</div>';
        //markup += '<div class="help-block"></div>';
        counter_update++;
        //row++;
        $("#fileholder_update").append(markup);

        //initValidation("#apertmentInsertForm");
        initValidationUpdate();


    }

    /**
     * @name removeAttachment
     * @description remove file input row from the form
     * @parameter
     * @return 
     */
    function removeAttachmentUpdate() {
        counter_update--;
        $("#attachment-div_update" + counter_update).remove();
    }

</script>

@endsection
