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
         
         add_submenu_page('pacientes_plugin','Agregar Paciente', 'Agregar Paciente', 'manage_options','agregar_paciente',array($this, 'submenu_nuevo_paciente') );
    }
    
    public function admin_index(){
        //template
        require_once plugin_dir_path(__FILE__) . 'templates/admin.php';
    }
    
    public function submenu_nuevo_paciente(){
        require_once plugin_dir_path(__FILE__) . 'templates/nuevo_paciente.php';
    }
    

    function agregarArchivos(){
        add_action('admin_enqueue_scripts', array($this, 'enqueue'));
    }
    
    public static function enqueue(){
        
        wp_enqueue_style('estilos', plugins_url('./css/bootstrap/bootstrap.min.css' , __FILE__));
        wp_enqueue_script('script', plugins_url('./js/bootstrap/bootstrap.min.js'   , __FILE__));
        wp_enqueue_script('validacionesFormularioPaciente', plugins_url('./js/validacionesFormularioPaciente.js'     , __FILE__));
        
        
        //wp_register_script('scripts', plugins_url('./js/scripts.js'     , __FILE__));        
        //wp_enqueue_script('scripts');
        //wp_localize_script ('scripts', 'ajax_object',array ('ajax_url' => plugins_url('./cargar-lista-evaluaciones.php'     , __FILE__)));
        //wp_localize_script ('scripts', 'ajax_object',array ('ajax_url' => plugins_url('./templates/admin.php'     , __FILE__)));
         
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
register_activation_hook(__file__, array($wppacientes, 'activacion'));

//desactivacion
register_activation_hook(__file__, array($wppacientes, 'desactivacion'));







