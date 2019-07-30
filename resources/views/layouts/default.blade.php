<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <title>Dashboard</title>
        <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:700, 600,500,400,300' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="{{ asset('public/css/font-awesome.css') }}">
        <link rel="stylesheet" href="{{ asset('public/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('public/css/bootstrap-datepicker.min.css') }}"> 
        <link rel="stylesheet" href="{{ asset('public/css/bootstrap-datetimepicker.min.css') }}">
        <link rel="stylesheet" href="{{ asset('public/css/bootstrap-datetimepicker.css') }}">
        <link rel="stylesheet" href="{{ asset('public/css/select2.min.css') }}">

        <link rel="stylesheet" href="{{ asset('public/css/main.css') }}">
    </head> 
    <body>
        @include('includes.default.header')
        @include('includes.default.left_sidebar')
        <!--Flash message start here-->
        
        <!--Flash message end here-->
            @yield('content')
        @include('includes.default.footer')
        <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
        <script src="{{ asset('public/js/jquery-2.2.0.min.js') }}"></script>
        <script src="{{ asset('public/js/bootstrap.min.js') }}"></script>
      <script src="{{ asset('public/js/bootstrap-datepicker.min.js') }}"></script> 

        <script src="{{ asset('public/js/moment.min.js') }}"></script>
        <script src="{{ asset('public/js/bootstrap-datetimepicker.min.js') }}"></script>

        <script src="{{ asset('public/js/main.js') }}"></script>
        <script src="{{ asset('public/js/highcharts.js') }}"></script>
        <script src="{{ asset('public/js/jquery.validate.js') }}"></script>    
        <script src="{{ asset('public/js/sweetalert.min.js') }}"></script>  
        <script src="{{ asset('public/js/select2.min.js') }}"></script>  
        <script src="{{ asset('public/js/autosize.min.js') }}"></script>  
         
        <!--Custom JS Start Here -->
        <script src="{{ asset('public/js/common.js') }}"></script>
        <script src="{{ asset('public/js/form_validation.js') }}"></script>
        <script src="{{ asset('public/js/building.js') }}"></script>
        <script src="{{ asset('public/js/members.js') }}"></script>
        <script src="{{ asset('public/js/billing.js') }}"></script>
        <script src="{{ asset('public/js/complaint.js') }}"></script>
        <script src="{{ asset('public/js/staff.js') }}"></script>
        <script src="{{ asset('public/js/notices.js') }}"></script>
        <script src="{{ asset('public/js/defaulter.js') }}"></script>
        <script src="{{ asset('public/js/gatekeeper.js') }}"></script>
        <script src="{{ asset('public/js/dashboard.js') }}"></script>
        <script src="{{ asset('public/js/visitor.js') }}"></script>
        <script src="{{ asset('public/js/alert.js') }}"></script>
        <script>
            var csrf_token = $('meta[name="csrf-token"]').attr('content');
            var camera_icon = "{{ asset('public/images/icons/camera.png') }}";            
        </script>
    </body>
</html>
