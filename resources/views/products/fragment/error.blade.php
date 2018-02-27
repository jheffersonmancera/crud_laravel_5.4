@if(count($errors)) <!-- *1RVFERROR -->
<div class="alert alert-danger">
	<button type="button" class="close" data-dismiss='alert'><!-- *3RVFERROR -->	
			&times; <!-- *2RVFERROR -->		
	</button>
	<ul>
		@foreach($errors->all() as $error) <!-- *4RVFERROR -->
			<li>{{$error}}</li>
		@endforeach
	</ul>

</div>
@endif