<!DOCTYPE html>
<html lang="en">
<head>
	<title>ShapeUp | @yield('titulo')</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
    <link href="{{ asset('web/assets/img/logo/favicon.png') }}" rel="icon">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('auth2/vendor/bootstrap/css/bootstrap.min.css') }}">
	{{-- <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css"> --}}
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('auth2/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
	{{-- <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css"> --}}
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('auth2/fonts/Linearicons-Free-v1.0.0/icon-font.min.css') }}">
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('auth2/vendor/animate/animate.css') }}">
	{{-- <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css"> --}}
<!--===============================================================================================-->	
    <link rel="stylesheet" type="text/css" href="{{ asset('auth2/vendor/css-hamburgers/hamburgers.min.css') }}">
	{{-- <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css"> --}}
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('auth2/vendor/animsition/css/animsition.min.css') }}">
	{{-- <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css"> --}}
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('auth2/vendor/select2/select2.min.css') }}">
	{{-- <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css"> --}}
<!--===============================================================================================-->	
    <link rel="stylesheet" type="text/css" href="{{ asset('auth2/vendor/daterangepicker/daterangepicker.css') }}">
	{{-- <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css"> --}}
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('auth2/css/util.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('auth2/css/main.css') }}">
	{{-- <link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css"> --}}
<!--===============================================================================================-->
</head>
<body style="background-color: #666666;">
	
	{{-- LOGIN --}}
    @yield('login-section')

    {{-- REGISTER --}}
	@yield('register-section')
	
<!--===============================================================================================-->
    <script src="{{ asset('auth2/vendor/jquery/jquery-3.2.1.min.jss') }}"></script>
	{{-- <script src="vendor/jquery/jquery-3.2.1.min.js"></script> --}}
<!--===============================================================================================-->
    <script src="{{ asset('auth2/vendor/animsition/js/animsition.min.js') }}"></script>
	{{-- <script src="vendor/animsition/js/animsition.min.js"></script> --}}
<!--===============================================================================================-->
    <script src="{{ asset('auth2/vendor/bootstrap/js/popper.js') }}"></script>
    <script src="{{ asset('auth2/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
	{{-- <script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script> --}}
<!--===============================================================================================-->
    <script src="{{ asset('auth2/vendor/select2/select2.min.js') }}"></script>
	{{-- <script src="vendor/select2/select2.min.js"></script> --}}
<!--===============================================================================================-->
    <script src="{{ asset('auth2/vendor/daterangepicker/moment.min.js') }}"></script>
    <script src="{{ asset('auth2/vendor/daterangepicker/daterangepicker.js') }}"></script>
	{{-- <script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script> --}}
<!--===============================================================================================-->
    <script src="{{ asset('auth2/vendor/countdowntime/countdowntime.js') }}"></script>
	{{-- <script src="vendor/countdowntime/countdowntime.js"></script> --}}
<!--===============================================================================================-->
    <script src="{{ asset('auth2/js/main.js') }}"></script>
	{{-- <script src="js/main.js"></script> --}}
</body>
</html>