@extends('layout') 

@section('content') 
	<div class="col-sm-8">

		 
		
		<h2>	
			Nuevo Producto<!-- *rvpcreate -->
			<a href="{{ route('products.index')}}" class="btn btn-default">Listado</a> 	
		</h2>
		@include('products.fragment.error')<!-- *2rvpcreate -->

		
		{!! Form::open(['route' =>'products.store'])!!}<!-- *1rvpcreate -->
			@include('products.fragment.form')<!-- *4rvpcreate -->
		{!! Form::close() !!}
	</div>
	<div class="col-sm-4">
		@include('products.fragment.aside')<!-- *3rvpcreate -->
	</div>
@endsection