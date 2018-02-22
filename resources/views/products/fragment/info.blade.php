@if(Session::has('info')) <!-- *1rvpfinfo -->
	<div class="alert alert-info"> <!-- *5rvpfinfo -->
		<button type="button" class="close" data-dismiss='alert'><!-- *2rvpfinfo -->
			&times;<!-- *4rvpfinfo -->
		</button> 
			{{Session::get('info')}} <!--*3rvpfinfo --> 
			
	</div>

@endif