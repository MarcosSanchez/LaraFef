@extends('layouts.frontend')

@section('title')
	
	Formulario de contacto
	
@stop

@section('content')

		<h1>Formulario de contacto</h1>
	
		<hr/>
		
		{{ Form::open(array('','id' => 'myFormId')) }}	
			
			<div class="form-group">
			
				{{ Form::label('first_name', 'Nombre', array('class' => 'control-label')) }}
				
				{{ Form::text('first_name', '', array('placeholder' => 'Nombre')) }}
			
			</div>
			
			<div class="form-group">
			
				{{ Form::label('email', 'Email', array('class' => 'control-label')) }}
				
				{{ Form::text('email', '', array('placeholder' => 'Email')) }}
			
			</div>
			
			<div class="form-group">
			
				{{ Form::label('subject', 'Asunto', array('class' => 'control-label')) }}
				
				{{ Form::text('subject', '', array('placeholder' => 'Asunto')) }}
			
			</div>
			
			<div class="form-group">
			
				{{ Form::label('message', 'Mensaje', array('class' => 'control-label')) }}
				
				{{ Form::textarea('message', '', array('placeholder' => 'Mensaje')) }}
			
			</div>
						
			{{ Form::submit('Enviar Contacto') }}			
		
			</div>	
			
			<div class="formAlert" style="display:none; border:1px solid red; padding:20px; margin:20px;">
		
		{{ Form::close() }}
		
	
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
		<script>
	        $("document").ready(function(){
		        
	            $("#myFormId").submit(function(e){
	                e.preventDefault();
	                
	                var dataString = $("#myFormId").serialize(); 
	                console.log(dataString);
	                $.ajax({
	                    type: "POST",
	                    url : "contacto",
	                    data : dataString,

	                    beforeSend : function(){
		                    
		                    $("#myFormId").hide();
		                    $('.formAlert').html('Enviando...');
		                    $('.formAlert').show('slow');
		                    
	                    },
	                    success : function(data){	
		                    
		                    console.log(data.error)
		                    	                    
		                    if(data.error) {
			                    
		                    	$('.formAlert').html('Se han producido errores:<br/> ');	
		                    
								if(data.error.email[0])
									$('.formAlert').append(data.error.email[0]+'<br/>')
									
								if(data.error.first_name[0])
									$('.formAlert').append(data.error.first_name[0]+'<br/>')
									
								if(data.error.subject[0])
									$('.formAlert').append(data.error.subject[0]+'<br/>')
		                    
		                    	$("#myFormId").show();	
		                    }	                   
		                    
		                    if(data.success)
		                    {
			                    
			                    $('.formAlert').html(data.success);
			                    
		                    }	
	                        
	                        $('.formAlert').show('slow');
	                        
	                    }
	                },"json");
	
	        	});
	        });
	    </script>
	

@stop