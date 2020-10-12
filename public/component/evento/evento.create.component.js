$(document).ready(function(){   	
    $('.datepicker').datepicker({
        format: "yyyy-mm-dd",
        language: "es",
        autoclose: true,
        todayHighlight: true
    });
    
    $('.clockpicker').clockpicker();
    
    });