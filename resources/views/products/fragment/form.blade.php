<div class="form-group">
	
	{!!Form::label('name','Nombre del producto')!!} <!-- *1rvpfform -->
	
	{!!Form::text('name',null,['class' => 'form-control'])!!} <!-- *2rvpfform -->

</div>

<div class="form-group">
	
	{!!Form::label('short','Descripción breve del producto')!!} 
	
	{!!Form::text('short',null,['class' => 'form-control'])!!} 

</div>

<div class="form-group">
	
	{!!Form::label('body','Descripción del producto')!!} 
	
	{!!Form::textarea('body',null,['class' => 'form-control'])!!} 

</div>

<div class="form-group">
	{!!Form::submit('ENVIAR',['class' => 'btn btn-primary'])!!} <!-- *7rvpfform -->

</div>