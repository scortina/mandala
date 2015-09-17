<?php

class Productos extends CI_Controller {
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
			$crud->set_table('productos');
			//->
 			$crud->set_theme('datatables');
			$crud->set_language('spanish');
			$crud->set_subject('Producto');
			// Display As
			$crud->display_as('id_clasificacion','Clasificación');
			$crud->display_as('id_estatus','Estatus');
			//-> Columnas
			$crud->columns('descripcion','id_clasificacion','precio');
			// Relaciones
			$crud->set_relation('id_clasificacion','productos_clasificaciones','descripcion');
			$crud->set_relation('id_estatus','disponible_nodisponible','descripcion');
			// Upload
			##
			// Validacion
			$crud->field_type('precio','integer');
			$crud->required_fields('descripcion','id_clasificacion','precio');
			//-> Renderizar
			$output = $crud->render();
			$data['titulo']="PRODUCTOS";
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