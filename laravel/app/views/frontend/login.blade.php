@extends('layouts.login')

@section('title')
	
	Login Usuarios
	
@stop

@section('content')

		<h1>Login Usuarios</h1>
	
		<hr/>
		
		@if(Session::has('message'))
		
			<div style="display:block">
				{{ Session::get('message') }}
			</div>
		
		@endif
		
		{{ Form::open(array('url' => 'login', 
							'method' => 'POST', 
							'files' => true, 
							'class' => 'myForm', 
							'id' => 'myFormId', 
							'role' => 'form')) }}	
			
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
						
			{{ Form::submit('Login') }}			
			
			
		
		{{ Form::close() }}
		
	
	

@stop

