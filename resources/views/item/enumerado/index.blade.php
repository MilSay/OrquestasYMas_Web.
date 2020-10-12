@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 colxs-12">
		<h3>Listado de Enumerados <a href="enumerado/create"> <button class="btn btn-success">Nuevo</button></a></h3>		
		@include('item.enumerado.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-9 col-md-9 col-sm-9 colxs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>		
                    <th>Id</th>			
					<th>Nombre</th>
					<th>Valor</th>										
					<th>Tipo</th>		
                    <th>Estado</th>									
					<th class="center-actions">Opciones</th>
				</thead>
				@foreach ($enumerados as $enume)
				<tr>
					<td>{{ $enume->idEnumerado}}</td>
					<td>{{ $enume->Nombre}}</td>
					<td>{{ $enume->Valor_enumerado}}</td>
					<td>{{ $enume->Tipo_Enumerado}}</td>	
                    <td>{{ $enume->Estado_Enumerado}}</td>					
					<td class="center-actions">
						<a href="{{URL::action('EnumeradoController@edit',$enume->idEnumerado)}}"><button class="btn btn-primary">Editar</button> </a>
						<a href="" data-target="#modal-delete-{{$enume->idEnumerado}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button> </a>
					</td>
				</tr>
				@include('item.enumerado.modal')
				@endforeach	
			</table>
		</div>
		{{$enumerados->render()}}
	</div>
</div>
@endsection