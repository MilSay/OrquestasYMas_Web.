@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 colxs-12">
		<h3>Listado de Eventos <a href="evento/create"> <button class="btn btn-success">Nuevo <i class="fas fa-plus"></i></button></a></h3>		
		@include('contrato.evento.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 colxs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>		
                    <th>Id</th>			
					<th>Local de evento</th>
					<th>Dirección del local</th>										
					<th>Tipo de Evento</th>	
					<th>Tipo de Entrada</th>		
					<th>Hora inicio</th>
					<th>Hora fin</th>	
					<th>Estado</th>								
					<th class="center-actions">Opciones</th>
				</thead>
				@foreach ($eventos as $event)
				<tr>
					<td>{{ $event->idEvento}}</td>
					<td>{{ $event->LocalDeEvento}}</td>
					<td>{{ $event->DireccionLocal}}</td>
					<td>{{ $event->TipoEvento}}</td>	
					<td>{{ $event->TipoEntrada}}</td>
					<td>{{ $event->HoraInicio}}</td>
					<td>{{ $event->HoraFin}}</td>
					<td>{{ $event->EstadoEvento}}</td>					
					<td class="center-actions">
						<a href="{{URL::action('EventoController@edit',$event->idEvento)}}"><button data-toggle="tooltip" data-placement="top" title="Editar" class="btn btn-primary"><i class="fas fa-pencil-alt"></i></button> </a>
						<a href="" data-target="#modal-delete-{{$event->idEvento}}" data-toggle="modal"><button data-toggle="tooltip" data-placement="top" title="Eliminar" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button> </a>
					</td>
				</tr>
				@include('contrato.evento.modal')
				@endforeach	
			</table>
		</div>
		{{$eventos->render()}}
	</div>
</div>
@endsection