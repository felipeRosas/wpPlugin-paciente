<?php
/*

$info = $_POST;

//print_r($info);

class wpPacientesInfo {
    
    public $nombre;
    public $apellidos;
    public $sexo;
    public $rut;
    public $correo;
    public $fechaNacimiento;
    public $comuna;
    
    public function __constructor($info){
        $this->nombre          =$info["nombre"];
        $this->apellidos       =$info["apellidos"];
        $this->sexo            =$info["genero"];
        $this->rut             =$info["rut"];
        $this->correo          =$info["correo"];
        $this->fechaNacimiento =$info["fechaDeNacimiento"];
        $this->comuna          =$info["comuna"];
        
        
    }
    
    function guardar_paciente(){
        
        global $wpdb;
        $userdata = array(
            'user_login'    => $this->nombre,
            'user_pass'     => 'contrase«Ğa',
            'user_email'    => $this->correo,
            'user_nicename' => $this->nombre . $this->apellido,
            
        );
        
        $user_id = wp_insert_user( $userdata ) ;
        $user =new WP_USER($user_id);
        
        $user->add_role( 'paciente');
        //var_dump($v);
        //On success
        if ( ! is_wp_error( $user_id ) ) {
            echo "User created : ". $user_id;
        }
       //$wpdb->insert('wp_users',$userdata);
        
    }
    
    
}

$info = new wpPacientesInfo($info);
$info->guardar_paciente();
