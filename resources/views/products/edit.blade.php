@extends('layout') 

@section('content') 
	<div class="col-sm-8">

		 
		
		<h2>
			
			Editar Producto

		<a href="{{ route('products.index')}}" class="btn btn-default">Listado</a> <!-- *1rvpedit -->
		</h2>
		<h4>{{$product->name}}</h4>
		
		{!! Form::model($product, ['route' => ['products.update',$product->id],'method'=>'PUT'])!!}<!-- *2rvpedit -->
			@include('products.fragment.form')<!-- *3rvpedit -->
		{!! Form::close() !!}
	</div>
	<div class="col-sm-4">
		@include('products.fragment.aside')
	</div>
@endsection