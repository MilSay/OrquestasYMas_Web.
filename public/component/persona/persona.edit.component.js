$(document).ready(function(){   
    var codDepartamento = $('#CodigoDepartamento').data("field-id");
    var codProvincia = $('#CodigoProvincia').data("field-id");
    var codDistrito = $('#CodigoDistrito').data("field-id");
	window.onload = inicializar;

function inicializar(){
	obtnerProvincia();
	obtnerDistrito();
}
	function obtnerProvincia(){        
	$.get('provincia/'+codDepartamento, function(res1, sta){
        $("#CodigoProvincia").empty(); 
        $("#CodigoProvincia").append(`<option disabled selected> Selecionar provincia </option>`);      			
		res1.forEach(element => {
			if(element.cod_prov ==codProvincia){			
				$("#CodigoProvincia").append(`<option value=${element.cod_prov} selected> ${element.provincia} </option>`);
			}	else{
				$("#CodigoProvincia").append(`<option value=${element.cod_prov}> ${element.provincia} </option>`);
			}			
		});
	});
	}


	function obtnerDistrito(){
		$.get('distrito/'+codDepartamento+'/'+codProvincia, function(res2, sta){
        $("#CodigoDistrito").empty();
        $("#CodigoDistrito").append(`<option disabled selected> Selecionar distrito </option>`); 
		res2.forEach(element => {
			if(element.cod_dist ==codDistrito){			
				$("#CodigoDistrito").append(`<option value=${element.cod_dist} selected> ${element.distrito} </option>`);
			}	else{
				$("#CodigoDistrito").append(`<option value=${element.cod_dist}> ${element.distrito} </option>`);
			}
		});
	});
	}



$('.dynamic1').change(function(){
 if($(this).val() != '')
 {
	var select = $(this).attr("id");
    codDepartamento = $(this).val();   
    console.log("entrada provincia"+codDepartamento); 
	$.get('provincia/'+codDepartamento, function(res1, sta){
        $("#CodigoProvincia").empty();       
		if(select == "CodigoDepartamento"){			
			$("#CodigoProvincia").append(`<option disabled selected> Selecionar provincia</option>`);		
		}			
		res1.forEach(element => {		
				$("#CodigoProvincia").append(`<option value=${element.cod_prov}> ${element.provincia} </option>`);		
		});
		obtnerDistrito()
	});
	
 }
});



$('.dynamic2').change(function(){
 if($(this).val() != '')
 {
	var select = $(this).attr("id");
	codProvincia = $(this).val();	
	$.get('distrito/'+codDepartamento+'/'+codProvincia, function(res2, sta){
        $("#CodigoDistrito").empty();       
		if(select == "CodigoProvincia"){			
			$("#CodigoDistrito").append(`<option disabled selected> Selecionar distrito</option>`);		
		}	
		res2.forEach(element => {
			$("#CodigoDistrito").append(`<option value=${element.cod_dist}> ${element.distrito} </option>`);
		});
	});
 }
});

	
$('.datepicker').datepicker({
    format: "yyyy-mm-dd",
    language: "es",
	autoclose: true,
	todayHighlight: true
});

});