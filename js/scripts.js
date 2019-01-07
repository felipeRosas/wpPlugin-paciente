

jQuery(document).ready(function( $ ) {
    //PACIENTES
    
      //listar las evaluaciones de un paciente y sus datos
    $(".btn-datos").click(function(){
        
        var id = $(this).parents("tr").find("th")[0].innerHTML;
        console.log("evaluaciones"+id);
        
        $(location).attr('href','http://neuroboxing.cl/wp-admin/admin.php?page=datos_paciente&id='+id);
       
    });
    
    //editar datos paciente-redirigir a vista edit
    $(".btn-editar-paciente").click(function(){
        var id = $(this).parents("tr").find("th")[0].innerHTML;
        console.log("paciente"+id);
        $(location).attr('href','http://neuroboxing.cl/wp-admin/admin.php?page=_paciente&edit='+id);
    });
    
    $("#btn-editar-cancelar").click(function(){
       alert("af");
       // $(location).attr('href','http://neuroboxing.cl/wp-admin/admin.php?page=pacientes_plugin');
    });
   
   $("#desplegarInputUbicacion").click(function(){
       
       $(".selectUbicacion").show();
       
       //event.preventDefault();
   });
    
    
     //eliminar Paciente
    $(".btn-eliminar-paciente").click(function(){
        var id = $(this).parents("tr").find("th")[0].innerHTML;
        
        console.log("eliminar paciente "+id);
        
        var opcion = confirm("¿¿Seguro de eliminar??");
        
        if (opcion == true) {
            $.ajax({
            type: "POST",
            url: url_object.ajaxurl_evaluaciones,
            datatype : "application/json",
            data:{'idpaciente':id, 'action':'eliminarPaciente'},
            success: function(response){
                //var datos = JSON.parse(response);
                //console.log(datos);
              //console.log(response);
                window.location.reload(true); 
                }
        });
    	} else {
	    console.log("Has clickado Cancelar");
	    }
        
        
    });
    
	
	
    
    $(".nuevaEvaluacion").click(function(){
        var id = $("#idpacientenuevaevaluacion").val();
        $(location).attr('href','http://neuroboxing.cl/wp-admin/admin.php?page=evaluacion_paciente&id='+id);
    });
    
    function cargarEvaluaciones(id){
        
        $.ajax({
            type: "POST",
            url: url_object.ajaxurl_evaluaciones,
            datatype : "application/json",
            data:{'idpaciente':id, 'action':'cargarListaEvaluaciones'},
            success: function(response){
                var datos = JSON.parse(response);
                console.log(datos);
                if(datos.respuesta != "ok"){
                    $("#listaEvaluaciones").html("");
                    $("#listaEvaluaciones").html(datos.resultadohtml);
                }else{
                   
                    $("#listaEvaluaciones").html("");
                    $("#listaEvaluaciones").html(datos.resultadohtml);
                    $("#datosRespuesta").html(datos.datosHTML);
                    
                }
                
                
            }
        });
    }
    
    
   //radio buttons uso de ayudas tecnicas
   
  
  
   
   
   //editar evaluacion
   $(".btnEditar").click(function(){
       var id = $(this).parents("tr").find("td")[0].innerHTML;
        var idpaciente = $("#idpaciente").val();
      
        $(location).attr('href','http://neuroboxing.cl/wp-admin/admin.php?page=evaluacion_paciente&id_eval='+id+'&pac='+idpaciente);
        //editarEvaluacion(id);
   });
   
   
   //ELIMINAR EVALUACION
   
   	//eliminar evaluacion
   	$(".evaluacionesPaciente").on('click', '.btnEliminar', function(e) {
        console.log("eliminar");
    });
   	
   	
    $(".btnEliminar").click(function(){
        var id = $(this).parents("tr").find("td")[0].innerHTML;
        var idpaciente = $("#idpacientenuevaevaluacion").val();
        console.log("eliminar evaluacion "+id+" de paciente "+idpaciente);
        
        var opcion = confirm("¿¿Seguro de eliminar??");
        
        if (opcion == true) {
            $.ajax({
            type: "POST",
            url: url_object.ajaxurl_evaluaciones,
            datatype : "application/json",
            data:{'idevaluacion':id,'idpaciente':idpaciente, 'action':'eliminarEvaluacion'},
            success: function(response){
                var datos = JSON.parse(response);
                //console.log(datos);
               // console.log(response);
                if(datos.respuesta != "ok"){
                    $("#evaluacionesPaciente").html("");
                    $("#evaluacionesPaciente").html(datos.resultadohtml);
                }else{
                     window.location.reload(true); 
                    //$("#evaluacionesPaciente").html("");
                   // $("#evaluacionesPaciente").html(datos.resultadohtml);
                    
                
                }
                }
        });
    	} else {
	    console.log("Has clickado Cancelar");
	    }
        /*
        */
    });
   
   
   
   
   //VER EVALUACION
   $(".btnVer").click(function(){
        var id = $(this).parents("tr").find("td")[0].innerHTML;
        
         var idpaciente = $("#idpaciente").val();
      
        $(location).attr('href','http://neuroboxing.cl/wp-admin/admin.php?page=evaluacion_paciente&ver_eval='+id+'&pac='+idpaciente);
    
    });
    
    
     
   //despues de un ajax
   /* $("#tabla-evaluaciones").on('click', '.btnVer', function(e) {
        var id = $(this).parents("tr").find("td")[0].innerHTML;
         $(location).attr('href','http://neuroboxing.cl/wp-admin/admin.php?page=evaluacion_paciente&ver_eval='+id);
    });
    */
    //boton cancelar de pagina nueva evaluacion
    $(".retorno-datos").click(function(){
        var id=$("#idpaciente").val();
        $(location).attr('href','http://neuroboxing.cl/wp-admin/admin.php?page=datos_paciente&id='+id);
    });
    
    //////////////////////////////////////////////////
    
    
   //CALCULO DE puntajes DE EVALUACIONES
  //BERG
  var transferenciaSedante  = $("input[name=transferenciaSedante]");
  var tandem                = $("input[name=tandem]");
  var alcanceFuncional      = $("input[name=alcanceFuncional]");
  var step                  = $("input[name=step]");
  
  transferenciaSedante.click(function(){
      
      if($(this).is(':checked') && tandem.is(':checked') && alcanceFuncional.is(':checked') && step.is(':checked')) { 
           calculo_BERG();
        }
   });
   
   tandem.click(function(){
      if($(this).is(':checked') && transferenciaSedante.is(':checked') && alcanceFuncional.is(':checked') && step.is(':checked')) {  
          calculo_BERG();
        }  
   });
   alcanceFuncional.click(function(){
      if($(this).is(':checked') && transferenciaSedante.is(':checked') && tandem.is(':checked') && step.is(':checked')) {  
           calculo_BERG();
        }  
   });
   step.click(function(){
      if($(this).is(':checked') && transferenciaSedante.is(':checked') && tandem.is(':checked') && alcanceFuncional.is(':checked')) {  
          calculo_BERG();
        }
   });
    
    function calculo_BERG(){
        var puntaje_transferenciaSedante    = $('input:radio[name=transferenciaSedante]:checked').val() ;
        var puntaje_tandem                  = $('input:radio[name=tandem]:checked').val()             ;
        var puntaje_alcanceFuncional        = $('input:radio[name=alcanceFuncional]:checked').val()      ;
        var puntaje_step                    = $('input:radio[name=step]:checked').val()                 ;
        var puntajeBERG = ((parseInt(puntaje_transferenciaSedante)*3.5)+(parseInt(puntaje_tandem)*3.5)+(parseInt(puntaje_alcanceFuncional)*3.5)+(parseInt(puntaje_step)*3.5));
        console.log("trans="+puntaje_transferenciaSedante);
        console.log("tandem="+puntaje_tandem);
        console.log("alcfun="+puntaje_alcanceFuncional);
        console.log("step="+puntaje_step);
         console.log("total="+puntajeBERG);
         $("#puntajeBerg").text(puntajeBERG)
    }
    
    
    //CALCULO TEST DE INTEGRACION SENSORIAL
    
    var condicion1 = $("#condicion1");
    var condicion2 = $("#condicion2");
    var condicion3 = $("#condicion3");
    var condicion4 = $("#condicion4");
    
    condicion1.click(function(){
        if((condicion1.val() != "") && (condicion2.val() != "") && (condicion3.val() != "") && (condicion4.val() != "")){
            calculo_integracionSensorial();
        }
    });
    condicion2.click(function(){
        if((condicion1.val() != "") && (condicion2.val() != "") && (condicion3.val() != "") && (condicion4.val() != "")){
            calculo_integracionSensorial();
        }
    });
    condicion3.click(function(){
        if((condicion1.val() != "") && (condicion2.val() != "") && (condicion3.val() != "") && (condicion4.val() != "")){
            calculo_integracionSensorial();
        }
    });
    condicion4.click(function(){
        if((condicion1.val() != "") && (condicion2.val() != "") && (condicion3.val() != "") && (condicion4.val() != "")){
             calculo_integracionSensorial();
        }
    });
    function calculo_integracionSensorial(){
        var puntaje;
        var con1 = condicion1;
        var cond1 = parseInt(condicion1.val());
        var cond2 = parseInt(condicion2.val());
        var cond3 = parseInt(condicion3.val());
        var cond4 = parseInt(condicion4.val());
        puntaje= parseInt(condicion1.val()) + parseInt(condicion2.val()) + parseInt(condicion3.val()) +parseInt(condicion4.val());
        $("#puntajeIntegracionSensorial").text(puntaje);
       
    }
    
    
    //CALCULO MINIBEST
    var minibest3  = $("input[name=minibest_item3]");
    var minibest4  = $("input[name=minibest_item4]");
    var minibest5  = $("input[name=minibest_item5]");
    var minibest6  = $("input[name=minibest_item6]");
    var minibest9  = $("input[name=minibest_item9]");
    var minibest10  = $("input[name=minibest_item10]");
    var minibest11  = $("input[name=minibest_item11]");
    var minibest12  = $("input[name=minibest_item12]");
    var minibest13  = $("input[name=minibest_item13]");
    var minibest14  = $("input[name=minibest_item14]");
    var mini = $("[name*=minibest_item]");
    
   
   mini.click(function(){
      if(minibest3.is(':checked') && minibest4.is(':checked')&& minibest5.is(':checked') && minibest6.is(':checked') && minibest9.is(':checked')&& minibest10.is(':checked')&& minibest11.is(':checked')&& minibest12.is(':checked') && minibest13.is(':checked') && minibest14.is(':checked')) { 
          calculo_minibert();
        } 
   });
    
    function calculo_minibert(){
        var puntaje_minibest3     = parseInt($('input:radio[name=minibest_item3]:checked').val())  * 1.4;
        var puntaje_minibest4     = parseInt($('input:radio[name=minibest_item4]:checked').val())  * 1.4;
        var puntaje_minibest5     = parseInt($('input:radio[name=minibest_item5]:checked').val())  * 1.4;
        var puntaje_minibest6     = parseInt($('input:radio[name=minibest_item6]:checked').val())  * 1.4;
        var puntaje_minibest9     = parseInt($('input:radio[name=minibest_item9]:checked').val())  * 1.4;
        var puntaje_minibest10    = parseInt($('input:radio[name=minibest_item10]:checked').val()) * 1.4;
        var puntaje_minibest11    = parseInt($('input:radio[name=minibest_item11]:checked').val()) * 1.4;
        var puntaje_minibest12    = parseInt($('input:radio[name=minibest_item12]:checked').val()) * 1.4;
        var puntaje_minibest13    = parseInt($('input:radio[name=minibest_item13]:checked').val()) * 1.4;
        var puntaje_minibest14    = parseInt($('input:radio[name=minibest_item14]:checked').val()) * 1.4;
        var puntaje = (puntaje_minibest3+puntaje_minibest4+puntaje_minibest5+puntaje_minibest6+puntaje_minibest9+puntaje_minibest10+puntaje_minibest11+puntaje_minibest12+puntaje_minibest13+puntaje_minibest14);
       //console.log(puntaje);
        $("#puntajeMINIBEST").text(puntaje.toFixed(3));
    }
    
    //PUNTAJE FGA
    var fga4    = $('input:radio[name=FGA_item4]');
    var fga7    = $('input:radio[name=FGA_item7]');
    var fga8    = $('input:radio[name=FGA_item8]');
    var fga9    = $('input:radio[name=FGA_item9]');
    var fga10   = $('input:radio[name=FGA_item10]');
    var fga = $("[name*=FGA_item]");
    
    fga.click(function(){
        if(fga4.is(':checked') && fga7.is(':checked') && fga8.is(':checked') && fga9.is(':checked') && fga10.is(':checked') ){
            calculo_fga();
        }
    });
    
    function calculo_fga(){
        var puntaje_fga4 = parseInt($('input:radio[name=FGA_item4]:checked').val()) * 2 ;
        var puntaje_fga7 = parseInt($('input:radio[name=FGA_item7]:checked').val()) * 2;
        var puntaje_fga8 = parseInt($('input:radio[name=FGA_item8]:checked').val()) * 2;
        var puntaje_fga9 = parseInt($('input:radio[name=FGA_item9]:checked').val()) * 2;
        var puntaje_fga10 = parseInt($('input:radio[name=FGA_item10]:checked').val()) *2;
        var total = (puntaje_fga4+puntaje_fga7+puntaje_fga8+puntaje_fga9+puntaje_fga10);
        $("#puntajeFGA").text(total);
    }
    
   
    //select para regiones y comunas
    var RegionesYcomunas = {

	"regiones": [{
			"NombreRegion": "Arica y Parinacota",
			"comunas": ["Arica", "Camarones", "Putre", "General Lagos"]
	},
		{
			"NombreRegion": "Tarapacá",
			"comunas": ["Iquique", "Alto Hospicio", "Pozo Almonte", "Camiña", "Colchane", "Huara", "Pica"]
	},
		{
			"NombreRegion": "Antofagasta",
			"comunas": ["Antofagasta", "Mejillones", "Sierra Gorda", "Taltal", "Calama", "Ollagüe", "San Pedro de Atacama", "Tocopilla", "María Elena"]
	},
		{
			"NombreRegion": "Atacama",
			"comunas": ["Copiapó", "Caldera", "Tierra Amarilla", "Chañaral", "Diego de Almagro", "Vallenar", "Alto del Carmen", "Freirina", "Huasco"]
	},
		{
			"NombreRegion": "Coquimbo",
			"comunas": ["La Serena", "Coquimbo", "Andacollo", "La Higuera", "Paiguano", "Vicuña", "Illapel", "Canela", "Los Vilos", "Salamanca", "Ovalle", "Combarbalá", "Monte Patria", "Punitaqui", "Río Hurtado"]
	},
		{
			"NombreRegion": "Valparaíso",
			"comunas": ["Valparaíso", "Casablanca", "Concón", "Juan Fernández", "Puchuncaví", "Quintero", "Viña del Mar", "Isla de Pascua", "Los Andes", "Calle Larga", "Rinconada", "San Esteban", "La Ligua", "Cabildo", "Papudo", "Petorca", "Zapallar", "Quillota", "Calera", "Hijuelas", "La Cruz", "Nogales", "San Antonio", "Algarrobo", "Cartagena", "El Quisco", "El Tabo", "Santo Domingo", "San Felipe", "Catemu", "Llaillay", "Panquehue", "Putaendo", "Santa María", "Quilpué", "Limache", "Olmué", "Villa Alemana"]
	},
		{
			"NombreRegion": "Región del Libertador Gral. Bernardo O’Higgins",
			"comunas": ["Rancagua", "Codegua", "Coinco", "Coltauco", "Doñihue", "Graneros", "Las Cabras", "Machalí", "Malloa", "Mostazal", "Olivar", "Peumo", "Pichidegua", "Quinta de Tilcoco", "Rengo", "Requínoa", "San Vicente", "Pichilemu", "La Estrella", "Litueche", "Marchihue", "Navidad", "Paredones", "San Fernando", "Chépica", "Chimbarongo", "Lolol", "Nancagua", "Palmilla", "Peralillo", "Placilla", "Pumanque", "Santa Cruz"]
	},
		{
			"NombreRegion": "Región del Maule",
			"comunas": ["Talca", "ConsVtución", "Curepto", "Empedrado", "Maule", "Pelarco", "Pencahue", "Río Claro", "San Clemente", "San Rafael", "Cauquenes", "Chanco", "Pelluhue", "Curicó", "Hualañé", "Licantén", "Molina", "Rauco", "Romeral", "Sagrada Familia", "Teno", "Vichuquén", "Linares", "Colbún", "Longaví", "Parral", "ReVro", "San Javier", "Villa Alegre", "Yerbas Buenas"]
	},
		{
			"NombreRegion": "Región del Biobío",
			"comunas": ["Concepción", "Coronel", "Chiguayante", "Florida", "Hualqui", "Lota", "Penco", "San Pedro de la Paz", "Santa Juana", "Talcahuano", "Tomé", "Hualpén", "Lebu", "Arauco", "Cañete", "Contulmo", "Curanilahue", "Los Álamos", "Tirúa", "Los Ángeles", "Antuco", "Cabrero", "Laja", "Mulchén", "Nacimiento", "Negrete", "Quilaco", "Quilleco", "San Rosendo", "Santa Bárbara", "Tucapel", "Yumbel", "Alto Biobío", "Chillán", "Bulnes", "Cobquecura", "Coelemu", "Coihueco", "Chillán Viejo", "El Carmen", "Ninhue", "Ñiquén", "Pemuco", "Pinto", "Portezuelo", "Quillón", "Quirihue", "Ránquil", "San Carlos", "San Fabián", "San Ignacio", "San Nicolás", "Treguaco", "Yungay"]
	},
		{
			"NombreRegion": "Región de la Araucanía",
			"comunas": ["Temuco", "Carahue", "Cunco", "Curarrehue", "Freire", "Galvarino", "Gorbea", "Lautaro", "Loncoche", "Melipeuco", "Nueva Imperial", "Padre las Casas", "Perquenco", "Pitrufquén", "Pucón", "Saavedra", "Teodoro Schmidt", "Toltén", "Vilcún", "Villarrica", "Cholchol", "Angol", "Collipulli", "Curacautín", "Ercilla", "Lonquimay", "Los Sauces", "Lumaco", "Purén", "Renaico", "Traiguén", "Victoria", ]
	},
		{
			"NombreRegion": "Región de Los Ríos",
			"comunas": ["Valdivia", "Corral", "Lanco", "Los Lagos", "Máfil", "Mariquina", "Paillaco", "Panguipulli", "La Unión", "Futrono", "Lago Ranco", "Río Bueno"]
	},
		{
			"NombreRegion": "Región de Los Lagos",
			"comunas": ["Puerto Montt", "Calbuco", "Cochamó", "Fresia", "FruVllar", "Los Muermos", "Llanquihue", "Maullín", "Puerto Varas", "Castro", "Ancud", "Chonchi", "Curaco de Vélez", "Dalcahue", "Puqueldón", "Queilén", "Quellón", "Quemchi", "Quinchao", "Osorno", "Puerto Octay", "Purranque", "Puyehue", "Río Negro", "San Juan de la Costa", "San Pablo", "Chaitén", "Futaleufú", "Hualaihué", "Palena"]
	},
		{
			"NombreRegion": "Región Aisén del Gral. Carlos Ibáñez del Campo",
			"comunas": ["Coihaique", "Lago Verde", "Aisén", "Cisnes", "Guaitecas", "Cochrane", "O’Higgins", "Tortel", "Chile Chico", "Río Ibáñez"]
	},
		{
			"NombreRegion": "Región de Magallanes y de la AntárVca Chilena",
			"comunas": ["Punta Arenas", "Laguna Blanca", "Río Verde", "San Gregorio", "Cabo de Hornos (Ex Navarino)", "AntárVca", "Porvenir", "Primavera", "Timaukel", "Natales", "Torres del Paine"]
	},
		{
			"NombreRegion": "Región Metropolitana de Santiago",
			"comunas": ["Cerrillos", "Cerro Navia", "Conchalí", "El Bosque", "Estación Central", "Huechuraba", "Independencia", "La Cisterna", "La Florida", "La Granja", "La Pintana", "La Reina", "Las Condes", "Lo Barnechea", "Lo Espejo", "Lo Prado", "Macul", "Maipú", "Ñuñoa", "Pedro Aguirre Cerda", "Peñalolén", "Providencia", "Pudahuel", "Quilicura", "Quinta Normal", "Recoleta", "Renca", "San Joaquín", "San Miguel", "San Ramón", "Vitacura", "Puente Alto", "Pirque", "San José de Maipo", "Colina", "Lampa", "TilVl", "San Bernardo", "Buin", "Calera de Tango", "Paine", "Melipilla", "Alhué", "Curacaví", "María Pinto", "San Pedro", "Talagante", "El Monte", "Isla de Maipo", "Padre Hurtado", "Peñaflor"]
	}]
}
    
    
	var iRegion = 0;
	var htmlRegion = '<option value="sin-region">Seleccione región</option><option value="sin-region">--</option>';
	var htmlComunas = '<option value="sin-comuna">Seleccione comuna</option><option value="sin-region">--</option>';

	jQuery.each(RegionesYcomunas.regiones, function () {
		htmlRegion = htmlRegion + '<option value="' + RegionesYcomunas.regiones[iRegion].NombreRegion + '">' + RegionesYcomunas.regiones[iRegion].NombreRegion + '</option>';
		iRegion++;
	});

	jQuery('#regiones').html(htmlRegion);
	jQuery('#comunas').html(htmlComunas);

	jQuery('#regiones').change(function () {
		var iRegiones = 0;
		var valorRegion = jQuery(this).val();
		var htmlComuna = '<option value="sin-comuna">Seleccione comuna</option><option value="sin-comuna">--</option>';
		jQuery.each(RegionesYcomunas.regiones, function () {
			if (RegionesYcomunas.regiones[iRegiones].NombreRegion == valorRegion) {
				var iComunas = 0;
				jQuery.each(RegionesYcomunas.regiones[iRegiones].comunas, function () {
					htmlComuna = htmlComuna + '<option value="' + RegionesYcomunas.regiones[iRegiones].comunas[iComunas] + '">' + RegionesYcomunas.regiones[iRegiones].comunas[iComunas] + '</option>';
					iComunas++;
				});
			}
			iRegiones++;
		});
		jQuery('#comunas').html(htmlComuna);
	});
	jQuery('#comunas').change(function () {
		if (jQuery(this).val() == 'sin-region') {
			alert('selecciones Región');
		} else if (jQuery(this).val() == 'sin-comuna') {
			alert('selecciones Comuna');
		}
	});
	jQuery('#regiones').change(function () {
		if (jQuery(this).val() == 'sin-region') {
			alert('selecciones Región');
		}
	});
    
    
	
});


   