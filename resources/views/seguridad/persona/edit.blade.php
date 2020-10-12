@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div  class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<h3>Editar Persona: {{$persona->Nombres}}</h3>
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
		{!!Form::model($persona,['method'=>'PATCH','route'=>['persona.update',$persona->idPersona],'files'=>'true'])!!}
		{{Form::token()}}	
		<div id="profile">
<div class="dashes"></div>
@if(($persona->Foto)!=null)				
	<img  src="{{asset('persona/fotos/'.$persona->Foto)}}" height="100px" width="100px">
@endif
</div>	
<input type="file"  name="Foto" id="mediaFile" class="form-control"/>
	
<div class="row">	
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group ">
			<label for="Nombres">Nombres</label>
			<input type="text"  value="{{$persona->Nombres}}" name="Nombres" class="form-control" placeholder="Nombres...">
		</div>
	</div>
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group ">
        <label for="Apellidos">Apellidos</label>
			<input type="text"  value="{{$persona->Apellidos}}" name="Apellidos" class="form-control" placeholder="Apellidos...">
		</div>
	</div>
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="from-group">
			<label>Genero</label>
			<select name="GeneroId"  class="form-control">
			<option disabled selected>Seleccionar genero</option>			
				@foreach($generoEnumerados as $cat)
					@if($cat->idEnumerado == $persona->GeneroId)
					<option value="{{$cat->idEnumerado}}" selected>{{$cat->Nombre}}</option>
					@else
					<option value="{{$cat->idEnumerado}}">{{$cat->Nombre}}</option>
					@endif
				@endforeach
			</select>
		</div>
	</div>		
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group ">
			<label for="Dni">D.N.I</label>
			<input type="number"  value="{{$persona->Dni}}" name="Dni" class="form-control" placeholder="D.N.I...">
		</div>
	</div>
 
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
	 <div class="form-group">
		 <label for="FechaNacimiento">Fecha</label>
		 <div class="input-group">
			 <input type="text" value="{{$persona->FechaNacimiento}}" class="form-control datepicker" name="FechaNacimiento" placeholder="Fecha de nacimiento...">
			 <div class="input-group-addon">
			 <i class="fa fa-calendar" aria-hidden="true"></i>
			 </div>
		 </div>
		</div>
	 </div>
 
  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group ">
			<label for="Email">Email</label>
			<input type="email"  value="{{$persona->Email}}" name="Email" class="form-control" placeholder="Email...">
		</div>
	</div> 

	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group ">
			<label for="UserName">UserName</label>
			<input type="text"  value="{{$persona->UserName}}" name="UserName" class="form-control" placeholder="UserName...">
		</div>
	</div>  
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group ">
			<label for="password">Password</label>
			<input type="password"  value="{{$persona->password}}" name="password" class="form-control" placeholder="Password...">
		</div>
	</div> 

	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="from-group">
			<label>Departamento</label>
			<select name="CodigoDepartamento"  id="CodigoDepartamento" data-field-id="{{$persona->CodigoDepartamento}}" class="form-control dynamic1">
			<option disabled selected>Seleccionar departamento</option>	
				@foreach($departamentos as $dep)
					@if($dep->cod_depa == $persona->CodigoDepartamento)
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
			<select name="CodigoProvincia" id="CodigoProvincia" data-field-id="{{$persona->CodigoProvincia}}" class="form-control dynamic2" >	
			<option disabled selected>Selecionar provincia</option>
			</select>
		</div>
	</div>

	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="from-group">
			<label>Distrito</label>
			<select name="CodigoDistrito" id="CodigoDistrito" data-field-id="{{$persona->CodigoDistrito}}" class="form-control dynamic" >			
			<option disabled selected>Selecionar distrito</option>				
			</select>
		</div>
	</div> 

	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group ">
			<label for="Celular">Celular</label>
			<input type="text"  value="{{$persona->Celular}}" name="Celular" class="form-control" placeholder="Celular...">
		</div>
	</div>

	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="from-group">
			<label>Rol</label>
			<select name="idRol"  class="form-control">
			<option disabled selected>Seleccionar rol</option>			
				@foreach($rolEnumerados as $role)
					@if($role->idEnumerado == $persona->idRol)
					<option value="{{$role->idEnumerado}}" selected>{{$role->Nombre}}</option>
					@else
					<option value="{{$role->idEnumerado}}">{{$role->Nombre}}</option>
					@endif
				@endforeach
			</select>
		</div>
	</div>
</div>
<div class="row" style="margin-top: 10px;">
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group">
			<button class="btn btn-primary" type="submit">Guardar</button>
			<a href="{{'url'('seguridad/persona')}}"class="btn btn-danger">Cancelar</a>			
		</div>	
	</div>
</div>

{!!Form::close()!!}	
@push ('scripts')
<script src="{{asset('component/ubigeo/ubigeo.edit.component.js')}}"></script>
@endpush

@endsection