@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div  class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<h3>Nuevo Contrato</h3>
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
		{!!Form::open(array('url'=>'contrato/contrato','method'=>'POST','autocomplete'=>'off'))!!}
		{{Form::token()}}
<div class="row">	
	<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
		<div class="form-group">
			<label>Persona</label>
			<select name="idEvento" id="idEvento" class="form-control selectpicker" data-live-search="true">	
			<option disabled selected>Seleccionar evento</option>
			@foreach($eventos as $even)
			<option value="{{$even->idEvento}}">{{$even->LocalDeEvento}}</option>
			@endforeach
			</select>
		</div>
	</div>	
	<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
		<div class="form-group">
			<label>Persona</label>
			<select name="idPersona" id="idPersona" class="form-control selectpicker" data-live-search="true">	
			<option disabled selected>Seleccionar persona</option>
			@foreach($personas as $person)
			<option value="{{$person->idPersona}}">{{$person->Nombres}} {{$person->Apellidos}}</option>
			@endforeach
			</select>
		</div>
	</div>

	<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
		<div class="form-group">
			<label>Agrupación</label>
			<select name="idAgrupacion" id="idAgrupacion" class="form-control selectpicker" data-live-search="true">	
			<option disabled selected>Seleccionar agrupación</option>
			@foreach($agrupaciones as $agru)
			<option value="{{$agru->idAgrupacion}}">{{$agru->RazonSocial}}</option>
			@endforeach
			</select>
		</div>
	</div>
	
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group ">
			<label for="MontoInicial">Monto inicial</label>
			<input type="text"  value="{{old('MontoInicial')}}" name="MontoInicial" class="form-control" placeholder="Monto inicial...">
		</div>
	</div>
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group ">
			<label for="MontoTotal">Monto total</label>
			<input type="text"  value="{{old('MontoTotal')}}" name="MontoTotal" class="form-control" placeholder="Monto total...">
		</div>
	</div>

	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
	 <div class="form-group">
		 <label for="FechaContrato">Fecha de contrato</label>
		 <div class="input-group">
			 <input type="text" value="{{old('FechaContrato')}}" class="form-control datepicker" name="FechaContrato" placeholder="Fecha de contrato...">
			 <div class="input-group-addon">
			 <i class="fa fa-calendar" aria-hidden="true"></i>
			 </div>
		 </div>
		</div>
	 </div>


	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group">
			<button class="btn btn-primary" type="submit">Guardar</button>
			<a href="{{'url'('contrato/contrato')}}"class="btn btn-danger">Cancelar</a>			
		</div>	
	</div>	
</div>
		{!!Form::close()!!}
@push ('scripts')
<script src="{{asset('component/evento/evento.create.component.js')}}"></script>
@endpush
@endsection 