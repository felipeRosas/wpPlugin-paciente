<?php
 require_once plugin_dir_path(__FILE__) . '../wp-pacientes-funciones.php';
 $functions = new wpPacientesFunciones();
    if(isset($_GET['edit'])){
        //requiere vista editar
         require_once plugin_dir_path(__FILE__) . 'paciente_editar.php';
    }else{
          require_once plugin_dir_path(__FILE__) . 'paciente_nuevo.php';
    }
    
   
?>