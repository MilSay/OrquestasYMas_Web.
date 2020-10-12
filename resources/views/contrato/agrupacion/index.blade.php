@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 colxs-12">
		<h3>Listado de Agrupación <a href="agrupacion/create"> <button class="btn btn-success">Nuevo <i class="fas fa-plus"></i></button></a></h3>		
		@include('contrato.agrupacion.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-9 col-md-9 col-sm-9 colxs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>		
					<th>Id</th>		
					<th>Foto</th>			
					<th>Razon Social</th>
					<th>Ruc</th>										
					<th>Genero Musical</th>		
                    							
					<th class="center-actions">Opciones</th>
				</thead>
				@foreach ($agrupaciones as $agrup)
				<tr>
					<td>{{ $agrup->idAgrupacion}}</td>
					<td><img src="{{asset('agrupacion/fotos/'.$agrup->Foto)}}" alt="{{$agrup->Foto}}"
					height="50px" width="50px" class="img-thumbnail" ></td>
					<td>{{ $agrup->RazonSocial}}</td>
					<td>{{ $agrup->Ruc}}</td>
					<td>{{ $agrup->GeneroMusical}}</td>	                   				
					<td class="center-actions">
						<a href="{{URL::action('AgrupacionController@edit',$agrup->idAgrupacion)}}"><button data-toggle="tooltip" data-placement="top" title="Editar" class="btn btn-primary"><i class="fas fa-pencil-alt"></i></button> </a>
						<a href="" data-target="#modal-delete-{{$agrup->idAgrupacion}}" data-toggle="modal"><button data-toggle="tooltip" data-placement="top" title="Eliminar" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button> </a>
					</td>
				</tr>
				@include('contrato.agrupacion.modal')
				@endforeach	
			</table>
		</div>
		{{$agrupaciones->render()}}
	</div>
</div>
@endsection