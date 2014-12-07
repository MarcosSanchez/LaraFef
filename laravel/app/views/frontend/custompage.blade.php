@extends('layouts.frontend')

@section('title')
	
	{{ $page->title }}
	
@stop

@section('content')

		<h1>{{ $page->title }} </h1>
		
		<h3>{{ $page->created_at }}</h3>
	
		{{ $page->content }}
		
	
	

@stop