@extends('layouts.panelbase')


@section('content')

            <div class="layout-px-spacing">
                <div class="row layout-top-spacing" id="cancel-row">
                
                    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                        <div class="widget-content widget-content-area br-6 box box-shadow">
                            <div class="row">
                                <div class="col-lg-12 margin-tb form-head ">
                                    <div class="pull-left">
                                        <h2>Create New User</h2>
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


                        <form method="POST" action="{{ route('users.store') }}" enctype="multipart/form-data">
                            @csrf
                            <!-- {!! Form::open(array('route' => 'users.store','method'=>'POST')) !!} -->
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label>Name:</label>
                                        {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label>Email:</label>
                                        {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label>Contact Number:</label>
                                        <input type="text" class="form-control" id="phone_number" name="phone_number" placeholder="9876543210">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label>Password:</label>
                                        {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label>State:</label>
                                        <select id="state-dd" name="state" class="form-control basic selectpicker"  data-live-search="true">
                                            <option selected>Open this select menu</option>
                                            @foreach ($states as $data)
                                            <option value="{{$data->id}}" data-tokens="{{$data->name}}">
                                                {{$data->name}}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                             
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label>City:</label>
                                        <select id="city-dd" name="city" class="form-control" data-live-search="true">
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label>Address:</label>
                                        <input type="text" class="form-control" id="address" name="address" placeholder="Street Address">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label>Role:</label>
                                        <select name="roles" class="form-control">
                                            @foreach($roleNames as $role)
                                            <option value="{{$role}}" @if($role == "Customer") selected @endif >{{$role}}</option>
                                            @endforeach
                                        </select>
                                        <!-- {!! Form::select('roles[]', $roles,[], array('class' => 'form-control','custom-select', 'custom-select-lg')) !!} -->
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label>GSTIN:</label>
                                        <input type="text" class="form-control" id="gst_number" name="gst_number" placeholder="IND123JAM123">
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label>Upload Profile Image:</label>
                                        <div class="custom-file mb-4">
                                            <input type="file" class="custom-file-input" id="profile_image" name="profile_image">
                                            <label class="custom-file-label" for="profile_image">Choose file</label>
                                        </div>
                                            <img src="#" id="category-img-tag" style="display:none;" width="200px" />
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
            // $('label.custom-file-label').get(this.value).lastIndexOf('/').html();
        });
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function () {
    image_init();
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
           
                // $('button[data-id=city-dd] .dropdown-menu.inner').html('');
                // var int = 1;
                // $.each(res.cities, function (key, value) {

                //     $(".dropdown-menu.inner").append('<a class="dropdown-item" tabindex="1" data-original-index="' + int + '"><span class="dropdown-item-inner " data-tokens="' + value.name  + '" role="option" aria-disabled="false" aria-selected="false"><span class="text">' + value.name  + '</span><span class="  check-mark"></span></span></a>');
                //     int += 1;
                // });
                // image_init();
                $('#city-dd').html('<option value="">Select City</option>');
                $.each(res.cities, function (key, value) {
                    $("#city-dd").append('<option value="' + value
                        .id + '" data-tokens="' + value.name +'">' + value.name + '</option>');
                });
                // image_init();
                
            },
            fail: function(res) {
                console.log('failed request!');
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
                        




