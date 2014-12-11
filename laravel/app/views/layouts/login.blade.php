<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
	
	<!-- Optional theme -->
	<link rel="stylesheet" href="{{ asset('css/bootstrap-theme.min.css') }}">

    <title>Mi proyecto
	    
	    @section('title')
	    	
	    	· Login
	    
	    @show
	    
    </title>

  </head>

  <body>
 
	<div class="container">
    	@yield('content')     
    </div> <!-- /container -->

    <!-- Latest compiled and minified JavaScript 

    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>-->
  <script src="{{ asset('js/jquery-1.11.1.min.js') }}"></script>
	<script src="{{ asset('js/bootstrap.min.js') }}"></script>
  
  </body>
</html>