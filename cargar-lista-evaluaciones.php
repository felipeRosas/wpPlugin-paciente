<?php
   //require_once plugin_dir_path(__FILE__) . './wp-pacientes-funciones.php';

   function cargarListaEvaluaciones(){
        $functions = new wpPacientesFunciones();
       /* if(isset($_POST['idEvaluacion'])){
            verEvalucion($_POST['idEvaluacion']);
        }
        */
        if(isset($_POST['idpaciente'])){
           
        $respuesta      = "";
        $resultadoHTML  = "";
        $resultadoDatos = "";
        $paciente       = $_POST['idpaciente'];
        $info           =json_decode($functions->listar_evaluaciones($paciente));
        $datos = $info->datos;
        $evaluaciones=$info->evaluaciones;
        
        if($info){
            $respuesta = "ok";
            
            $resultadoHTML .= "<table id='tabla-evaluaciones' class='table table-striped'>";
            $resultadoHTML .="<tr><th>id</th><th>fecha</th><th  COLSPAN='3'>opciones</th></tr>";
            foreach($evaluaciones as $evaluacion){
                $resultadoHTML .= "<tr id='".$evaluacion->id."'><td>".$evaluacion->id."</td>";
                $resultadoHTML .= "<td>".$evaluacion->fecha_evaluacion."</td>";
                $resultadoHTML .= "<td><a class='btneditar btn btn-info btn-sm' data-toggle='modal' data-target='#modalEditar'>Editar</a></td>";
                $resultadoHTML .= "<td><a class='btnEliminar btn btn-danger btn-sm' data-toggle='modal' data-target='#modalEliminar'>Eliminar</a></td>";
                $resultadoHTML .= "<td><a class='btneVer btn btn-info btn-sm verEvaluacion' data-toggle='modal' data-target='' id=''>Ver</a></td>";
                //$resultadoHTML .= "<td><button class='verEvaluacion btn btn-info btn-sm' >Ver</button></td>";
                $resultadoHTML .= "</tr>";
                }
            
            $resultadoHTML .= "</table>";
            
            //html datos paciente
            
            $datosPaciente .= "<tr>";	
			$datosPaciente .= "<th>Rut</th>";
			$datosPaciente .= "<th id='datosRut'>".$datos->rut."</th>";
			$datosPaciente .= "</tr>";
			$datosPaciente .= "<tr>";	
			$datosPaciente .= "<th>Edad</th>";
			$datosPaciente .= "<th id='datosEdad'>".$datos->edad."</th>";
            $datosPaciente .= "</tr>";
            $datosPaciente .= "<tr>	";
            $datosPaciente .= "<th>Comuna</th>";
            $datosPaciente .= "<th id='datosComuna'>".$datos->comuna."</th>";
            $datosPaciente .= "</tr>";
            $datosPaciente .= "<tr>	";
            $datosPaciente .= "<th>Sexo</th>";
            $datosPaciente .= "<th id='datosSexo'>".$datos->sexo."</th>";
            $datosPaciente .= "</tr>";
            
            echo json_encode(array("respuesta" => $respuesta, "resultadohtml" => $resultadoHTML, 'datosHTML'=>$datosPaciente));
        }else{
            $resultadoHTML .= "<table id='tabla-evaluaciones' class='table table-striped'>";
            $resultadoHTML .="<tr><th>id</th><th>fecha</th><th>opciones</th></tr>";
            
            $resultadoHTML .="<tr id=''><td></td><td></td><td>opcion</td></tr>";
            
            
            $resultadoHTML .= "</table>";
            echo json_encode(array("respuesta" => $respuesta, "resultadohtml" => $resultadoHTML));
        }
        
        
        die();
        }
       
   }
   
   
   function verEvaluacion(){
       $functions = new wpPacientesFunciones();
       
            
            $evaluacion = $functions->obtener_evaluacion($_POST['idEvaluacion']);
            $respuesta="ok";
            echo json_encode(array("respuesta" => $respuesta, "resultadohtml" => $evaluacion));
            die();
   }
   
   function eliminarEvaluacion(){
       $id=$_POST['idevaluacion'];
       $idPaciente=$_POST['idpaciente'];
        $functions = new wpPacientesFunciones();
        $functions->eliminar_evaluacion($id);
        
        $info =json_decode($functions->obtener_evaluaciones($idPaciente));//para listar despues de eliminar
        $evaluaciones=$info->evaluaciones;
        $resultadoHTML="";
        $resultadoHTML .= "<table id='tabla-evaluaciones' class='table table-striped'>";
            $resultadoHTML .="<tr><th>id</th><th>fecha</th><th  COLSPAN='3'>opciones</th></tr>";
            foreach($evaluaciones as $evaluacion){
                $resultadoHTML .= "<tr id='".$evaluacion->id."'><td>".$evaluacion->id."</td>";
                $resultadoHTML .= "<td>".$evaluacion->fecha_evaluacion."</td>";
                $resultadoHTML .= "<td><button class='btnEditar btn btn-info btn-sm' data-toggle='modal' data-target='#modalEditar'>Editar</button></td>";
                $resultadoHTML .= "<td><button class='btnEliminar btn btn-danger btn-sm' data-toggle='modal' data-target='#modalEliminar'>Eliminar</button></td>";
                $resultadoHTML .= "<td><button class='btneVer btn btn-info btn-sm verEvaluacion' data-toggle='modal' data-target='' id=''>Ver</button></td>";
                //$resultadoHTML .= "<td><button class='verEvaluacion btn btn-info btn-sm' >Ver</button></td>";
                $resultadoHTML .= "</tr>";
                }
            
            $resultadoHTML .= "</table>";
        
        $respuesta="ok";
        echo json_encode(array("respuesta" => $respuesta, "resultadohtml" => $resultadoHTML));
        die();
   }
   
   //metodos para pacientes
   
    function eliminarPaciente(){
        $id=$_POST['idpaciente'];
        $functions = new wpPacientesFunciones();
        return $functions->eliminar_paciente($id);
        
        die();
   }
  

    add_action( 'wp_ajax_verEvaluacion'                     , 'verEvaluacion',10,1);
    add_action( 'wp_ajax_nopriv_verEvaluacion'              , 'verEvaluacion',10 );
    add_action( 'wp_ajax_eliminarEvaluacion'                     , 'eliminarEvaluacion');
    add_action( 'wp_ajax_nopriv_eliminarEvaluacion'              , 'eliminarEvaluacion');
    add_action( 'wp_ajax_cargarListaEvaluaciones'           , 'cargarListaEvaluaciones' );
    add_action( 'wp_ajax_nopriv_cargarListaEvaluaciones'    , 'cargarListaEvaluaciones' );
    
   
   add_action( 'wp_ajax_eliminarPaciente'                     , 'eliminarPaciente');
    add_action( 'wp_ajax_nopriv_eliminarPaciente'              , 'eliminarPaciente');
?>