@extends('layouts.panelbase')


@section('content')

            <div class="layout-px-spacing">
                <div class="row layout-top-spacing" id="cancel-row">
                
                    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                        <div class="widget-content widget-content-area br-6">
                            <div class="row">
                                <div class="col-lg-12 margin-tb form-head">
                                    <div class="pull-left">
                                        <h2> Show User Details</h2>
                                    </div>
                                    <div class="pull-right">
                                        <a class="btn btn-primary" href="{{ route('users.index') }}"> Back</a>
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label>Profile Image:</label>
                                        <span class="usr-img-frame mr-2 rounded-circle">
                                            <img alt="avatar" class="img-fluid rounded-circle showImg" @if($user->profile_image) src="{{asset('uploads/')}}/{{$user->profile_image}}"  @else src="https://via.placeholder.com/150"   @endif>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label>Name:</label>
                                        {{ $user->name }}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label>Email:</label>
                                        {{ $user->email }}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label>Roles:</label>
                                        @if(!empty($user->getRoleNames()))
                                            @foreach($user->getRoleNames() as $v)
                                                <label class="badge badge-success c-white">{{ $v }}</label>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label>Phone Number:</label>
                                        {{ $user->phone_number }}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label>GST Number:</label>
                                        {{ $user->gst_number }}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label>State:</label>
                                        {{ $user->state }}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label>City:</label>
                                        {{ $user->city }}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label>Address:</label>
                                        {{ $user->address }}
                                    </div>
                                </div>
                               
                            </div>

                        </div>
                    </div>
                </div>
            </div>
@endsection

@section('javascript')
<style>
   label.c-white {
        color:white !important;
    }
</style>
@endsection