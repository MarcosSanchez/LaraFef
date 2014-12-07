<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
	
	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">

    <title>Mi proyecto
	    
	    @section('title')
	    	
	    	· Basico
	    
	    @show
	    
    </title>

  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Proyecto Curso Laravel </a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li @if(Request::is('admin/user*')) class="active" @endif><a href="{{ URL::to('admin/users') }}">Usuarios</a></li>
          <li @if(Request::is('admin/pages*')) class="active" @endif><a href="{{ URL::to('admin/pages') }}">Paginas</a></li>
            <li><a href="{{ URL::to('logout') }}">Logout</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

	<div class="container">
    @yield('content')

      <hr>

	</div>
     
    </div> <!-- /container -->

    <!-- Latest compiled and minified JavaScript 
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
  -->
  <script src="{{ asset('js/jquery-1.11.1.min.js') }}"></script>
  <script src="{{ asset('js/bootstrap.min.js') }}"></script>
</body>
</html>