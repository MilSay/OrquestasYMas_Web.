@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div  class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<h3>Editar Agrupación: {{$agrupacion->RazonSocial}}</h3>
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
{!!Form::model($agrupacion,['method'=>'PATCH','route'=>['agrupacion.update',$agrupacion->idAgrupacion],'files'=>'true'])!!}
{{Form::token()}}	
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="float: right;top: 20px;">
			<div class="form-group" style="float: right;">
				<input name="_token" value="{{ csrf_token() }}" type="hidden"></input>
				<button class="btn btn-primary" id="btn_guardar" type="submit">Guardar</button>
				<a href="{{'url'('contrato/agrupacion')}}"class="btn btn-danger">Cancelar</a>			
			</div>	
		</div>
	</div>

	<div class="row">	
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group ">
				<label for="RazonSocial">Razon Social</label>
				<input type="text" required value="{{$agrupacion->RazonSocial}}" name="RazonSocial" class="form-control" placeholder="Razon Social...">
			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group ">
					<label for="Ruc">N° Ruc</label>
				<input type="number" required value="{{$agrupacion->Ruc}}" name="Ruc" class="form-control" placeholder="N° Ruc...">
			</div>
		</div>
		
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="from-group">
				<label>Genero</label>
				<select required name="GeneroMusical"  class="form-control">
				<option disabled selected>Seleccionar genero musical</option>			
					@foreach($generoMusical as $gm)
						@if($gm->idEnumerado == $agrupacion->GeneroMusical)
						<option value="{{$gm->idEnumerado}}" selected>{{$gm->Nombre}}</option>
						@else
						<option value="{{$gm->idEnumerado}}">{{$gm->Nombre}}</option>
						@endif
					@endforeach
				</select>
			</div>
		</div>

		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="from-group">
				<label>Departamento</label>
				<select name="CodigoDepartamento"  id="CodigoDepartamento" data-field-id="{{$agrupacion->CodigoDepartamento}}"class="form-control dynamic1">
				<option disabled selected>Seleccionar departamento</option>	
					@foreach($departamentos as $dep)
						@if($dep->cod_depa == $agrupacion->CodigoDepartamento)
						<option value="{{$dep->cod_depa}}" selected>{{$dep->departamento}}</option>
						@else
						<option value="{{$dep->cod_depa}}">{{$dep->departamento}}</option>
						@endif
					@endforeach
				</select>
			</div>
		</div>

		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="from-group">
				<label>Provincia</label>
				<select name="CodigoProvincia" id="CodigoProvincia" data-field-id="{{$agrupacion->CodigoProvincia}}" class="form-control dynamic2" >	
				<option disabled selected>Selecionar provincia</option>
				</select>
			</div>
		</div>

		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="from-group">
				<label>Distrito</label>
				<select name="CodigoDistrito" id="CodigoDistrito" data-field-id="{{$agrupacion->CodigoDistrito}}" class="form-control dynamic" >			
				<option disabled selected>Selecionar distrito</option>				
				</select>
			</div>
		</div>	

		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group ">
				<label for="Historia">Historia</label>
				<input type="text" required value="{{$agrupacion->Historia}}" name="Historia" class="form-control" placeholder="Historia...">
			</div>
		</div>  

		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group ">
			<label for="facebook">Facebook</label>
			<input type="text" required value="{{$agrupacion->facebook}}" name="facebook" class="form-control" placeholder="Facebook...">
		</div>
    	</div>
    	
    	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    		<div class="form-group ">
    			<label for="twitter">Twitter</label>
    			<input type="text" required value="{{$agrupacion->twitter}}" name="twitter" class="form-control" placeholder="Twitter...">
    		</div>
    	</div>
    	
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    		<div class="form-group ">
    			<label for="youtuve">Youtube</label>
    			<input type="text" required value="{{$agrupacion->youtuve}}" name="youtuve" class="form-control" placeholder="Youtube...">
    		</div>
    	</div> 

		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="from-group">
				<label>Manager</label>
				<select required name="idPersonaManager"  class="form-control">
				<option disabled selected>Seleccionar manager</option>			
					@foreach($personasManager as $pm)
						@if($pm->idPersona == $agrupacion->idPersona)
						<option value="{{$pm->idPersona}}" selected>{{$pm->Nombres}} {{$pm->Apellidos}}</option>
						@else
						<option value="{{$pm->idPersona}}">{{$pm->Nombres}} {{$pm->Apellidos}}</option>
						@endif
					@endforeach
				</select>
			</div>
		</div>

 	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group ">
			<label for="direccion">Dirección</label>
			<input type="text" required value="{{$agrupacion->direccion}}" name="direccion" class="form-control" placeholder="Dirección...">
		</div>
	</div>


		<div id="profile">
			<div class="dashes"></div>
				@if(($agrupacion->Foto)!=null)				
					<img  src="{{asset('agrupacion/fotos/'.$agrupacion->Foto)}}" height="100px" width="100px">
				@endif
		</div>	
			<input type="file"  name="Foto" id="mediaFile" class="form-control"/>
	</div>

	<div class="row">
		<div class="panel panel-primary">
			<div class="panel-heading">Registrar integrantes</div>
			<div class="panel-body">

			<div class="col-lg-5 col-sm-5 col-md-5 col-xs-12">
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

			<div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
				<div class="from-group">
					<label>Tipo persona</label>
					<select name="TipoPersona" id="TipoPersona" class="form-control" >
					<option disabled selected>Seleccionar genero</option>
						@foreach($tipoPersonas as $tp)
							<option value="{{$tp->idEnumerado}}">{{$tp->Nombre}}</option>
						@endforeach
					</select>
				</div>
			</div>

			<div class="col-lg-2 col-sm-2 col-md-2 col-xs-12" style="top: 20px;"  >
				<div class="form-group">
					<button class="btn btn-primary" type="button" id="bt_add">Agregar</button>
				</div>
			</div>

			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="table-responsive">
					<table id="detalleAgrupacion" class="table  table-borderless table-condensed table-hover">
						<thead style="background-color: #A9D0F5">            
						<th>Opciones</th>
						<th>Persona</th>
						<th>Tipo persona</th>	
						</thead>	
							<tbody> 
								@foreach($detalleAgrupacion as $da)
								<tr>
								<td ><button type="button" class="btn btn-warning" onclick="eliminarDetalle('{{$da->idDetalle}}');">X</button></td>		
								<td>{{$da->Nombres}} {{$da->Apellidos}}</td>			
								<td>{{$da->TipoPersona}}</td>			
								</tr>
								@endforeach             
							</tbody>              
					</table>
				</div>				           
			</div>
		</div>
	</div>

	<div class="row">
		<div class="panel panel-primary">
			<div class="panel-heading">Registrar videos</div>
			<div class="panel-body">

		<div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
			<div class="form-group ">
				<label for="link">Link</label>
				<input type="text" id="link"  value="{{$agrupacion->link}}" name="link" class="form-control" placeholder="Link...">
			</div>
		</div>
		<div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
			<div class="form-group ">
					<label for="Descripcion">Descripcion</label>
				<input type="text" id="Descripcion"   value="{{$agrupacion->Descripcion}}" name="Descripcion" class="form-control" placeholder="Descripcion...">
			</div>
		</div>

			<div class="col-lg-2 col-sm-2 col-md-2 col-xs-12" style="top: 20px;"  >
				<div class="form-group">
					<button class="btn btn-primary" type="button" id="bt_addv">Agregar</button>
				</div>
			</div>

			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="table-responsive">
					<table id="detalleAgrupacionv" class="table  table-borderless table-condensed table-hover">
						<thead style="background-color: #A9D0F5">            
						<th>Opciones</th>
						<th>Link</th>
						<th>Descripción</th>	
						</thead>	
							<tbody> 
								@foreach($detalleVideos as $vi)
								<tr>
								<td ><button type="button" class="btn btn-warning" onclick="eliminarDetalleV('{{$vi->idVideos}}');">X</button></td>		
								<td>{{$vi->link}}</td>			
								<td>{{$vi->Descripcion}}</td>			
								</tr>
								@endforeach             
							</tbody>              
					</table>
				</div>				           
			</div>
		</div>
	</div>
{!!Form::close()!!}	
@push ('scripts')
<script src="{{asset('component/ubigeo/ubigeo.edit.component.js')}}"></script>
<script src="{{asset('component/agrupacion/agrupacion.edit.component.js')}}"></script>
@endpush
@endsection