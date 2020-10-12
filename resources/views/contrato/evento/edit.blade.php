@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div  class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<h3>Editar Evento: {{$evento->LocalDeEvento}}</h3>
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
		{!!Form::model($evento,['method'=>'PATCH','route'=>['evento.update',$evento->idEvento]])!!}
		{{Form::token()}}	

	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="float: right;top: 20px;">
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
			<input type="text"  value="{{$evento->LocalDeEvento}}" name="LocalDeEvento" class="form-control" placeholder="Local de evento...">
		</div>
	</div>

	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group ">
        <label for="DireccionLocal">Dirección de local</label>
			<input type="text"  value="{{$evento->DireccionLocal}}" name="DireccionLocal" class="form-control" placeholder="Dirección de local...">
		</div>
	</div>	

	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="from-group">
				<label>Tipo de evento</label>
				<select  name="TipoEventoId"  class="form-control">
				<option disabled selected>Seleccionar tipo de evento</option>			
					@foreach($tipoEventos as $teven)
						@if($teven->idEnumerado == $evento->TipoEventoId)
						<option value="{{$teven->idEnumerado}}" selected>{{$teven->Nombre}}</option>
						@else
						<option value="{{$teven->idEnumerado}}">{{$teven->Nombre}}</option>
						@endif
					@endforeach
				</select>
		</div>
	</div>

	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="from-group">
				<label>Tipo de entrada</label>
				<select  name="TipoEntradaId"  class="form-control">
				<option disabled selected>Seleccionar tipo de entrada</option>			
					@foreach($tipoEntradas as $ten)
						@if($ten->idEnumerado == $evento->TipoEntradaId)
						<option value="{{$ten->idEnumerado}}" selected>{{$ten->Nombre}}</option>
						@else
						<option value="{{$ten->idEnumerado}}">{{$ten->Nombre}}</option>
						@endif
					@endforeach
				</select>
		</div>
	</div>	

	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group clockpicker " data-fromnow="now" data-align="top" data-twelvehour="true" data-autoclose="true">
			<label for="HoraInicio">Hora Inicio</label>
			<input type="text"  value="{{$evento->HoraInicio}}" name="HoraInicio" class="form-control" placeholder="Hora Inicio...">		
		</div>		
	</div>

	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group clockpicker " data-align="top" data-twelvehour="true" data-autoclose="true">
			<label for="HoraFin">Hora Fin</label>
			<input type="text" value="{{$evento->HoraFin}}" name="HoraFin" class="form-control" placeholder="Hora Fin...">		
		</div>		
	</div>


	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
	 <div class="form-group">
		 <label for="Fecha">Fecha</label>
		 <div class="input-group">
			 <input type="text" value="{{$evento->Fecha}}" class="form-control datepicker" name="Fecha" placeholder="Fecha...">
			 <div class="input-group-addon">
			 <i class="fa fa-calendar" aria-hidden="true"></i>
			 </div>
		 </div>
		</div>
	 </div>
	
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="from-group">
				<label>Estado Evento</label>
				<select  name="EstadoEventoId"  class="form-control">
				<option disabled selected>Seleccionar estado Evento</option>			
					@foreach($estadoEventos as $esev)
						@if($esev->idEnumerado == $evento->EstadoEventoId)
						<option value="{{$esev->idEnumerado}}" selected>{{$esev->Nombre}}</option>
						@else
						<option value="{{$esev->idEnumerado}}">{{$esev->Nombre}}</option>
						@endif
					@endforeach
				</select>
		</div>
	</div>	
</div>
		{!!Form::close()!!}	
		@push ('scripts')
<script src="{{asset('component/evento/evento.edit.component.js')}}"></script>
@endpush
@endsection