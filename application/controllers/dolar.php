<?php

class Dolar extends CI_Controller {
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
	
	function consultar(){
		if($this->session->userdata('is_logged_in')){
			$crud = new grocery_CRUD();
			$crud->set_table('dolar_hoy');
			//->
 			$crud->set_theme('datatables');
			$crud->set_language('spanish');
			$crud->set_subject('Dolar Hoy');
			// Display As
			##
			//-> Columnas
			$crud->columns('cambio','fecha','registrado_por','registrado_fecha','registrado_hora');
			// Relaciones
			##
			// Validacion
			$crud->field_type('cambio','integer');
			$crud->required_fields('cambio','id_clasificacion','precio');
			//-> Renderizar
			$output = $crud->render();
			$data['titulo']="DOLAR HOY";
			$this->load->view('include/head',$output);
			$this->load->view('include/header',$data);
			$this->load->view('admin/output');
			$this->load->view('admin/librerias');	
			$this->load->view('include/footer',$data);
        } else {
        	$this->load->view('admin/login');	
        }	
	}
	
	function historial(){
		if($this->session->userdata('is_logged_in')){
			$crud = new grocery_CRUD();
			//-> Identifico el ID del Cliente
			$crud->set_table('dolar_hoy');
			//->
 			$crud->set_theme('datatables');
			$crud->set_language('spanish');
			// Display As
			$crud->unset_add();
			//-> Columnas
			$crud->columns('cambio','fecha','registrado_por','registrado_fecha','registrado_hora');
			// Relaciones
			##
			//-> Renderizar
			$output = $crud->render();
			$data['titulo']="DOLAR HISTORIAL";
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