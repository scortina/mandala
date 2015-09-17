<?php

class Clientes extends CI_Controller {
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
			//-> Identifico el ID del Cliente
			$crud->set_table('clientes');
			//->
 			$crud->set_theme('datatables');
			$crud->set_language('spanish');
			$crud->set_subject('Cliente');
			// Display As
			$crud->display_as('razon_social','Razón Social');
			$crud->display_as('clasificacion','Clasificación');
			$crud->display_as('id_responsable','Responsable');
			$crud->display_as('id_estado','Estado');
			$crud->display_as('id_pais','Pais');
			$crud->display_as('rfc','RFC');
			$crud->display_as('cp','CP');
			$crud->display_as('id_estatus','Estatus');
			$crud->field_type('registrado_por','hidden');
			$crud->field_type('email','email');
			//-> Columnas
			$crud->columns('razon_social','rfc','clasificacion','tipo_pago','id_responsable');
			// Relaciones
			$crud->set_relation('tipo_pago','tipos_pago','descripcion',array('tipos_pago.id_estatus'=>'1'));
			$crud->set_relation('id_responsable','asignatarios','nombre');
			$crud->set_relation('id_estado','estados_mexico','descripcion');
			$crud->set_relation('id_pais','paises','descripcion');
			$crud->set_relation('id_estatus','clientes_estatus','descripcion');
			$crud->set_relation('dia_revision','dias_revision','dia',null,'row_id ASC');
			$crud->set_relation('fecha_corte','fecha_corte','descripcion',null,'row_id ASC');
			$crud->set_relation('id_estatus','disponible_nodisponible','descripcion');
			//-> Filas Requeridas
			$crud->required_fields(
			  'razon_social',
			  'nombre',
			  'tipo_pago',
			  'dia_revision',
			  'fecha_corte',
			  'email',
			  'id_estatus'
			);
			//-> Renderizar
			$output = $crud->render();
			$data['titulo']="CLIENTES";
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