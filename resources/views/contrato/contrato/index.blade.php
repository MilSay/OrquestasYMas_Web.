@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 colxs-12">
		<h3>Listado de contratos <a href="contrato/create"> <button class="btn btn-success">Nuevo <i class="fas fa-plus"></i></button></a></h3>		
		@include('contrato.contrato.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 colxs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>		
                    <th>Id</th>			
					<th>Evento</th>
					<th>Persona</th>										
					<th>Agrupación</th>		
					<th>Fecha Contrato</th>		
					<th>Monto Inicial</th>
					<th>Monto Total</th>							
					<th class="center-actions">Opciones</th>
				</thead>
				@foreach ($contratos as $cont)
				<tr>
					<td>{{ $cont->idContrato}}</td>
					<td>{{ $cont->LocalDeEvento}}</td>
					<td>{{ $cont->Nombres}} {{$cont->Apellidos}}</td>
					<td>{{ $cont->RazonSocial}}</td>	
					<td>{{ $cont->FechaContrato}}</td>	
					<td>{{ $cont->MontoInicial}}</td>
					<td>{{ $cont->MontoTotal}}</td>				
					<td class="center-actions">
						<a href="{{URL::action('ContratoController@edit',$cont->idContrato)}}"><button data-toggle="tooltip" data-placement="top" title="Editar" class="btn btn-primary"><i class="fas fa-pencil-alt"></i></button> </a>
						<a href="" data-target="#modal-delete-{{$cont->idContrato}}" data-toggle="modal"><button data-toggle="tooltip" data-placement="top" title="Eliminar" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button> </a>
					</td>
				</tr>
				@include('contrato.contrato.modal')
				@endforeach	
			</table>
		</div>
		{{$contratos->render()}}
	</div>
</div>
@endsection