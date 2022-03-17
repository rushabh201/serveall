@extends('layouts.panelbase')


@section('content')

            <div class="layout-px-spacing">
                <div class="row layout-top-spacing" id="cancel-row">
                
                    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                        <div class="widget-content widget-content-area br-6">
                            <div class="row">
                                <div class="col-lg-12 margin-tb form-head">
                                    <div class="pull-left">
                                        <h2>Edit User</h2>
                                    </div>
                                    <div class="pull-right">
                                        <a class="btn btn-primary" href="{{ route('users.index') }}"> Back</a>
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

                        <form method='POST' action="{{ route('users.update',$user->id) }}" enctype="multipart/form-data" accept-charset='UTF-8'>
                            @method('PUT')
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                           
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label>Name:</label>
                                        <input type="text" class="form-control" id="name" name="name" placeholder="name" value="{{ $user->name }}">
                                        <!-- {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!} -->
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label>Email:</label>
                                        <input type="text" class="form-control" id="email" name="email" placeholder="email" value="{{ $user->email }}">
                                        
                                        <!-- {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!} -->
                                    </div>
                                </div>
                                  
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label>Contact Number:</label>
                                        <input type="text" class="form-control" id="phone_number" name="phone_number" placeholder="9876543210" value="{{ $user->phone_number }}">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label>Password:</label>
                                        <input type="password" class="form-control" id="password" name="password" placeholder="password">
                                        <!-- {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!} -->
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label>State:</label>
                                        <select id="state-dd" name="state" class="form-control" data-toggle="dropdown" data-live-search="true">
                                        @foreach ($states as $data)
                                            <option value="{{$data->id}}" data-tokens="{{$data->name}}" {{ ($data->id == $user->state ) ? "selected" : "" }} >
                                                {{$data->name}}
                                            </option>
                                        @endforeach
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label>City:</label>
                                        <select id="city-dd" name="city" class="form-control">
                                            @foreach($allcities as $data)
                                                <option value="{{$data->id}}" data-tokens="{{$data->name}}" {{ ($data->id == $user->city) ? "selected" : '' }}> 
                                                    {{$data->name}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label>Address:</label>
                                        <input type="text" class="form-control" id="address" name="address" placeholder="Street Address" value="{{ $user->address }}">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label>GSTIN:</label>
                                        <input type="text" class="form-control" id="gst_number" name="gst_number" placeholder="GST Number" value="{{ $user->gst_number }}">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">Roles:</label>
                                   
                                        <select name="roles" class="form-control" >
                                     
                                           @foreach($roles as $role) 
                                            <option value="{{$role}}" @if($userRoles == $role) selected  @endif > {{$role}} </option>
                                               
                                                
                                           @endforeach
                                            <!-- <option value="customer">Customer</option> -->
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label>Upload Profile Image: </label>
                                        <div class="custom-file mb-4">
                                            <input type="file" class="custom-file-input" id="profile_image" name="profile_image">
                                            <label class="custom-file-label" for="profile_image">{{$user->profile_image}}</label>
                                        </div>
                                        <img src="#" id="category-img-tag" style="display:none;" width="200px" />
                                        <label class="mt-3">Uploaded Profile Image: </label>
                                        <div>
                                            <img alt="avatar" class="img-fluid rounded-circle showImg"  @if($user->profile_image) src="{{asset('uploads/')}}/{{$user->profile_image}}"  @else src="https://via.placeholder.com/150"   @endif >
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

<script src="{{asset('js/custom.js')}}"></script>
<!-- <script src="{{asset('plugins/select2/custom-select2.js')}}"></script>
<script src="{{asset('plugins/select2/select2.min.js')}}"></script> -->

<script src="{{asset('plugins/bootstrap-select/bootstrap-select.min.js')}}"></script>
<link rel="stylesheet" href="{{asset('plugins/bootstrap-select/bootstrap-select.min.css')}}" /> 
<!-- <link rel="stylesheet" href="{{asset('plugins/select2/select2.min.css')}}" />  -->
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