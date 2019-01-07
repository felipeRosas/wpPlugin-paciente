<?php
    $functions = new wpPacientesFunciones();

    
    //nueva evaluacion
    if(isset($_GET['id'])){
        $id=$_GET['id'];
        require_once plugin_dir_path(__FILE__) . 'evaluacion_nueva.php';
    }
    
    //para la opcion de editar
    if(isset($_GET['id_eval'])){
        $idEvaluacion=$_GET['id_eval'];
        //echo "editar".$idEvaluacion;
        require_once plugin_dir_path(__FILE__) . 'evaluacion_editar.php';
    }
    
    //para la opcion de Ver
    if(isset($_GET['ver_eval'])){
        $idEvaluacion=$_GET['ver_eval'];
        //echo "editar".$idEvaluacion;
        require_once plugin_dir_path(__FILE__) . 'evaluacion_ver.php';
    }
 
 
?>
