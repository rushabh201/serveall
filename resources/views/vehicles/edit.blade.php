@extends('layouts.panelbase')


@section('content')

<div class="layout-px-spacing">
                <div class="row layout-top-spacing" id="cancel-row">
                
                    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                        <div class="widget-content widget-content-area br-6 box box-shadow">
                            <div class="row">
                                <div class="col-lg-12 margin-tb form-head ">
                                    <div class="pull-left">
                                        <h2>Edit Vehicle</h2>
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


                        <form method="POST" action="{{ route('vehicles.update', $vehicle->id) }}" enctype="multipart/form-data" accept-charset='UTF-8'>
                            @method('PUT')
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="brand_id">Vehicle Brand:</label>
                                        <select name="brand_id" class="form-control">
                                            <option>Select Vehicle Brand</option>
                                            <option selected value="1">KTM</option>
                                            <option value="2">Bajaj</option>
                                            <option value="3">KTM</option>
                                            <option value="4">BMW</option>
                                            <option value="5">Benelli</option>
                                            <option value="6">Ducati</option>
                                            <option value="7">Honda</option>
                                        </select>
                                        <!-- <input class="form-controll" type="text" placeholder="Vehicle Brand" /> -->
                                        <!-- {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!} -->
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="model_id">Model Name:</label>
                                        <select name="model_id" class="form-control">
                                            <option>Select Model</option>
                                            <option selected value="1">KTM Duke 200</option>
                                            <option value="2">Honda CBR 250</option>
                                            <option value="3">KTM RC 200</option>
                                            <option value="4">Bajaj Avenger 220</option>
                                            <option value="5">Bajaj Pulser</option>
                                            <option value="6">Bajaj Discover</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="vehicle_registration_number">Registration Number:</label>
                                        <input value="{{$vehicle->vehicle_registration_number}}" type="text" class="form-control" id="vehicle_registration_number" name="vehicle_registration_number" placeholder="KA12U9999">
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
                                        <input value="{{$vehicle->engine_number}}" type="text" class="form-control" id="engine_number" name="engine_number" placeholder="O31DJ1803636">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="chasis_number">VIN (Chasis Number):</label>
                                        <input value="{{$vehicle->chasis_number}}" type="text" class="form-control" id="chasis_number" name="chasis_number" placeholder="MD638AS19J1D02380">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="insurance_id">Insurance Provider:</label>
                                        <select name="insurance_id" class="form-control">
                                            <option>Select Insurance Provider</option>
                                            <option selected value="1">Bajaj</option>
                                            <option value="2">LIC</option>
                                            <option value="3">Care</option>
                                            <option value="4">Max Bupa</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="insurer_gstin">Insurer GSTIN:</label>
                                        <input value="{{$vehicle->insurer_gstin}}" type="text" class="form-control" id="insurer_gstin" name="insurer_gstin" placeholder="KA12U9999">
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="insurer_address">Insurer Address:</label>
                                        <input value="{{$vehicle->insurer_address}}" type="text" class="form-control" id="insurer_address" name="insurer_address" placeholder="Street / Area / City">
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="policy_number">Policy Number:</label>
                                        <input value="{{$vehicle->policy_number}}" type="text" class="form-control" id="policy_number" name="policy_number" placeholder="KA12U9999">
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
                                            <div class="my-4">
                                                <img alt="avatar" class="img-fluid rounded-circle showImg"  @if($vehicle->registration_certificate_img) src="{{asset('uploads/registration_certificate_img')}}/{{$vehicle->registration_certificate_img}}"  @else src="https://via.placeholder.com/150"   @endif />
                                            </div>
                                            <!-- @if("$('#registration_certificate_img').val->count() > 0") -->
                                            <div class="custom-file-container__image-preview d-none"></div>
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
                                            <div class="mt-4">
                                                <img alt="avatar" class="img-fluid rounded-circle showImg"  @if($vehicle->insurance_img) src="{{asset('uploads/insurance_img')}}/{{$vehicle->insurance_img}}"  @else src="https://via.placeholder.com/150"   @endif />
                                            </div>
                                            <div class="custom-file-container__image-preview  d-none"></div>
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

<link rel="stylesheet" href="{{asset('plugins/noUiSlider/nouislider.min.css')}}" /> 
<link rel="stylesheet" href="{{asset('plugins/flatpickr/flatpickr.css')}}" /> 
<link rel="stylesheet" href="{{asset('plugins/noUiSlider/custom-nouiSlider.css')}}" /> 
<link rel="stylesheet" href="{{asset('plugins/flatpickr/custom-flatpickr.csss')}}" /> 
<link rel="stylesheet" href="{{asset('plugins/file-upload/file-upload-with-preview.min.css')}}" /> 

<script src="{{asset('plugins/noUiSlider/nouislider.min.js')}}"></script>
<script src="{{asset('plugins/flatpickr/flatpickr.js')}}"></script>
<script src="{{asset('plugins/flatpickr/custom-flatpickr.js')}}"></script>
<script src="{{asset('plugins/noUiSlider/custom-nouiSlider.js')}}"></script>
<script src="{{asset('plugins/flatpickr/custom-flatpickr.js')}}"></script>
<script src="{{asset('plugins/file-upload/file-upload-with-preview.min.js')}}"></script>

<script src="{{asset('js/custom.js')}}"></script>
<!-- <script src="{{asset('plugins/select2/custom-select2.js')}}"></script>
<script src="{{asset('plugins/select2/select2.min.js')}}"></script> -->

<script src="{{asset('plugins/bootstrap-select/bootstrap-select.min.js')}}"></script>
<link rel="stylesheet" href="{{asset('plugins/bootstrap-select/bootstrap-select.min.css')}}" /> 
<!-- <link rel="stylesheet" href="{{asset('plugins/select2/select2.min.css')}}" />  -->

<script>
    jQuery(document).ready(function() { 
        flatpickr(document.getElementById('purchase_date'), {
            defaultDate: "{{$vehicle->purchase_date}}" 
            // dateFormat: "d-m-Y",
        });
        flatpickr(document.getElementById('manufacturing_date'), { defaultDate: "{{$vehicle->manufacturing_date}}" });
        flatpickr(document.getElementById('insurance_expiry_date'), { defaultDate: "{{$vehicle->insurance_expiry_date}}"  });
    
        var firstUpload = new FileUploadWithPreview('registration_certificate_img');
        var secondUpload = new FileUploadWithPreview('insurance_img');
    });
</script>

<script> 

    function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                
                reader.onload = function (e) {
                    $('#category-img-tag').attr('src', e.target.result);
          
                }
                
                reader.readAsDataURL(input.files[0]);
            }
        }
        
        $("#profile_image").change(function(){
            $('img#category-img-tag').show();
            readURL(this);
        });
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function () {
    $('#state-dd').on('change', function () {
        var idState = this.value;
        $("#city-dd").html('');
        $.ajax({
            url: "{{url('api/fetch-cities')}}",
            type: "POST",
            data: {
                state_id: idState,
                _token: '{{csrf_token()}}'
            },
            dataType: 'json',
            success: function (res) {
                $('#city-dd').html('<option value="">Select City</option>');
                $.each(res.cities, function (key, value) {
                    $("#city-dd").append('<option value="' + value
                        .id + '" data-tokens="' + value.name +'">' + value.name + '</option>');
                });
                // $.each(res.cities, function (key, value) {
                //     $(".dropdown-menu.inner").append('<a class="dropdown-item"><span class="dropdown-item-inner " data-tokens="' + value.name  + '" role="option" aria-disabled="false" aria-selected="false"><span class="text">' + value.name  + '</span><span class="  check-mark"></span></span></a>');
                //  });
            }
        })
        // .then( $("#city-dd").addClass('selectpicker'));
        // $("#city-dd").select2();
       
    });
});
</script>
<style>
    .bootstrap-select.btn-group .dropdown-menu {
        max-height: 217.953px !important;
    }
</style>

@endsection
