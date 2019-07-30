<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login</title>
        <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:700, 600,500,400,300' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
        
        <link rel="stylesheet" href="{{ asset('public/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('public/css/main.css') }}">
    </head> 
    <body>
        @include('includes.login.header')                  
          @yield('content')
        @include('includes.login.footer') 
        <script src="{{ asset('public/js/jquery-2.2.0.min.js') }}"></script>
        <script src="{{ asset('public/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('public/js/jquery.min.js') }}"></script>
        <script src="{{ asset('public/js/main.js') }}"></script>       
        <script src="{{ asset('public/js/jquery.validate.js') }}"></script>       
        <script src="{{ asset('public/js/form_validation.js') }}"></script>       
    </body>
</html>
