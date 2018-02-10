@extends('layout') <!-- *1 -->

@section('content') <!-- *2 -->
	<div class="col-sm-8">
		
		<h2>
		Listado de productos
		<a href="{{route('products.create')}}" class="btn btn-primary pull-right">Nuevo</a> <!--*3 -->
		</h2>
		<table class="table table-hover table-striped">
			<thead>
				<tr>
					<th width="20px">ID</th>
					<th>Nombre del Producto</th>
					<th colspan="3">&nbsp;</th>
				</tr>
			</thead>
			<tbody>
				@foreach($products as $product ) <!-- *4 -->
					<tr>
						<td>{{$product->id}}</td> <!-- *5 -->
						<td>
							<strong>{{$product->name}}</strong>
							{{$product->short}} 
						</td>
						<td> <a href="{{ route('products.show',$product->id)}}">Ver</a> </td> <!--*7 -->
						
						<td> <a href="{{ route('products.edit',$product->id)}}">Editar</a> </td> <!--*8 -->
						<td>Borrar</td>
					</tr>
				@endforeach
			</tbody>
		</table>
		{!!$products->render()!!} <!-- *6-->

	</div>
	<div class="col-sm-4">
		mensaje
	</div>
@endsection