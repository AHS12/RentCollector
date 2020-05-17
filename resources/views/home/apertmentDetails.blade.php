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
    </div>
    <div class="col-lg-8">

        <div class="col-lg-12">
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
            <div class="col-lg-12">
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
                <div class="col-lg-12">
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

<!--image show Modal -->

<div aria-hidden="true" aria-labelledby="myModalLabel" class="modal fade" id="image-show-modal" role="dialog" tabindex="-1">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-body mb-0 p-0">
				<img id="image-show" src="" alt="" style="width:100%">
			</div>
			<div class="modal-footer">
				<div><a onclick="event.preventDefault();
                    document.getElementById('download-form').submit();" class="btn btn-outline-success btn-rounded btn-md ml-4 text-center" href="javascript:void(0)">Download</a></div>
                <button class="btn btn-outline-primary btn-rounded btn-md ml-4 text-center" data-dismiss="modal" type="button">Close</button>
                <form id="download-form" action="{{ url('attachment/download') }}" method="POST" style="display: none;">
                    @csrf
                    <input type="hidden" id="download-url" name="url" value="">
               </form> 
			</div>
		</div>
	</div>
</div>


<script>
    function showImage(data,url) {
       
        $("#image-show").attr('src',data.src);
        $("#download-url").val(url);
        
        $('#image-show-modal').modal('show');
    }

    // function closeImge(){
    //     $("#image-show-modal").modal('hide');
    // }

</script>
<!--End Row-->
@endsection
