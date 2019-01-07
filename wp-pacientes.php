<?php

/**
 *@package WPPacientesPlugin
 **/

/**

* Plugin Name: WP Pacientes

* Plugin URI:

* Description: 

* Author: 

* Author URI: 

* Version: 1.0

* License: GPLV2

**/



class wpPacientes{
    
    function iniciar() {
        add_action('admin_menu', array($this, 'agregar_menu_administrador'));
        
        add_action('admin_enqueue_scripts', array($this, 'enqueue'));
        
    }
    
  
    
    public function agregar_menu_administrador(){
         add_menu_page('Pacientes', 'Pacientes', 'manage_options', 'pacientes_plugin', array($this, 'admin_index'), 'dashicons-heart',11);
         
         add_submenu_page('pacientes_plugin','Agregar Paciente', 'Agregar Paciente', 'manage_options','_paciente',array($this, 'submenu_nuevo_paciente') );
         add_submenu_page('pacientes_plugin','datos Paciente', 'datos Paciente', 'manage_options','datos_paciente',array($this, 'submenu_datos_paciente') );
         add_submenu_page('pacientes_plugin','Evaluacion Paciente', 'Evaluacion Paciente', 'manage_options','evaluacion_paciente',array($this, 'submenu_evaluacion_paciente') );
    }
    
    public function admin_index(){
        //template
        require_once plugin_dir_path(__FILE__) . 'templates/admin.php';
    }
    
    public function submenu_nuevo_paciente(){
        require_once plugin_dir_path(__FILE__) . 'templates/paciente.php';
    }
    
    public function submenu_datos_paciente(){
        require_once plugin_dir_path(__FILE__) . 'templates/datos_paciente.php';
    }
    public function submenu_evaluacion_paciente(){
        require_once plugin_dir_path(__FILE__) . 'templates/evaluacion_paciente.php';
    }

    function agregarArchivos(){
        add_action('admin_enqueue_scripts', array($this, 'enqueue'));
    }
    
    public static function enqueue(){
        
        wp_enqueue_style('estilos', plugins_url('./css/bootstrap/bootstrap.min.css' , __FILE__));
        wp_enqueue_script('script', plugins_url('./js/bootstrap/bootstrap.min.js'   , __FILE__));
        wp_enqueue_script('validacionesFormularioPaciente', plugins_url('./js/validacionesFormularioPaciente.js'     , __FILE__));
        
        wp_enqueue_script('script-evaluaciones', plugins_url('./js/script-evaluaciones.js'   , __FILE__));
        wp_localize_script('script-evaluaciones','url_object',array('ajaxurl_evaluaciones' => admin_url( 'admin-ajax.php' )));
        
         
        wp_enqueue_script('scripts-ajax', plugins_url('./js/scripts.js', __FILE__),array('jquery'));
        wp_localize_script('scripts-ajax','url_object',array('ajaxurl_evaluaciones' => admin_url( 'admin-ajax.php' )));
        
        
        
    }
    
    
    

    
}



if( class_exists('wpPacientes') ){
    $wppacientes = new wpPacientes();
    $wppacientes->iniciar();
}





//activacion
require_once plugin_dir_path(__FILE__) . 'wp-pacientes-funciones.php';
require_once plugin_dir_path(__FILE__) . 'cargar-lista-evaluaciones.php';
//require_once plugin_dir_path(__FILE__) . 'cargar-evaluacion.php';
register_activation_hook(__file__, array($wppacientes, 'activacion'));

//desactivacion
register_activation_hook(__file__, array($wppacientes, 'desactivacion'));







