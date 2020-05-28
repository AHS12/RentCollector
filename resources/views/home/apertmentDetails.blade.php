@extends('layouts.master')
@section('content')
<div class="row justify-content-center">

    <div class="col-lg-4">
        <div class="card">

            <div class="card-header d-flex justify-content-between align-items-center pb-1">
                <h4 class="card-title">Owner Details</h4>
            </div>
            <div class="card-header text-center" style="border-top: 2px solid #faa21c;">

                <img src="{{asset('app-assets/images/avatar/avatar.png')}}" alt="" width="100" height="100">
                <br>
                <p>{{$apertment->user->name}}</p>
            </div>
            <div class="card-body">
                <ul class="list-group list-group-unbordered">

                    <li class="list-group-item listnoback">
                        <b>Email:</b> <a class="pull-right text-aqua">{{$apertment->user->email}}</a>
                    </li>


                </ul>

            </div>




        </div>
        <div class="card invoice-action-wrapper shadow-none border">
            <div class="card-body">
                <div class="invoice-action-btn">
                    <a href="javascript:void(0);" onclick="editApertment('{{encrypt($apertment->id)}}')"
                        class="btn btn-light-primary btn-block">
                        <i class='bx bx-edit'></i>
                        <span>Edit</span>
                    </a>
                </div>
                <br>
                <div class="invoice-action-btn">
                    <button onclick="deleteApertment('{{encrypt($apertment->id)}}')"
                        class="btn btn-danger btn-block invoice-send-btn">
                        <i class='bx bx-trash'></i>
                        <span>Delete</span>
                    </button>
                </div>


            </div>
        </div>


    </div>
    <div class="col-lg-8">

        <div class="col-lg-12" id="apertment-content1">
            <div class="card">

                <div class="card-header d-flex justify-content-between align-items-center pb-1">
                    <h4 class="card-title">Apertment Details</h4>
                </div>

                <div class="table-responsive ps">
                    <!-- table start -->
                    <table class="table table-hover">

                        <tbody>
                            <tr>
                                <td><b>Apertment Name</b></td>
                                <td>{{$apertment->name}}</td>
                            </tr>
                            <tr>
                                <td><b>Apertment Address</b></td>
                                <td>{{$apertment->address}}</td>
                            </tr>



                        </tbody>
                    </table>
                    <!-- table ends -->


                </div>
            </div>
        </div>
        <div class="col-lg-12" id="apertment-content2">
            <div class="card">

                <div class="card-header d-flex justify-content-between align-items-center pb-1">
                    <h4 class="card-title">Concern Person Details</h4>
                </div>

                <div class="table-responsive ps">
                    <!-- table start -->
                    <table class="table table-hover">

                        <tbody>
                            <tr>
                                <td> Name</td>
                                <td>{{$apertment->conecrn_person}}</td>
                            </tr>
                            <tr>
                                <td>Phone</td>
                                <td>{{$apertment->conecrn_phone}}</td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>{{$apertment->conecrn_email}}</td>

                            </tr>
                            <tr>
                                <td>NID/BIRTH CERTIFICATE/PASSPORT</td>
                                <td>{{$apertment->conecrn_nid_birth_passport}}</td>

                            </tr>


                        </tbody>
                    </table>
                    <!-- table ends -->


                </div>
            </div>
        </div>
        <div class="col-lg-12" id="apertment-content3">
            <div class="card">

                <div class="card-header d-flex justify-content-between align-items-center pb-1">
                    <h4 class="card-title">Attachemnts</h4>
                </div>

                <div class="mr-1 mb-1 ml-1 mu-1">

                    <div class="row">
                        @foreach ($apertment->attachments as $attachment)

                        <div class="col-lg-3 mb-3" id="document{{$loop->iteration}}">
                            <img width="124" height="85" src="{{asset($attachment->attachment_path)}}" alt="..."
                                class="img-thumbnail" onclick="showImage(this,'{{$attachment->attachment_path}}')">
                        </div>
                        @endforeach




                    </div>



                </div>
            </div>
        </div>
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


<!--image show Modal -->

<div aria-hidden="true" aria-labelledby="myModalLabel" class="modal fade" id="image-show-modal" role="dialog"
    tabindex="-1">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-body mb-0 p-0">
                <img id="image-show" src="" alt="" style="width:100%">
            </div>
            <div class="modal-footer">
                <div><a onclick="event.preventDefault();
                    document.getElementById('download-form').submit();"
                        class="btn btn-outline-success btn-rounded btn-md ml-4 text-center"
                        href="javascript:void(0)">Download</a></div>
                <button class="btn btn-outline-primary btn-rounded btn-md ml-4 text-center" data-dismiss="modal"
                    type="button">Close</button>
                <form id="download-form" action="{{ url('attachment/download') }}" method="POST" style="display: none;">
                    @csrf
                    <input type="hidden" id="download-url" name="url" value="">
                </form>
            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function () {

        //initialize update form validation
        initValidationUpdate();


    });

    //set global rules & messages array to use in validator

    var messages = {};
    var update_rules = {};
    var counter_update = 1;
    //end global variable


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
                                    $("#apertment-content1").load(location.href +
                                        " #apertment-content1");
                                    $("#apertment-content2").load(location.href +
                                        " #apertment-content2");
                                    $("#apertment-content3").load(location.href +
                                        " #apertment-content3");
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
                                $("#apertment-content1").load(location.href + " #apertment-content1");
                                $("#apertment-content2").load(location.href + " #apertment-content2");
                                $("#apertment-content3").load(location.href + " #apertment-content3");
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
    function addAttachmentUpdate() {

        var markup = "";
        markup += '<div class="form-group">';
        markup += '<div class="controls" id="attachment-div_update' + counter_update + '">';
        markup += '<label for="first-name-vertical">Concern Person Documents</label>';
        markup += '<input type="file" name="attachment[' + counter_update + ']" id="attachment_update' +
            counter_update +
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


    /**
     * @name showImage
     * @description show image in a modal.
     * @parameter this image element and image url
     * @return 
     */
    function showImage(data, url) {

        $("#image-show").attr('src', data.src);
        $("#download-url").val(url);

        $('#image-show-modal').modal('show');
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

                                swal(result, "Deleted Successfully.", "success");
                                setTimeout(() => {
                                    window.location.href = '{{URL("apertments")}}'
                                });
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

    // function closeImge(){
    //     $("#image-show-modal").modal('hide');
    // }

</script>
<!--End Row-->
@endsection
