<!DOCTYPE html>
<html lang="en"><!-- Basic -->
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">   
   
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
     <!-- Site Metas -->
    <title>E-blood bank Makila</title>  
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="{{asset('client/images/favicon.ico')}}" type="image/x-icon">
    <link rel="apple-touch-icon" href="{{asset('client/images/apple-touch-icon.png')}}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('client/css/bootstrap.min.css')}}">    
	<!-- Site CSS -->
    <link rel="stylesheet" href="{{asset('client/css/style.css')}}">    
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{asset('client/css/responsive.css')}}">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{asset('client/css/custom.css')}}">

</head>

<body>

    @include('client_layout.header')

    @yield('content')

    @include('client_layout.footer')

    <a href="#" id="back-to-top" title="Back to top" style="display: none;">&uarr;</a>

	<!-- ALL JS FILES -->
    <script src="{{asset('client/js/jquery-3.2.1.min.js')}}"></script>	
    <script src="{{asset('client/js/popper.min.js')}}"></script>
	<script src="{{asset('client/js/bootstrap.min.js')}}"></script>
    <!-- ALL PLUGINS -->
	<script src="{{asset('client/js/jquery.superslides.min.js')}}"></script>
	<script src="{{asset('client/js/images-loded.min.js')}}"></script>
	<script src="{{asset('client/js/isotope.min.js')}}"></script>
	<script src="{{asset('client/js/baguetteBox.min.js')}}"></script>
	<script src="{{asset('client/js/form-validator.min.js')}}"></script>
    <script src="{{asset('client/js/contact-form-script.js')}}"></script>
    <script src="{{asset('client/js/custom.js')}}"></script>
</body>
</html>