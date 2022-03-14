<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>ServeAll - One Stop Automotive Solution</title>
    <link rel="icon" type="image/x-icon" href="{{asset('asset/img/favicon.ico')}}"/>
    <link href="{{asset('asset/css/loader.css')}}" rel="stylesheet" type="text/css" />
    <script src="{{asset('asset/js/loader.js')}}"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,600,700&amp;display=swap" rel="stylesheet">
    <link href="{{asset('asset/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('asset/css/plugins.css')}}" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->

    
    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="{{asset('asset/js/libs/jquery-3.1.1.min.js')}}"></script>
    <script src="{{asset('asset/js/popper.min.js')}}"></script>
    <script src="{{asset('asset/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('asset/plugins/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>

    <script type="text/javascript" src="{{asset('asset/js/app.js')}}"></script>
    <script type="text/javascript">
        window.onload = app.init();
    </script>
    <!-- <script type="text/javascript" language="javascript">
    window.onload = function()
        {
            App.init();
        };
    </script> -->
    <script src="{{asset('asset/js/custom.js')}}"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->
  
</head>
<body>

    <!-- BEGIN LOADER -->
    <div id="load_screen"> 
        <div class="loader"> 
            <div class="loader-content">
                <div class="spinner-grow align-self-center"></div>
            </div>
        </div>
    </div>
    <!--  END LOADER -->
    
    @include('dashboard.partials.admin_header')
    
    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container" id="container">

        <div class="overlay"></div>
        <div class="cs-overlay"></div>
        <div class="search-overlay"></div>
      
     
        @include('dashboard.partials.admin_sidebar')
        <div id="content" class="main-content">    
            @yield('content')
            @include('dashboard.partials.admin_footer')
        </div>

    </div>
    <!-- END MAIN CONTAINER -->

  
    @yield('javascript')

</body>

</html>