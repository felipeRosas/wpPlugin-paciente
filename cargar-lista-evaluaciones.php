<?php
   
   function cargarListaEvaluaciones(){
        require_once plugin_dir_path(__FILE__) . './wp-pacientes-funciones.php';
        $functions = new wpPacientesFunciones();
        
        if(isset($_POST['idpaciente'])){
           
        $respuesta      = "";
        $resultadoHTML  = "";
        $paciente       = $_POST['idpaciente'];
        $lista          = $functions->listarEvaluaciones($paciente);
        $lista          = json_decode($lista);
        
        
        
        
        if($lista){
            $respuesta = "ok";
            
            $resultadoHTML .= "<table id='tabla-evaluaciones' class='table table-striped'>";
            $resultadoHTML .="<tr><th>id</th><th>fecha</th><th  COLSPAN='3'>opciones</th></tr>";
            foreach($lista as $evaluacion){
                $resultadoHTML .= "<tr id='".$evaluacion->id."'><td>".$evaluacion->id."</td>";
                $resultadoHTML .= "<td>".$evaluacion->fecha_evaluacion."</td>";
                $resultadoHTML .= "<td><a class='btneditar btn btn-info btn-sm' data-toggle='modal' data-target='#modalEditar'>Editar</a></td>";
                $resultadoHTML .= "<td><a class='btneliminar btn btn-danger btn-sm' data-toggle='modal' data-target='#modalEliminar'>Eliminar</a></td>";
                $resultadoHTML .= "<td><a class='btneVer btn btn-info btn-sm' data-toggle='modal' data-target=''>Ver</a></td>";
                
                $resultadoHTML .= "</tr>";
                }
            
            $resultadoHTML .= "</table>";
            
            echo json_encode(array("respuesta" => $respuesta, "resultadohtml" => $resultadoHTML));
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

    
    add_action( 'wp_ajax_cargarListaEvaluaciones', 'cargarListaEvaluaciones' );
     
    // If you wanted to also use the function for non-logged in users (in a theme for example)
    add_action( 'wp_ajax_nopriv_cargarListaEvaluaciones', 'cargarListaEvaluaciones' );
?>