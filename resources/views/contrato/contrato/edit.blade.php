@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div  class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<h3>Editar contrato: {{$contrato->idContrato}}</h3>
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
		{!!Form::model($contrato,['method'=>'PATCH','route'=>['contrato.update',$contrato->idContrato]])!!}
		{{Form::token()}}	
<div class="row">	
	<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
		<div class="form-group">
			<label>Evento</label>
			<select name="idEvento" id="idEvento" class="form-control selectpicker" data-live-search="true">	
			<option disabled selected>Seleccionar persona</option>
			@foreach($eventos as $even)
			@if($even->idEvento == $contrato->idEvento)						
				<option selected value="{{$even->idEvento}}">{{$even->LocalDeEvento}} </option>
				@else
				<option value="{{$even->idEvento}}">{{$even->LocalDeEvento}}</option>
				@endif			
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
			@if($person->idPersona == $contrato->idPersona)						
				<option selected value="{{$person->idPersona}}">{{$person->Nombres}} {{$person->Apellidos}}</option>
				@else
				<option value="{{$person->idPersona}}">{{$person->Nombres}} {{$person->Apellidos}}</option>
				@endif			
			@endforeach
			</select>
		</div>
	</div>
	<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
		<div class="form-group">
			<label>Persona</label>
			<select name="idAgrupacion" id="idAgrupacion" class="form-control selectpicker" data-live-search="true">	
			<option disabled selected>Seleccionar persona</option>
			@foreach($agrupaciones as $agrup)
			@if($agrup->idAgrupacion == $contrato->idAgrupacion)						
				<option selected value="{{$agrup->idAgrupacion}}">{{$agrup->RazonSocial}} </option>
				@else
				<option value="{{$agrup->idAgrupacion}}">{{$agrup->RazonSocial}} </option>
				@endif			
			@endforeach
			</select>
		</div>
	</div>		
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group ">
			<label for="MontoInicial">Monto inicial</label>
			<input type="text" required value="{{$contrato->MontoInicial}}" name="MontoInicial" class="form-control" placeholder="Monto inicial...">
		</div>
	</div>
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group ">
			<label for="MontoTotal">Monto total</label>
			<input type="text" required value="{{$contrato->MontoTotal}}" name="MontoTotal" class="form-control" placeholder="Monto total...">
		</div>
	</div>
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
	 <div class="form-group">
		 <label for="FechaContrato">Fecha contrato</label>
		 <div class="input-group">
			 <input type="text" value="{{$contrato->FechaContrato}}" class="form-control datepicker" name="FechaContrato" placeholder="Fecha contrato...">
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
<script src="{{asset('component/evento/evento.edit.component.js')}}"></script>
@endpush
@endsection