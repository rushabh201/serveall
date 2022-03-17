@extends('layouts.panelbase')


@section('content')

            <div class="layout-px-spacing">
                <div class="row layout-top-spacing" id="cancel-row">
                
                    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                        <div class="widget-content widget-content-area br-6 box box-shadow">
                            <div class="row">
                                <div class="col-lg-12 margin-tb form-head ">
                                    <div class="pull-left">
                                        <h2>Add New Vehicle</h2>
                                    </div>
                                    <div class="pull-right">
                                        <a class="btn btn-primary" href="{{ route('vehicles.index') }}"> Back</a>
                                    </div>
                                </div>
                            </div>


                            @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                                </ul>
                            </div>
                            @endif

                        <!-- Brand Modal -->
                        <div class="modal fade" id="add_brand_modal" tabindex="-1" role="dialog" aria-labelledby="add_brand_modal" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="ModalLabel">Add New Vehicle Brand</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- <form method="POST" action="{{url('api/create-brand')}}" enctype="multipart/form-data"> -->
                                        <form id="add_brand">
                                            @csrf
                                            <div class="form-group">
                                                <label for="brand_name">Brand Name</label>
                                                <input type="text" name="brand_name" class="form-control" />
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                                <button class="btn ml-3 border-1" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Discard</button>
                                            </div>
                                        </form>
                                    </div>
                                 
                                </div>
                            </div>
                        </div>

                        <!-- Brand Model Modal -->
                        <div class="modal fade" id="add_model_modal" tabindex="-1" role="dialog" aria-labelledby="add_model_modal" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="ModalLabel">Add New Vehicle Model</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- <form method="POST" action="{{url('api/create-brand')}}" enctype="multipart/form-data"> -->
                                        <form id="add_model">
                                            @csrf
                                            <div class="form-group">
                                                <label for="model_name">Vehicle Model Name</label>
                                                <input type="text" name="model_name" class="form-control" />
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                                <button class="btn ml-3 border-1" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Discard</button>
                                            </div>
                                        </form>
                                    </div>
                                 
                                </div>
                            </div>
                        </div>

                        <!-- <button class="btn btn-primary" data-target="#add_brand_modal" data-toggle="modal">Add Brand</button>
                        <button class="btn btn-primary ml-3" data-target="#add_model_modal" data-toggle="modal">Add Model</button> -->
                        <form method="POST" action="{{ route('vehicles.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <!-- <div id="brands"> </div> -->
                                        <label for="brand_id">Vehicle Brand:</label>
                                        <select id="brand_id" name="brand_id" class="form-control">
                                                <option selected>Select Vehicle Brand</option>
                                            @foreach($brands as $brand ) 
                                                <option value="{{$brand->id}}"> {{ $brand->name }}</option>
                                            @endforeach
                                            <option value="modal" data-target="#add_brand_modal" data-toggle="modal">Add New Brand</option>
                                        </select>
                                        <!-- <input class="form-controll" type="text" placeholder="Vehicle Brand" /> -->
                                        <!-- {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!} -->
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="model_id">Model Name:</label>
                                        <select id="model_id" name="model_id" class="form-control">
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="vehicle_registration_number">Registration Number:</label>
                                        <input type="text" class="form-control" id="vehicle_registration_number" name="vehicle_registration_number" placeholder="KA12U9999">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="purchase_date">Purchase Date:</label>
                                        <input id="purchase_date"  name="purchase_date" class="form-control flatpickr flatpickr-input active" type="text" placeholder="Select Purchase Date.." readonly="readonly">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="manufacturing_date">Manufacturing Date:</label>
                                        <input id="manufacturing_date"  name="manufacturing_date" class="form-control flatpickr flatpickr-input active" type="text" placeholder="Select Manufacturing Date.." readonly="readonly">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="engine_number">Engine Number:</label>
                                        <input type="text" class="form-control" id="engine_number" name="engine_number" placeholder="O31DJ1803636">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="chasis_number">VIN (Chasis Number):</label>
                                        <input type="text" class="form-control" id="chasis_number" name="chasis_number" placeholder="MD638AS19J1D02380">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="insurance_id">Insurance Provider:</label>
                                        <select name="insurance_id" class="form-control">
                                            <option selected>Select Insurance Provider</option>
                                            <option value="1">Bajaj</option>
                                            <option value="2">LIC</option>
                                            <option value="3">Care</option>
                                            <option value="4">Max Bupa</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="insurer_gstin">Insurer GSTIN:</label>
                                        <input type="text" class="form-control" id="insurer_gstin" name="insurer_gstin" placeholder="KA12U9999">
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="insurer_address">Insurer Address:</label>
                                        <input type="text" class="form-control" id="insurer_address" name="insurer_address" placeholder="Street / Area / City">
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="policy_number">Policy Number:</label>
                                        <input type="text" class="form-control" id="policy_number" name="policy_number" placeholder="KA12U9999">
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="insurance_expiry_date">Insurance Expiry Date:</label>
                                        <input id="insurance_expiry_date"  name="insurance_expiry_date" class="form-control flatpickr flatpickr-input active" type="text" placeholder="Select Insurance Expiry Date.." readonly="readonly">
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <div class="custom-file-container" data-upload-id="registration_certificate_img">
                                            <label>Registration Certificate<a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">x</a></label>
                                            <label class="custom-file-container__custom-file" >
                                                <input type="file" name="registration_certificate_img" class="custom-file-container__custom-file__custom-file-input" accept="image/*">
                                                <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                                                <span class="custom-file-container__custom-file__custom-file-control"></span>
                                            </label>    
                                            <!-- @if("$('#registration_certificate_img').val->count() > 0") -->
                                            <div class="custom-file-container__image-preview"></div>
                                            <!-- @endif -->
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <div class="custom-file-container" data-upload-id="insurance_img">
                                            <label>Insurance Policy <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image"> x</a></label>
                                            <label class="custom-file-container__custom-file" >
                                                <input type="file" name="insurance_img" class="custom-file-container__custom-file__custom-file-input" accept="image/*">
                                                <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                                                <span class="custom-file-container__custom-file__custom-file-control"></span>
                                            </label>
                                            <div class="custom-file-container__image-preview"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                            <!-- {!! Form::close() !!} -->
                        </form>

                        </div>
                    </div>
                </div>
            </div>
@endsection

@section('javascript')


<link rel="stylesheet" href="{{asset('plugins/flatpickr/flatpickr.css')}}" /> 
<link rel="stylesheet" href="{{asset('plugins/noUiSlider/custom-nouiSlider.css')}}" /> 
<link rel="stylesheet" href="{{asset('plugins/flatpickr/custom-flatpickr.css')}}" /> 
<link rel="stylesheet" href="{{asset('plugins/file-upload/file-upload-with-preview.min.css')}}" /> 
<link href="{{asset('css/components/custom-modal.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('css/scrollspyNav.css')}}" rel="stylesheet" type="text/css" />

<script src="{{asset('js/scrollspyNav.js')}}"></script>
<script src="{{asset('plugins/flatpickr/flatpickr.js')}}"></script>
<script src="{{asset('plugins/flatpickr/custom-flatpickr.js')}}"></script>
<script src="{{asset('plugins/file-upload/file-upload-with-preview.min.js')}}"></script>



<script>
    jQuery(document).ready(function() { 
        flatpickr(document.querySelectorAll('#purchase_date , #insurance_expiry_date, #manufacturing_date'), {
            // dateFormat: "d-m-Y",
        });
        var firstUpload = new FileUploadWithPreview('registration_certificate_img');
        var secondUpload = new FileUploadWithPreview('insurance_img')
    });
</script>

<!-- Trigger modal on Add new button -->

<script>
    // Add Brand Modal
    $("#brand_id").on("change", function() {
    var sOptionVal =$(this).val();
    if(sOptionVal=='modal'){
        $( '#add_brand_modal' ).modal('show');
    }
    });

    // Add Vehicle Model 
    $("#model_id").on("change", function() {
    var sOptionVal =$(this).val();
    if(sOptionVal=='modal'){
        $( '#add_model_modal' ).modal('show');
    }
    });
</script>
<!-- <script src="{{asset('plugins/bootstrap-select/bootstrap-select.min.js')}}"></script>
<link rel="stylesheet" href="{{asset('plugins/bootstrap-select/bootstrap-select.min.css')}}" />  -->
<!-- <link rel="stylesheet" href="{{asset('plugins/select2/select2.min.css')}}" />  -->

<script>
$(document).ready(function () {

    $("#add_model").submit(function(e) {
        e.preventDefault();
        var model_name = this.querySelector('input[name="model_name"]').value;
        var brand_id =  document.getElementById('brand_id').value;
        $.ajax({
            url: "{{url('api/create-vehicle-model')}}",
            type: 'POST',
            data: {
                model_name: model_name, 
                brand_id: brand_id,
                _token: "{{csrf_token()}}"
            },
            dataType: "json",
            success: function(res) {
                console.log('Vehicle Model Added!');
            },
            fail: function(xhr, textStatus, errorThrown){
                alert('Create Vehicle Model request failed');
            }
        });
        $.ajax({
            url: "{{url('api/fetch-vehicle-model')}}",
            type: "GET",
            data: {
                brand_id: brand_id,
                _token: "{{csrf_token()}}"
            },
            dataType: "json",
            success: function (res) {
                $("#model_id").html('<option selected>Select Vehicle Model</option>');
                $.each(res.models, function(key,value) {
                    $("#model_id").append('<option value="' + value.id + '">' + value.model_name + '</option>')
                });
                $("#model_id").append('<option type="button" value="modal" data-target="#add_model_modal" data-toggle="modal">Add New Model</option>');
                // console.log('Fetched after added new model!');
                $("#model_id option:nth-last-child(2)").attr("selected","selected");
            },
            fail: function(res) {
                // console.log("Fetched Request Failed!");
            }
        });
        $( '#add_model_modal' ).modal('hide');
    });
    $('#add_brand').submit(function (e) {
        e.preventDefault();
        var brand_name = this.querySelector('input[name="brand_name"]').value;
        $.ajax({
            url: "{{url('api/create-brand')}}",
            type: "POST",
            data: {
                name: brand_name,
                _token: "{{csrf_token()}}"
            },
            dataType: 'json',
            success: function (res) {
                // console.log('Your Brand is Created Successfully!');
            }
        });
        $.ajax({
            url: "{{url('api/fetch-brand')}}",
            type: "GET",
            data: {
                _token: "{{csrf_token()}}"
            },
            dataType: 'json',
            success: function (res) {
                jQuery("#brand_id").html('<option value="">Select Brand</option>');

                $.each(res, function(key, value){
                    $("#brand_id").append('<option value="' + value.id + '">' + value.name + '</option>');
                    // console.log(value);
                });
                $("#brand_id").append('<option type="button" value="modal" data-target="#add_brand_modal" data-toggle="modal">Add New Brand</option>');
                // console.log(value);
                $("#brand_id option:nth-last-child(2)").attr("selected","selected");
            }
        });
        $( '#add_brand_modal' ).modal('hide');
       
    });
    $('#brand_id').on("change", function(){
        var idBrand = this.value;
        $.ajax({
            url: "{{url('api/fetch-vehicle-model')}}",
            type: "POST",
            data: {
                brand_id: idBrand,
                _token: "{{csrf_token()}}"
            },
            dataType: "json",
            success: function(res) {
                console.log('Model Names fetched Successfully!');
                // console.log(res);
                $("#model_id").html('<option selected>Select Vehicle Model</option>');
                $.each(res.models, function(key,value) {
                    $("#model_id").append('<option value="' + value.id + '">' + value.model_name + '</option>')
                });
                $("#model_id").append('<option type="button" value="modal" data-target="#add_model_modal" data-toggle="modal">Add New Model</option>');

            },  
            fail: function(res) {
                console.log('Model names reuqest Failed!')
            },
        });
    });
});
</script>
<style>
    .bootstrap-select.btn-group .dropdown-menu {
        max-height: 217.953px !important;
    }
</style>
@endsection
                        




