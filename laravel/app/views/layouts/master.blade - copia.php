<!DOCTYPE html>
<html lang="es">
  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Fefricale .:. Federación Frsiona de Castilla y León">
    <meta name="author" content="Fefricale.dev">
    <!-- Bootstrap -->

    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.css') }} " rel="stylesheet">

    <link href="{{ asset('css/style.css') }} " rel="stylesheet" media="screen">
    <script type="text/javascript" src="{{ asset('js/modernizr.js') }} "></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

       <!--[if IE 7]>
            <link href="css/font-awesome-ie7.min.css" rel="stylesheet">
        <![endif]-->
    
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
    <title>
	    
	    @section('title')
	    	
	    	· Fefricale .:. Federación Frisona Castilla y León
	    
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

	<div class="container" style="padding-top:60px;">
    @yield('content')

      <hr>

	</div>
     
    </div> <!-- /container -->

    <!-- Latest compiled and minified JavaScript 
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
  -->
  <script src="{{ asset('js/jquery-1.11.1.min.js') }}"></script>
  <script src="{{ asset('js/bootstrap.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/waypoints.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/main.js') }}"></script>

</body>
</html>