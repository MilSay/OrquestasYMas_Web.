@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div  class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<h3>Nuevo Enumerado</h3>
		@if (count($errors)>0)
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $error)
				<li>{{$error}}</li>
				@endforeach
			</ul>
		</div>
		@endif
	</div>
</div>
		{!!Form::open(array('url'=>'item/enumerado','method'=>'POST','autocomplete'=>'off'))!!}
		{{Form::token()}}
<div class="row">	
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group ">
			<label for="Nombre">Nombre</label>
			<input type="text" required value="{{old('Nombre')}}" name="Nombre" class="form-control" placeholder="Nombre...">
		</div>
	</div>
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group ">
        <label for="Valor_enumerado">Valor Enumerado</label>
			<input type="text" required value="{{old('Valor_enumerado')}}" name="Valor_enumerado" class="form-control" placeholder="Valor Enumerado...">
		</div>
	</div>		
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group ">
			<label for="Tipo_Enumerado">Tipo Enumerado</label>
			<input type="text" required value="{{old('Tipo_Enumerado')}}" name="Tipo_Enumerado" class="form-control" placeholder="Tipo Enumerado...">
		</div>
	</div>
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group ">
			<label for="Estado_Enumerado">Estado Enumerado</label>
			<input type="text" required value="{{old('Estado_Enumerado')}}" name="Estado_Enumerado" class="form-control" placeholder="Estado Enumerado...">
		</div>
	</div>
	
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group">
			<button class="btn btn-primary" type="submit">Guardar</button>
			<a href="{{'url'('item/enumerado')}}"class="btn btn-danger">Cancelar</a>			
		</div>	
	</div>	
</div>
		{!!Form::close()!!}
@endsection 