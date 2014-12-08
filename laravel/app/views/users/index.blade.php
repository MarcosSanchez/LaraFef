@extends('layouts.master')

@section('title')
	
	Listado Usuarios
	
@stop

@section('content')

		@include('frontend.contacts');
		
		<h1>Login Usuarios</h1>
	
		<hr/>
		
			<a class="btn btn-primary" href="{{ URL::to('admin/users/create') }}">Crear usuario</a>
		
		<hr/>
		
		@if(Session::has('message'))
		
			<div class="alert alert-success" role="alert">
				{{ Session::get('message') }}
			</div>
		
		@endif

		<pre>
			<!--<? print_r($users); ?>-->
			<? print_r(Sentry::getUser()); ?>
		
		<table class="table table-striped">
	      <thead>
	        <tr>
	          <th>Avatar</th>
	          <th>Nombre y Apellidos</th>
	          <th>Email</th>
	          <th>Fecha Alta</th>
	        </tr>
	      </thead>
	      <tbody>
	      	@foreach($users as $key => $user)
		        <tr>
		          <td><img style="width:100px" src="{{ URL::to($user->avatar) }}"></td>
		          <td>{{ ucfirst($user->first_name) }} {{ $user->last_name}}</td>
		          <td>{{ $user->email }}</td>
		          <td>{{ $user->created_at }}</td>
		          <td>
		          	<a href="{{ URL::to("admin/users/$user->id/edit") }}" class="btn btn-success">Editar</a>
		          	@if($current_user->id != $user->id)
		          		{{ Form::open(array('url' => 'admin/users/'.$user->id,'method' => 'DELETE')) }}
		          			<button class="btn btn-danger" onclick="return confirm('¿Estas seguro?');">Borrar</button>
		          		{{ Form::close() }}		          		
		          	@endif
		          
		          </td>
		        </tr>
	        @endforeach
	      </tbody>
	    </table>
@stop