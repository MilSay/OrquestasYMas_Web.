
$(document).ready(function(){

	var codDepartamento,codProvincia; 
	
	$('.dynamic1').change(function(){
	 if($(this).val() != '')
	 {
		var select = $(this).attr("id");
		codDepartamento = $(this).val();
		$.get('provinciaCreate/'+codDepartamento, function(res1, sta){
			$("#CodigoProvincia").empty();			
			if(select == "CodigoDepartamento"){			
				$("#CodigoProvincia").append(`<option disabled selected> Selecionar provincia</option>`);		
			}	
			res1.forEach(element => {	
				
					$("#CodigoProvincia").append(`<option value=${element.cod_prov}> ${element.provincia} </option>`);		
			});
		
		});
		
	 }
	});
	
	
	$('.dynamic2').change(function(){
	 if($(this).val() != '')
	 {
		var select = $(this).attr("id");
		codProvincia = $(this).val();	
		$.get('distritoCreate/'+codDepartamento+'/'+codProvincia, function(res2, sta){
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