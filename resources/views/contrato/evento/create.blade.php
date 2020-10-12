@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div  class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<h3>Nuevo Evento</h3>
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
		{!!Form::open(array('url'=>'contrato/evento','method'=>'POST','autocomplete'=>'off'))!!}
		{{Form::token()}}
<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" id="guardar" style="float: right;top: 20px;">
		<div class="form-group" style="float: right;">
			<button class="btn btn-primary" type="submit">Guardar</button>
			<a href="{{'url'('contrato/evento')}}"class="btn btn-danger">Cancelar</a>		
			</div>
	 </div>
</div>

<div class="row">		
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group ">
			<label for="LocalDeEvento">Local de evento</label>
			<input type="text"  value="{{old('LocalDeEvento')}}" name="LocalDeEvento" class="form-control" placeholder="Local de evento...">
		</div>
	</div>

	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group ">
        <label for="DireccionLocal">Dirección de local</label>
			<input type="text"  value="{{old('DireccionLocal')}}" name="DireccionLocal" class="form-control" placeholder="Dirección de local...">
		</div>
	</div>	

	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="from-group">
			<label>Tipo de evento</label>
			<select name="TipoEventoId" class="form-control" >
			<option disabled selected>Seleccionar tipo de evento</option>
				@foreach($tipoEventos as $te)
					<option value="{{$te->idEnumerado}}">{{$te->Nombre}}</option>
				@endforeach
			</select>
		</div>
	</div>

	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="from-group">
			<label>Tipo de entrada</label>
			<select name="TipoEntradaId" class="form-control" >
			<option disabled selected>Seleccionar tipo de entrada</option>
				@foreach($tipoEntradas as $tentr)
					<option value="{{$tentr->idEnumerado}}">{{$tentr->Nombre}}</option>
				@endforeach
			</select>
		</div>
	</div>	

	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group clockpicker " data-fromnow="now" data-align="top" data-twelvehour="true" data-autoclose="true">
			<label for="HoraInicio">Hora Inicio</label>
			<input type="text"  value="{{old('HoraInicio')}}" name="HoraInicio" class="form-control" placeholder="Hora Inicio...">		
		</div>		
	</div>

	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group clockpicker " data-align="top" data-twelvehour="true" data-autoclose="true">
			<label for="HoraFin">Hora Fin</label>
			<input type="text"  value="{{old('HoraFin')}}" name="HoraFin" class="form-control" placeholder="Hora Fin...">		
		</div>		
	</div>
	 
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
	 <div class="form-group">
		 <label for="Fecha">Fecha</label>
		 <div class="input-group">
			 <input type="text" value="{{old('Fecha')}}" class="form-control datepicker" name="Fecha" placeholder="Fecha...">
			 <div class="input-group-addon">
			 <i class="fa fa-calendar" aria-hidden="true"></i>
			 </div>
		 </div>
		</div>
	 </div>

	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="from-group">
			<label>Estado de Evento</label>
			<select name="EstadoEventoId" class="form-control" >
			<option disabled selected>Seleccionar estado de Evento</option>
				@foreach($estadoEventos as $eeven)	
					@if($eeven->Nombre =="Pendiente")				
					<option selected value="{{$eeven->idEnumerado}}">{{$eeven->Nombre}}</option>
					@endif
				@endforeach
			</select>
		</div>
	</div> 	
</div>
		{!!Form::close()!!}
@push ('scripts')
<script src="{{asset('component/evento/evento.create.component.js')}}"></script>
@endpush
@endsection 