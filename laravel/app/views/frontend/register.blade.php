
@extends('layouts.login')

@section('title')
	
	Registro Usuarios
	
@stop

@section('content')

		<h1>Registro Usuarios</h1>
	
		<hr/>
		
		@if(Session::has('message'))
		
			<div style="display:block">
				{{ Session::get('message') }}
			</div>
		
		@endif
		
		{{ Form::open(array('url' => 'admin/users', 
							'method' => 'POST', 
							'files' => true, 
							'class' => 'myForm', 
							'id' => 'myFormId', 
							'role' => 'form')) }}	
			
			<div class="form-group">
			
				{{ Form::label('first_name', 'Nombre', array('class' => 'control-label')) }}
				
				{{ Form::text('first_name', '', array('placeholder' => 'Nombre')) }}
				
				@if($errors->createuser->first('first_name'))
				<span class="label label-danger">
				{{ $errors->createuser->first('first_name') }}
				</span>
				@endif
			
			</div>
			
			<div class="form-group">
			
				{{ Form::label('last_name', 'Apellidos', array('class' => 'control-label')) }}
				
				{{ Form::text('last_name', '', array('placeholder' => 'Apellidos')) }}
				
				@if($errors->createuser->first('last_name'))
				<span class="label label-danger">
				{{ $errors->createuser->first('last_name') }}
				</span>
				@endif
			
			</div>
			
			<div class="form-group">
			
				{{ Form::label('email', 'Email', array('class' => 'control-label')) }}
				
				{{ Form::text('email', '', array('placeholder' => 'Email')) }}
				
				@if($errors->createuser->first('email'))
				<span class="label label-danger">
				{{ $errors->createuser->first('email') }}
				</span>
				@endif
			
			</div>
			
			<div class="form-group">
			
				{{ Form::label('password', 'Password', array('class' => 'control-label')) }}
				
				{{ Form::password('password', '', array()) }}
				
				@if($errors->createuser->first('password'))
				<span class="label label-danger">
				{{ $errors->createuser->first('password') }}
				</span>
				@endif
			
			</div>
			
			<div class="form-group">
			
				{{ Form::label('password-repeat', 'Repetir Password', array('class' => 'control-label')) }}
				
				{{ Form::password('password-repeat', '', array()) }}
				
				@if($errors->createuser->first('password2'))
				<span class="label label-danger">
				{{ $errors->createuser->first('password2') }}
				</span>
				@endif
			
			</div>
			
			<div class="form-group">
			
				{{ Form::label('avatar', 'Avatar', array('class' => 'control-label')) }}
				
				{{ Form::file('avatar'); }}
				
				@if($errors->createuser->first('avatar'))
				<span class="label label-danger">
				{{ $errors->createuser->first('avatar') }}
				</span>
				@endif
			
			</div>
			
						
			{{ Form::submit('Crear usuario') }}			
			
			
		
		{{ Form::close() }}
		
	
	

@stop