@extends('layout') <!-- *1 -->

@section('content') <!-- *2 -->
	<div class="col-sm-8">

		<a href="{{ route('products.edit',$product->id)}}" class="btn btn-default">Editar</a> <!-- *5 -->
		
		<h2>
			
			{{ $product->name }} <!--*3-->

		</h2>
		
		<p>
			{{ $product->short }}
		</p>
		{!! $product->body !!} <!-- *4 -->
		
	</div>
	<div class="col-sm-4">
		@include('products.fragment.aside')
	</div>
@endsection