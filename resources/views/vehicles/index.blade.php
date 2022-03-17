@extends('layouts.panelbase')

@section('content')

@if ($message = Session::get('success'))
<div class="alert alert-success">
  <p>{{ $message }}</p>
</div>
@endif


            <div class="layout-px-spacing">
                <div class="row layout-top-spacing" id="cancel-row">
                    
                        
          
                    <div class="col-xl-12 col-lg-12 col-sm-12 layout-spacing">
                        <div class="widget-content widget-content-area br-6">
                        <div class="col-lg-12 margin-tb form-head pt-3">
                            <div class="pull-left">
                                <h2>List of Vehicle</h2>
                            </div>
                            <div class="pull-right">
                                <a class="btn btn-primary mr-2" href="{{ route('vehicles.create') }}"> Add Vehicle </a>
                                <a class="btn btn-primary" onclick="history.back()"> Back</a>
                            </div>
                        </div>

                            <table id="html5-extension" class="table table-hover non-hover" style="width:100%">
                                <thead>
                                    <tr>
                                        <!-- <th>Id</th> -->
                                        <!-- <th>Avatar</th> -->
                                        <th>Vehicle Brand</th>
                                        <th>Model Name</th>
                                        <th>Regisration Number</th>
                                        <th>Purchase Date</th>
                                        <th>Manufacturing Date</th>
                                        <th>Engine Number</th>
                                        <th>VIN (Chasis Number)</th>
                                        <th>Insurance Provider</th>
                                        <th>Insurer GSTIN</th>
                                        <th>Insurer Address</th>
                                        <th>Policy Number</th>
                                        <th>Insurance Expiry Date</th>
                                        <th>Registration Certificate</th>
                                        <th>Insurance Policy </th>
                                        <th class="dt-no-sorting">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $key => $vehicle)
                                    <tr>
                                        <!-- <td>{{ ++$i }}</td> -->
                                        <!-- <td>
                                            <div class="d-flex">
                                                <div class="usr-img-frame mr-2 rounded-circle">
                                                    <img alt="avatar" class="img-fluid rounded-circle"  @if($vehicle->profile_image) src="{{asset('uploads/')}}/{{$vehicle->profile_image}}"  @else src="https://via.placeholder.com/150"   @endif >
                                                </div>
                                            </div>
                                        </td> -->
                                        <td>{{ $vehicle->brand->name }}</td>
                                        <td>{{ $vehicle->vehicle_model->model_name }}</td>
                                        <td>{{ $vehicle->vehicle_registration_number }}</td>
                                        <td>{{ $vehicle->purchase_date }}</td>
                                        <td>{{ $vehicle->manufacturing_date }}</td>
                                        <td>{{ $vehicle->engine_number }}</td>
                                        <td>{{ $vehicle->chasis_number }}</td>
                                        <td>{{ $vehicle->insurance_id }}</td>
                                        <td>{{ $vehicle->insurer_gstin }}</td>
                                        <td>{{ $vehicle->insurer_address }}</td>
                                        <td>{{ $vehicle->policy_number }}</td>
                                        <td>{{ $vehicle->insurance_expiry_date }}</td>
                                        <td>
                                            <div class="d-flex">
                                                <div class="crt-img-frame mr-2">
                                                    <img alt="avatar" class="img-fluid"  @if($vehicle->registration_certificate_img) src="{{asset('uploads/registration_certificate_img/')}}/{{$vehicle->registration_certificate_img}}"  @else src="https://via.placeholder.com/150"   @endif >
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex">
                                                <div class="crt-img-frame mr-2">
                                                    <img alt="avatar" class="img-fluid"  @if($vehicle->insurance_img) src="{{asset('uploads/insurance_img/')}}/{{$vehicle->insurance_img}}"  @else src="https://via.placeholder.com/150"   @endif >
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-dark btn-sm"><a href="{{ route('vehicles.show',$vehicle->id) }}" style="color:white;">Open</a></button>
                                                <button type="button" class="btn btn-dark btn-sm dropdown-toggle dropdown-toggle-split" id="dropdownMenuReference1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-reference="parent">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuReference1">
                                                    <a class="dropdown-item" href="{{ route('vehicles.edit', $vehicle->id) }}">Edit</a>
                                                    {{ Form::open(['method' => 'DELETE', 'route' => ['vehicles.destroy', $vehicle->id]]) }}
                                                    {{ Form::submit('Delete', ['class' => 'dropdown-item']) }}
                                                    {{ Form::close() }}
                                                </div>
                                                </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>

            </div>



@endsection

@section('javascript')

    <!-- BEGIN PAGE LEVEL CUSTOM SCRIPTS -->
    <script src="{{asset('plugins/table/datatable/datatables.js')}}"></script>
    <!-- NOTE TO Use Copy CSV Excel PDF Print Options You Must Include These Files  -->
    <script src="{{asset('plugins/table/datatable/button-ext/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('plugins/table/datatable/button-ext/jszip.min.js')}}"></script>    
    <script src="{{asset('plugins/table/datatable/button-ext/buttons.html5.min.js')}}"></script>
    <script src="{{asset('plugins/table/datatable/button-ext/buttons.print.min.js')}}"></script>
    
    <link rel="stylesheet" type="text/css" href="{{asset('plugins/table/datatable/datatables.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('plugins/table/datatable/custom_dt_html5.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('plugins/table/datatable/dt-global_style.css')}}">
    <script>
        $('#html5-extension').DataTable( {
            "dom": "<'dt--top-section'<'row'<'col-sm-12 col-md-6 d-flex justify-content-md-start justify-content-center'B><'col-sm-12 col-md-6 d-flex justify-content-md-end justify-content-center mt-md-0 mt-3'f>>>" +
        "<'table-responsive'tr>" +
        "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
            buttons: {
                buttons: [
                    { extend: 'copy', className: 'btn btn-sm' },
                    { extend: 'csv', className: 'btn btn-sm' },
                    { extend: 'excel', className: 'btn btn-sm' },
                    { extend: 'print', className: 'btn btn-sm' }
                ]
            },
            "oLanguage": {
                "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
                "sInfo": "Showing page _PAGE_ of _PAGES_",
                "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                "sSearchPlaceholder": "Search...",
               "sLengthMenu": "Results :  _MENU_",
            },
            "stripeClasses": [],
            "lengthMenu": [7, 10, 20, 50],
            "pageLength": 7 
        } );
    </script>
    <style>
    .btn-group .dropdown-menu form input.dropdown-item {
    border-radius: 5px;
    width: 100%;
    padding: 6px 17px;
    clear: both;
    font-weight: 500;
    color: #030305;
    text-align: inherit;
    white-space: nowrap;
    background-color: transparent;
    border: 0;
    font-size: 13px;
    }
    .btn-group .dropdown-menu form input.dropdown-item:hover, .btn-group .dropdown-menu a.dropdown-item:hover {
      color: #DD4343;
    }
    </style>

@endsection