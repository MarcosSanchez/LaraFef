@extends('layouts.master')

@section('title')
	
	Listado paginas
	
@stop

@section('content')

		<h1>Paginas</h1>
	
		<hr/>
		
			<a class="btn btn-primary" href="{{ URL::to('admin/pages/create') }}">Crear pagina</a>
		
		<hr/>
		
		@if(Session::has('message'))
		
			<div class="alert alert-success" role="alert">
				{{ Session::get('message') }}
			</div>
		
		@endif
		
		<table class="table table-striped">
	      <thead>
	        <tr>
	          <th>ID</th>
	          <th>Titulo</th>
	          <th>Slug</th>
	          <th>Fecha Alta</th>
	          <th>Fecha Modificación</th>
	        </tr>
	      </thead>
	      <tbody>
	      	@foreach($pages as $key => $page)
		        <tr>
		          <td>{{ $page->id }}</td>
		          <td>{{ $page->title }} @if($page->main == 1) (Página principal) @endif</td>
		          <td>{{ $page->slug }}</td>
		          <td>{{ $page->created_at }}</td>
		          <td>{{ $page->updated_at }}</td>
		          <td>
		          	<a href="{{ URL::to("admin/pages/$page->id/edit") }}" class="btn btn-success">Editar</a>
	          		{{ Form::open(array('url' => 'admin/pages/'.$page->id,'method' => 'DELETE')) }}
	          			<button class="btn btn-danger" onclick="return confirm('¿Estas seguro?');">Borrar</button>
	          		{{ Form::close() }}
		          
		          </td>
		        </tr>
	        @endforeach
	      </tbody>
	    </table>
@stop