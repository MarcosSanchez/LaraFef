@extends('layouts.master')

@section('title')
	
	Crear página
	
@stop

@section('content')

		<h1>Crear página</h1>
	
		<hr/>
		
		@if(Session::has('message'))
		
			<div style="display:block">
				{{ Session::get('message') }}
			</div>
		
		@endif
		
		{{ Form::open(array('url' => 'admin/pages', 
							'method' => 'POST', 
							'files' => true, 
							'class' => 'myForm', 
							'id' => 'myFormId', 
							'role' => 'form')) }}	
			
			<div class="form-group">
			
				{{ Form::label('title', 'Titulo', array('class' => 'control-label')) }}
				
				{{ Form::text('title', '', array('placeholder' => 'Titulo de la pagina')) }}
				
				@if($errors->createpage->first('title'))
				<span class="label label-danger">
				{{ $errors->createpage->first('title') }}
				</span>
				@endif
			
			</div>
			
			<div class="form-group">
			
				{{ Form::label('slug', 'Slug', array('class' => 'control-label')) }}
				
				{{ Form::text('slug', '', array('placeholder' => 'Url amigable...')) }}
				
				@if($errors->createpage->first('slug'))
				<span class="label label-danger">
				{{ $errors->createpage->first('slug') }}
				</span>
				@endif
			
			</div>
			
			<div class="form-group">
			
				{{ Form::label('content', 'Contenido', array('class' => 'control-label')) }}
				
				{{ Form::textarea('content', '', array('placeholder' => 'Contenido...')) }}
				
				@if($errors->createpage->first('content'))
				<span class="label label-danger">
				{{ $errors->createpage->first('content') }}
				</span>
				@endif
			
			</div>
			
			<div class="checkbox">
				<label>
					<input type="checkbox" name="main" value="1" > Página principal
				</label>
			</div>
			
						
			{{ Form::submit('Crear página') }}			
			
			
		
		{{ Form::close() }}
		
	
	

@stop