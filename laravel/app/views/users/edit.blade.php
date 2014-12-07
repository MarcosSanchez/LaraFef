@extends('layouts.master')

@section('title')
	
	Editar Usuarios
	
@stop

@section('content')

		<h1>Editar Usuarios</h1>
	
		<hr/>
		
		@if(Session::has('message'))
		
			<div style="display:block">
				{{ Session::get('message') }}
			</div>
		
		@endif
		
		{{ Form::open(array('url' => 'admin/users/'.$user->id, 
							'method' => 'PUT', 
							'files' => true, 
							'class' => 'myForm', 
							'id' => 'myFormId', 
							'role' => 'form')) }}	
			
			<div class="form-group">
			
				{{ Form::label('first_name', 'Nombre', array('class' => 'control-label')) }}
				
				{{ Form::text('first_name', $user->first_name, array('placeholder' => 'Nombre')) }}
				
				@if($errors->createuser->first('first_name'))
				<span class="label label-danger">
				{{ $errors->createuser->first('first_name') }}
				</span>
				@endif
			
			</div>
			
			<div class="form-group">
			
				{{ Form::label('last_name', 'Apellidos', array('class' => 'control-label')) }}
				
				{{ Form::text('last_name', $user->last_name, array('placeholder' => 'Apellidos')) }}
				
				@if($errors->createuser->first('last_name'))
				<span class="label label-danger">
				{{ $errors->createuser->first('last_name') }}
				</span>
				@endif
			
			</div>
			
			<div class="form-group">
			
				{{ Form::label('email', 'Email', array('class' => 'control-label')) }}
				
				{{ Form::text('email', $user->email, array('placeholder' => 'Email')) }}
				
				@if($errors->createuser->first('email'))
				<span class="label label-danger">
				{{ $errors->createuser->first('email') }}
				</span>
				@endif
			
			</div>
						
			<div class="form-group">
			
				{{ Form::label('avatar', 'Avatar', array('class' => 'control-label')) }}
				
				{{ Form::file('avatar'); }}
				
				<hr/>
				<img style="width:100px" src="{{ URL::to($user->avatar) }}">
				
				@if($errors->createuser->first('avatar'))
				<span class="label label-danger">
				{{ $errors->createuser->first('avatar') }}
				</span>
				@endif
			
			</div>
			
						
			{{ Form::submit('Actualizar usuario') }}			
			
			
		
		{{ Form::close() }}
		
	
	

@stop

