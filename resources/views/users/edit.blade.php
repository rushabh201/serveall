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

                        <form method='POST' action="{{ route('users.update',$user->id) }}" accept-charset='UTF-8'>
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
                                        <select name="state" class="form-control">
                                             <option value="{{ $user->state }}" @if($user->state) @endif>{{ $user->state }}</option> 
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label>City:</label>
                                        <select name="city" class="form-control">
                                            <!-- <option selected="{{ $user->city }}">{{ $user->city }}</option> -->
                                            <option selected value="Surat">Surat</option>
                                            <option value="Bharuch">Bharuch</option>
                                            <option value="Ahemdabad">Ahemdabad</option>
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
                                            <input type="file" class="custom-file-input" id="profile_image" name="profile_image" value=" {{$user->profile_image}}g">
                                            <label class="custom-file-label" for="profile_image">Choose file</label>
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