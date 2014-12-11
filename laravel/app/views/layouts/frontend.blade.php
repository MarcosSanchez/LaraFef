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

        <link href="{{ asset('frontend/css/bootstrap.css') }}" rel="stylesheet" media="screen">
        <link href="{{ asset('frontend/css/bootstrap-responsive.css') }}" rel="stylesheet" media="screen">
        <link href="{{ asset('frontend/css/font-awesome.css') }}" rel="stylesheet">
        <link href="{{ asset('frontend/css/style.css') }}" rel="stylesheet" media="screen">
        
        <!--[if IE 7]>
            <link href="css/font-awesome-ie7.min.css" rel="stylesheet">
        <![endif]-->
    
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
        <script type="text/javascript" src="{{ asset('frontend/js/modernizr.js') }}"></script>


    <title>
      
      @section('title')
        
        · Fefricale .:. Federación Frisona Castilla y León
      
      @show
      
    </title>

  </head>

  <body>


    <div id="wrapper">
            <div id="sidebar">
                <a class="btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <!-- <div id="logo"> <a href="/"><img src="img/logo.svg" alt="logo" /></a> </div> -->
                <nav id="nav" class="navigation" role="navigation">
                    <ul class="unstyled">
                        <li class="active" data-section="1"><i class="icon-home"></i> <span>Inicio</span></li>
                        <li data-section="2" class=""><i class="icon-user"></i> <span>Más Info</span></li>
                        <li data-section="3" class=""><i class="icon-laptop"></i> <span>Control Lechero</span></li>
                        <li data-section="4" class=""><i class="icon-pencil"></i> <span>Libro Genealógico</span></li>
                        <li data-section="5" class=""><i class="icon-envelope"></i> <span>Contacto</span></li>
                        <li data-section="6" class="last"><i class="icon-user"></i> <span>Acceso Usuarios</span></li>
                    </ul>
                </nav><!-- /nav -->
            </div><!-- /sidebar -->
            
            <div id="container">
              @include('frontend.section1') <!-- /Inicio -->

             <!--  @include('frontend.noticias') /Noticias -->

              @include('frontend.section2') <!-- /Más Info-->

              @include('frontend.section3') <!-- /Control Lechero -->

              @include('frontend.section4') <!-- /Libro Genealógico -->

              @include('frontend.section5') <!-- /Contacto -->

              @include('frontend.section6')  <!-- /Acceso Usuarios -->
             
           
              @include('frontend.footer')

            </div><!-- /container frontend -->   
        </div><!-- /wrapper frontend -->             
  
 
<!--<div class="container" style="padding-top:60px;">
    
      

  </div>->
	

  
 <!-- JAVASCRIPTS -->
        <script type="text/javascript" src="{{ asset('frontend/js/waypoints.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('frontend/js/jquery.knob.js') }}"></script>
        <script type="text/javascript" src="{{ asset('frontend/js/jquery.easing.1.3.js') }}"></script>
        <script type="text/javascript" src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('frontend/js/main.js') }}"></script>

  </body>
</html>