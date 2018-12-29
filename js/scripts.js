jQuery(document).ready(function( $ ) {
	
	  //listar las evaluaciones de un paciente
    $(".btn-datos").click(function(){
        var id = $(this).parents("tr").find("th")[0].innerHTML;
        console.log("evaluaciones"+id);
        cargarEvaluaciones(id);
    });
    
    function cargarEvaluaciones(id){
        $.ajax({
            type: "POST",
            url: url_object.ajaxurl_evaluaciones,
            datatype : "application/json",
            data:{'idpaciente':id, 'action':'cargarListaEvaluaciones'},
            success: function(response){
               
                var datos = JSON.parse(response);
                
                if(datos.respuesta != "ok"){
                    $("#listaEvaluaciones").html("");
                    $("#listaEvaluaciones").html(datos.resultadohtml);
                }else{
                    console.log(datos.resultadohtml);
                    $("#listaEvaluaciones").html("");
                    $("#listaEvaluaciones").html(datos.resultadohtml);
                    
                }
                
                
            }
        });
    }
	
});


   