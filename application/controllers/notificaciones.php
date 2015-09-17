<?php

class Notificaciones extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->pagina = '';
		$timezone = @date_default_timezone_get();
        if (!isset($timezone) || $timezone == '') {
            $timezone = @ini_get('date.timezone');
        }
        if (!isset($timezone) || $timezone == '') {
            $timezone = 'UTC';
        }
       date_default_timezone_set($timezone); 
		$this->load->database();
		$this->load->helper('url');
		$this->load->library('grocery_CRUD');
	}
	
	function index(){
		if($this->session->userdata('is_logged_in')){
			$crud = new grocery_CRUD();
			//-> Identifico el ID del Cliente
			$crud->set_table('notificaciones');
			//->
 			$crud->set_theme('datatables');
			$crud->set_language('spanish');
			// Display As
			$crud->unset_add();
			$crud->unset_export();
			$crud->unset_print();
			//-> Columnas
			$crud->columns('titulo','contenido','fecha');
			// Relaciones
			##
			//-> Renderizar
			$output = $crud->render();
			$data['titulo']="NOTIFICACIONES";
			$this->load->view('include/head',$output);
			$this->load->view('include/header',$data);
			$this->load->view('admin/output');
			$this->load->view('admin/librerias');	
			$this->load->view('include/footer',$data);
        } else {
        	$this->load->view('admin/login');	
        }	
	}
}