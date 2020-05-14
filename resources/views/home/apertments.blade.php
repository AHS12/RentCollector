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
                                <section id="decks">

                                    <div class="row match-height">
                                        <div class="col-12">
                                            <div class="card-deck-wrapper">
                                                <div class="card-deck">
                                                    <div class="row no-gutters">
                                                        <div class="col-md-3 col-sm-6 mb-sm-1">
                                                            <div class="card">
                                                                <div class="card-content">
                                                                    <img class="card-img-top img-fluid"
                                                                        src="{{asset('app-assets/images/slider/01.jpg')}}"
                                                                        alt="Card image cap" />
                                                                    <div class="card-body">
                                                                        <h4 class="card-title">Card title</h4>
                                                                        <p class="card-text">
                                                                            This card has supporting text below as a
                                                                            natural lead-in to
                                                                            additional content.
                                                                        </p>
                                                                        <small class="text-muted">Last updated 3 mins
                                                                            ago</small>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3 col-sm-6 mb-sm-1">
                                                            <div class="card">
                                                                <div class="card-content">
                                                                    <img class="card-img-top img-fluid"
                                                                        src="{{asset('app-assets/images/slider/01.jpg')}}"
                                                                        alt="Card image cap" />
                                                                    <div class="card-body">
                                                                        <h4 class="card-title">Card title</h4>
                                                                        <p class="card-text">
                                                                            This card has supporting text below as a
                                                                            natural lead-in to
                                                                            additional content.
                                                                        </p>
                                                                        <small class="text-muted">Last updated 3 mins
                                                                            ago</small>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3 col-sm-6 mb-sm-1">
                                                            <div class="card">
                                                                <div class="card-content">
                                                                    <img class="card-img-top img-fluid"
                                                                        src="{{asset('app-assets/images/slider/04.jpg')}}"
                                                                        alt="Card image cap" />
                                                                    <div class="card-body">
                                                                        <h4 class="card-title">Card title</h4>
                                                                        <p class="card-text">
                                                                            This card has supporting text below as a
                                                                            natural lead-in to
                                                                            additional content.
                                                                        </p>
                                                                        <small class="text-muted">Last updated 3 mins
                                                                            ago</small>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3 col-sm-6">
                                                            <div class="card">
                                                                <div class="card-content">
                                                                    <img class="card-img-top img-fluid"
                                                                        src="{{asset('app-assets/images/slider/05.jpg')}}"
                                                                        alt="Card image cap" />
                                                                    <div class="card-body">
                                                                        <h4 class="card-title">Card title</h4>
                                                                        <p class="card-text">
                                                                            This card has supporting text below as a
                                                                            natural lead-in to
                                                                            additional content.</p>
                                                                        <small class="text-muted">Last updated 3 mins
                                                                            ago</small>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3 col-sm-6">
                                                            <div class="card">
                                                                <div class="card-content">
                                                                    <img class="card-img-top img-fluid"
                                                                        src="{{asset('app-assets/images/slider/06.jpg')}}"
                                                                        alt="Card image cap" />
                                                                    <div class="card-body">
                                                                        <h4 class="card-title">Card title</h4>
                                                                        <p class="card-text">
                                                                            This card has supporting text below as a
                                                                            natural lead-in to
                                                                            additional content.</p>
                                                                        <small class="text-muted">Last updated 3 mins
                                                                            ago</small>
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
                            </div>
                            <div class="tab-pane" id="service-align-end" aria-labelledby="service-tab-end"
                                role="tabpanel">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-content">
                                                <div class="card-body card-dashboard">
                                                    <div class="table-responsive">
                                                        <table class="table zero-configuration">
                                                            <thead>
                                                                <tr>
                                                                    <th>Name</th>
                                                                    <th>Position</th>
                                                                    <th>Office</th>
                                                                    <th>Age</th>
                                                                    <th>Start date</th>
                                                                    <th>Salary</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>Tiger Nixon</td>
                                                                    <td>System Architect</td>
                                                                    <td>Edinburgh</td>
                                                                    <td>61</td>
                                                                    <td>2011/04/25</td>
                                                                    <td>$320,800</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Garrett Winters</td>
                                                                    <td>Accountant</td>
                                                                    <td>Tokyo</td>
                                                                    <td>63</td>
                                                                    <td>2011/07/25</td>
                                                                    <td>$170,750</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Ashton Cox</td>
                                                                    <td>Junior Technical Author</td>
                                                                    <td>San Francisco</td>
                                                                    <td>66</td>
                                                                    <td>2009/01/12</td>
                                                                    <td>$86,000</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Cedric Kelly</td>
                                                                    <td>Senior Javascript Developer</td>
                                                                    <td>Edinburgh</td>
                                                                    <td>22</td>
                                                                    <td>2012/03/29</td>
                                                                    <td>$433,060</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Airi Satou</td>
                                                                    <td>Accountant</td>
                                                                    <td>Tokyo</td>
                                                                    <td>33</td>
                                                                    <td>2008/11/28</td>
                                                                    <td>$162,700</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Brielle Williamson</td>
                                                                    <td>Integration Specialist</td>
                                                                    <td>New York</td>
                                                                    <td>61</td>
                                                                    <td>2012/12/02</td>
                                                                    <td>$372,000</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Herrod Chandler</td>
                                                                    <td>Sales Assistant</td>
                                                                    <td>San Francisco</td>
                                                                    <td>59</td>
                                                                    <td>2012/08/06</td>
                                                                    <td>$137,500</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Rhona Davidson</td>
                                                                    <td>Integration Specialist</td>
                                                                    <td>Tokyo</td>
                                                                    <td>55</td>
                                                                    <td>2010/10/14</td>
                                                                    <td>$327,900</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Colleen Hurst</td>
                                                                    <td>Javascript Developer</td>
                                                                    <td>San Francisco</td>
                                                                    <td>39</td>
                                                                    <td>2009/09/15</td>
                                                                    <td>$205,500</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Sonya Frost</td>
                                                                    <td>Software Engineer</td>
                                                                    <td>Edinburgh</td>
                                                                    <td>23</td>
                                                                    <td>2008/12/13</td>
                                                                    <td>$103,600</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Jena Gaines</td>
                                                                    <td>Office Manager</td>
                                                                    <td>London</td>
                                                                    <td>30</td>
                                                                    <td>2008/12/19</td>
                                                                    <td>$90,560</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Quinn Flynn</td>
                                                                    <td>Support Lead</td>
                                                                    <td>Edinburgh</td>
                                                                    <td>22</td>
                                                                    <td>2013/03/03</td>
                                                                    <td>$342,000</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Charde Marshall</td>
                                                                    <td>Regional Director</td>
                                                                    <td>San Francisco</td>
                                                                    <td>36</td>
                                                                    <td>2008/10/16</td>
                                                                    <td>$470,600</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Haley Kennedy</td>
                                                                    <td>Senior Marketing Designer</td>
                                                                    <td>London</td>
                                                                    <td>43</td>
                                                                    <td>2012/12/18</td>
                                                                    <td>$313,500</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Tatyana Fitzpatrick</td>
                                                                    <td>Regional Director</td>
                                                                    <td>London</td>
                                                                    <td>19</td>
                                                                    <td>2010/03/17</td>
                                                                    <td>$385,750</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Michael Silva</td>
                                                                    <td>Marketing Designer</td>
                                                                    <td>London</td>
                                                                    <td>66</td>
                                                                    <td>2012/11/27</td>
                                                                    <td>$198,500</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Paul Byrd</td>
                                                                    <td>Chief Financial Officer (CFO)</td>
                                                                    <td>New York</td>
                                                                    <td>64</td>
                                                                    <td>2010/06/09</td>
                                                                    <td>$725,000</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Gloria Little</td>
                                                                    <td>Systems Administrator</td>
                                                                    <td>New York</td>
                                                                    <td>59</td>
                                                                    <td>2009/04/10</td>
                                                                    <td>$237,500</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Bradley Greer</td>
                                                                    <td>Software Engineer</td>
                                                                    <td>London</td>
                                                                    <td>41</td>
                                                                    <td>2012/10/13</td>
                                                                    <td>$132,000</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Dai Rios</td>
                                                                    <td>Personnel Lead</td>
                                                                    <td>Edinburgh</td>
                                                                    <td>35</td>
                                                                    <td>2012/09/26</td>
                                                                    <td>$217,500</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Jenette Caldwell</td>
                                                                    <td>Development Lead</td>
                                                                    <td>New York</td>
                                                                    <td>30</td>
                                                                    <td>2011/09/03</td>
                                                                    <td>$345,000</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Yuri Berry</td>
                                                                    <td>Chief Marketing Officer (CMO)</td>
                                                                    <td>New York</td>
                                                                    <td>40</td>
                                                                    <td>2009/06/25</td>
                                                                    <td>$675,000</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Cara Stevens</td>
                                                                    <td>Sales Assistant</td>
                                                                    <td>New York</td>
                                                                    <td>46</td>
                                                                    <td>2011/12/06</td>
                                                                    <td>$145,600</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Hermione Butler</td>
                                                                    <td>Regional Director</td>
                                                                    <td>London</td>
                                                                    <td>47</td>
                                                                    <td>2011/03/21</td>
                                                                    <td>$356,250</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Lael Greer</td>
                                                                    <td>Systems Administrator</td>
                                                                    <td>London</td>
                                                                    <td>21</td>
                                                                    <td>2009/02/27</td>
                                                                    <td>$103,500</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Jonas Alexander</td>
                                                                    <td>Developer</td>
                                                                    <td>San Francisco</td>
                                                                    <td>30</td>
                                                                    <td>2010/07/14</td>
                                                                    <td>$86,500</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Shad Decker</td>
                                                                    <td>Regional Director</td>
                                                                    <td>Edinburgh</td>
                                                                    <td>51</td>
                                                                    <td>2008/11/13</td>
                                                                    <td>$183,000</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Michael Bruce</td>
                                                                    <td>Javascript Developer</td>
                                                                    <td>Singapore</td>
                                                                    <td>29</td>
                                                                    <td>2011/06/27</td>
                                                                    <td>$183,000</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Donna Snider</td>
                                                                    <td>Customer Support</td>
                                                                    <td>New York</td>
                                                                    <td>27</td>
                                                                    <td>2011/01/25</td>
                                                                    <td>$112,000</td>
                                                                </tr>
                                                            </tbody>
                                                            <tfoot>
                                                                <tr>
                                                                    <th>Name</th>
                                                                    <th>Position</th>
                                                                    <th>Office</th>
                                                                    <th>Age</th>
                                                                    <th>Start date</th>
                                                                    <th>Salary</th>
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
<button type="button" onclick="openModal()" data-toggle="tooltip" data-placement="top" title=""
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
                                    <input type="text" name="name" minlength="3" class="form-control" placeholder="Apertment Name"
                                        required>
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
{{-- <div>
    <div class="alert alert-danger mb-2" role="alert">
        <i class="bx bx-error"></i> Good Morning! Start your day with some alerts.
    </div>
    <div class="alert alert-danger mb-2" role="alert">
        <i class="bx bx-error"></i> Good Morning! Start your day with some alerts.
    </div>
    <div class="alert alert-danger mb-2" role="alert">
        <i class="bx bx-error"></i> Good Morning! Start your day with some alerts.
    </div>
</div> --}}


<script>
    $(document).ready(function () {

        //initialize current form validations
        initValidation();


    });
    //start global vairable

    //set global rules & messages array to use in validator
    var rules = {};
    var messages = {};
    var counter = 1;
    //var row = 1;
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
                                            html +='<li class="list-group-item text-danger"><i class="bx bx-error"></i> '+val+'</li>';
                                        });
                                    });
                                    
            
                                    htmlDiv += '<ul class="list-group border-danger">';
                                    htmlDiv +=  html
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
     * @name openModal
     * @description open modal from button click.
     * @parameter
     * @return 
     */
    function openModal() {
        $("#xlarge").modal('show');
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

</script>

@endsection
