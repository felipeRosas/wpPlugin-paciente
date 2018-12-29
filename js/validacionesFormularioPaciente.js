/*(function($){
    
        //agregar id del paciente al input hidden
    $(".btn-datos").click(function(){
        
        var id = $(this).parents("tr").find("th")[0].innerHTML;
       // console.log("btn-datos"+id);
        $("#idpaciente").val(id);
    });
    
    
    $("#rut").on('change',function(){
        // console.log(Fn.validaRut($(this).val()));
        if (Fn.validaRut( $(this).val() )){
           console.log("rut valido");
          
        } else {
            //console.log("rut no valido");
            alert("el rut no es valido");
            $(this).val('');
            
        }
        
    });
    
    //funciones para validar
    
    function validacionNombre(){
        var validacion = "^[a-z A-Z]{1,50}$";
        var nombre =$("#nombre");
        return nombre.val().match(validacion) ? true : false;
    }
    
    function validacionApellidos(){
        var validacion = "^[a-z A-Z]{1,60}$";
        var apellidos =$("#apellidos");
        return apellidos.val().match(validacion) ? true : false;
    }
    
    //funciones para validar rut
    var Fn = {
    	// Valida el rut con su cadena completa "XXXXXXXX-X"
    	validaRut : function (rutCompleto) {
    		rutCompleto = rutCompleto.replace("â€","-");
    		if (!/^[0-9]+[-|â€]{1}[0-9kK]{1}$/.test( rutCompleto ))
    			return false;
    		var tmp 	= rutCompleto.split('-');
    		var digv	= tmp[1]; 
    		var rut 	= tmp[0];
    		if ( digv == 'K' ) digv = 'k' ;
    		
    		return (Fn.dv(rut) == digv );
    	},
    	dv : function(T){
    		var M=0,S=1;
    		for(;T;T=Math.floor(T/10))
    			S=(S+T%10*(9-M++%6))%11;
    		return S?S-1:'k';
    	}
    }
})(jQuery);

*/

jQuery(document).ready(function( $ ) {
    

        //agregar id del paciente al input hidden
    $(".btn-datos").click(function(){
        
        var id = $(this).parents("tr").find("th")[0].innerHTML;
       // console.log("btn-datos"+id);
        $("#idpaciente").val(id);
    });
    
    $("#rut").on('click',function(){
        $("#alertRut").fadeOut();
    });
    $("#rut").on('change',function(){
        
        // console.log(Fn.validaRut($(this).val()));
        if (Fn.validaRut( $(this).val() )){
           console.log("rut valido");
          
        } else {
            //console.log("rut no valido");
           $("#alertRut").fadeIn();
            $(this).val('');
            
        }
        
    });
    
    $("#correo").on('click',function(){
        $("#alertCorreo").fadeOut();
    });
    
    $("#correo").on('change',function(){
        v=$(this).val();
        if(!validarEmail(v)){
            $("#alertCorreo").fadeIn();
        }else{
            
        }
        
    });
    
    //funciones para validar
    function validarEmail(valor) {
      if (/^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i.test(valor)){
       return true;
      } else {
          return false;
       //alert("La dirección de email es incorrecta!.");
      }
    }
    
    function validacionNombre(){
        var validacion = "^[a-z A-Z]{1,50}$";
        var nombre =$("#nombre");
        return nombre.val().match(validacion) ? true : false;
    }
    
    function validacionApellidos(){
        var validacion = "^[a-z A-Z]{1,60}$";
        var apellidos =$("#apellidos");
        return apellidos.val().match(validacion) ? true : false;
    }
    
    //funciones para validar rut
    var Fn = {
    	// Valida el rut con su cadena completa "XXXXXXXX-X"
    	validaRut : function (rutCompleto) {
    		rutCompleto = rutCompleto.replace("â€","-");
    		if (!/^[0-9]+[-|â€]{1}[0-9kK]{1}$/.test( rutCompleto ))
    			return false;
    		var tmp 	= rutCompleto.split('-');
    		var digv	= tmp[1]; 
    		var rut 	= tmp[0];
    		if ( digv == 'K' ) digv = 'k' ;
    		
    		return (Fn.dv(rut) == digv );
    	},
    	dv : function(T){
    		var M=0,S=1;
    		for(;T;T=Math.floor(T/10))
    			S=(S+T%10*(9-M++%6))%11;
    		return S?S-1:'k';
    	}
    }
	
});