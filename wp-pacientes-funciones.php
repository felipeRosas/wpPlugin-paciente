<?php


class wpPacientesFunciones{

    //obtiene la lista de los pacientes del usuario actual
    function obtener_lista_pacientes(){
        global $wpdb;
        $query ="SELECT wp_users.id,wp_users.user_login, wp_users.user_email from wp_users  where wp_users.user_super iS NOT NULL";
        $results = $wpdb->get_results( $query, OBJECT );
        return $results;
    }

    public function guardar_paciente($info){
        
        $usuarioActual  = get_current_user_id();//usuario supervisor
        $password    = wp_generate_password();
        
        echo "\ncontraseña".$password."\n";
        
        /*
        echo "--nombre:".$info['nombre'];
        echo "--apellidos:".$info['apellidos'];
        echo "--rut:".$info['rut'];
        echo "--sexo".$info['sexo'];
        echo "--fecha nacimiento:".$info['fechaDeNacimiento'];
        echo "--comuna:".$info['comuna'];
        */
        
        $userdata = array(
            'user_login'    => $info['nombre'] . $info['apellidos'],
            'user_pass'     => $password,
            'user_email'    => $info['correo'],
            'user_nicename' => $info['nombre'] . $info['apellidos'],
           // 'user_super'    => $usuarioActual
            
        );
       
       
        global $wpdb;
       
        $nuevoPacienteId = wp_insert_user($userdata);
        wp_update_user( array ('ID' => $nuevoPacienteId, 'role' => 'paciente') ) ;
        echo "id nuevo".$nuevoPacienteId;
       //agregar usuario supervisor
       $wpdb->update('wp_users',array('user_super' => get_current_user_id() ), array('ID' => $nuevoPacienteId));
       
       //almacenar datos extra en wp_usermeta
       update_user_meta($nuevoPacienteId, 'first_name'          , $info['nombre']);
       update_user_meta($nuevoPacienteId, 'last_name'           , $info['apellidos']);
       add_user_meta($nuevoPacienteId, 'rut'                    , $info['rut']);
       add_user_meta($nuevoPacienteId, 'fechaDeNacimiento'      , $info['fechaDeNacimiento']); 
       add_user_meta($nuevoPacienteId, 'sexo'                   , $info['sexo']);
       add_user_meta($nuevoPacienteId, 'comuna'                 , $info['comuna']);
            
        
    }
    
    
    
    
    
    public function guardar_evaluacion($evaluacion){
        print_r($evaluacion);
        $idUsuarioSupervisor = get_current_user_id();
        $fecha = $evaluacion['fechaDeEvaluacion'];
        
        global $wpdb;
        $wpdb->insert('wp_evaluacion_nbp',
            array(
                'id_user'                   => $evaluacion['idpaciente'],
                'fecha_evaluacion'          => $fecha,
                'uso_de_ayudas_tecnicas'    => $evaluacion['usoDeAyudasTecnicas'],
                'transferencia_sedante'     => isset($evaluacion['transferenciaSedante']) ? $evaluacion['transferenciaSedante'] : null,
                'tandem'                    => isset($evaluacion['tandem']) ? $evaluacion['tandem'] : null,
                'alcance_funcional'         => isset($evaluacion['alcanceFuncional']) ? $evaluacion['alcanceFuncional'] : null,
                'step'                      => isset($evaluacion['step']) ? $evaluacion['step'] : null,
                'condicion_1'               => isset($evaluacion['condicion_1']) ? $evaluacion['condicion_1'] : null,
                'condicion_2'               => isset($evaluacion['condicion_2']) ? $evaluacion['condicion_2'] : null,
                'condicion_3'               => isset($evaluacion['condicion_3']) ? $evaluacion['condicion_3'] : null,
                'condicion_4'               => isset($evaluacion['condicion_4']) ? $evaluacion['condicion_4'] : null,
                'minibest_item3'            => isset($evaluacion['minibest_item3']) ? $evaluacion['minibest_item3'] : null,
                'minibest_item4'            => isset($evaluacion['minibest_item4']) ? $evaluacion['minibest_item4'] : null,
                'minibest_item5'            => isset($evaluacion['minibest_item5']) ? $evaluacion['minibest_item5'] : null,
                'minibest_item6'            => isset($evaluacion['minibest_item6']) ? $evaluacion['minibest_item6'] : null,
                'minibest_item9'            => isset($evaluacion['minibest_item9']) ? $evaluacion['minibest_item9'] : null,
                'minibest_item10'           => isset($evaluacion['minibest_item10']) ? $evaluacion['minibest_item10'] : null,
                'minibest_item11'           => isset($evaluacion['minibest_item11']) ? $evaluacion['minibest_item11'] : null,
                'minibest_item12'           => isset($evaluacion['minibest_item12']) ? $evaluacion['minibest_item12'] : null,
                'minibest_item13'           => isset($evaluacion['minibest_item13']) ? $evaluacion['minibest_item13'] : null,
                'minibest_item14'           => isset($evaluacion['minibest_item14']) ? $evaluacion['minibest_item14'] : null,
                'fga_item4'                 => isset($evaluacion['FGA_item4']) ? $evaluacion['FGA_item4'] : null,    
                'fga_item7'                 => isset($evaluacion['FGA_item7']) ? $evaluacion['FGA_item7'] : null,
                'fga_item8'                 => isset($evaluacion['FGA_item8']) ? $evaluacion['FGA_item8'] : null,
                'fga_item9'                 => isset($evaluacion['FGA_item9']) ? $evaluacion['FGA_item9'] : null,
                'fga_item10'                => isset($evaluacion['FGA_item10']) ? $evaluacion['FGA_item10'] : null,
                'id_user_supervisor'        => $idUsuarioSupervisor
                )
        );
        
    }
    
    public function obtener_info_paciente($id){
        $nombre         = get_user_data($id, 'first_name');
        $apellidos      = get_user_data($id, 'last_name');
        $rut            = get_user_data($id, 'rut');
        $edad           = get_user_data($id, 'fechaDeNacimiento');
        $comuna         = get_user_data($id, 'comuna');
        $sexo           = get_user_data($id, 'sexo');
        
        $info = array(
                'nombre'    => $nombre,
                'apellidos' => $apellidos,
                'rut'       => $rut,
                'edad'      => $edad,
                'comuna'    => $comuna,
                'sexo'      => $sexo
            );
        
        return $info;
    }
    //funciones para las llamadas AJAX
    function listarEvaluaciones($id){
        global $wpdb;
        $query ="SELECT ev.id, ev.fecha_evaluacion FROM wp_evaluacion_nbp as ev where ev.id_user=".$id;
        $results = json_encode($wpdb->get_results( $query, OBJECT ));
        
        return $results;
    }
    
    
}

if( class_exists('wpPacientes')&&class_exists('wpPacientesFunciones') ){

$class = new wpPacientesFunciones();



}

