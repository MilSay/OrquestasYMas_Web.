@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 colxs-12">
		<h3>Listado de Personas <a href="persona/create"> <button class="btn btn-success">Nuevo <i class="fas fa-plus"></i></button></a></h3>		
		@include('seguridad.persona.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 colxs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>		
                    <th>Id</th>			
					<th>Nombres</th>														
					<th>Apellidos</th>		
					<th>Celular</th>
					<th>Email</th>
					<th>UserName</th>			
					<th class="center-actions">Opciones</th>
				</thead>
				@foreach ($personas as $per)
				<tr>
					<td>{{ $per->idPersona}}</td>
					<td>{{ $per->Nombres}}</td>
					<td>{{ $per->Apellidos}}</td>
					<td>{{ $per->Celular}}</td>	
					<td>{{ $per->Email}}</td>
					<td>{{ $per->UserName}}</td>					
										
					<td class="center-actions">
						<a href="{{URL::action('PersonaController@edit',$per->idPersona)}}"><button data-toggle="tooltip" data-placement="top" title="Editar" class="btn btn-primary"><i class="fas fa-pencil-alt"></i></button> </a>
						<a href="" data-target="#modal-delete-{{$per->idPersona}}" data-toggle="modal"><button data-toggle="tooltip" data-placement="top" title="Eliminar" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button> </a>
					</td>
				</tr>
				@include('seguridad.persona.modal')
				@endforeach	
			</table>
		</div>
		{{$personas->render()}}
	</div>
</div>

@endsection
