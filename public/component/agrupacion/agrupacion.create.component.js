$(document).ready(function(){
$('#bt_add').click(function(){
	agregar();
	});

$('#bt_addv').click(function(){
	agregarVideos();
});

$('#btn_guardar').click(function(){
	if($("#idPersona option:selected").text()!=null){
		$("#idPersona").val('default').selectpicker("refresh");
		$("#TipoPersona option:selected").text('');
	}
	if($("#link").val()!=null){
		$("#link").val('');
	}
});
	

});

var cont=0; var contVideos=0;	
$("#detalleAgrupacion").hide();
$("#detalleAgrupacionv").hide();
$("#idPersona").change(mostrarValores);

function mostrarValores(){
datosPersona=document.getElementById('idPersona').value.split('_');

}

function agregar(){
	datosPersona=document.getElementById('idPersona').value.split('_');

	idPersona=datosPersona[0];
	persona=$("#idPersona option:selected").text();
	TipoPersona=$("#TipoPersona").val();
	tipoPersonaNombre=$("#TipoPersona option:selected").text();

	if (idPersona!=null && TipoPersona!=null){
		
		var fila='<tr class="selected" id="fila'+cont+'"><td><button type="button" class="btn btn-warning" onclick="eliminar('+cont+
		');">X</button></td><td><input type="hidden" name="idPersona[]" value="'+idPersona+
		'">'+persona+'</td><td><input type="hidden" name="TipoPersona[]" value="'+TipoPersona+
		'">'+tipoPersonaNombre+'</td></tr>';	
		
		cont++;
		$('#detalleAgrupacion').append(fila);
		$("#detalleAgrupacion").show();
		$("#idPersona").val('default').selectpicker("refresh");
		$("#TipoPersona option:selected").text('');
			
	}else{
		alert("Selecionar persona y tipo persona");
	}
}
function eliminar(index){ 
	
    $("#fila" + index).remove();
}
/** agregar videos */
function agregarVideos(){	
	link=$("#link").val();
	Descripcion=$("#Descripcion").val();

	if (link!="" && Descripcion!=""){		
		var filaVideos='<tr class="selected" id="filaVideos'+contVideos+'"><td><button type="button" class="btn btn-warning" onclick="eliminarVideos('+contVideos+
		');">X</button></td><td><input type="hidden" name="link[]" value="'+link+
		'">'+link+'</td><td><input type="hidden" name="Descripcion[]" value="'+Descripcion+
		'">'+Descripcion+'</td></tr>';	
		
		contVideos++;			
		$('#detalleAgrupacionv').append(filaVideos);
		$("#detalleAgrupacionv").show();
		$("#link").val('');
		$("#Descripcion").val('');
	}else{
		alert("Ingresar link y descripcón");
	}
}

function eliminarVideos(index){   		 
	$("#filaVideos" + index).remove();
}