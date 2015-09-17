<?php

class Configuracion extends CI_Controller {
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
	
	function usuarios(){
		if($this->session->userdata('is_logged_in')){
			$crud = new grocery_CRUD();
			$crud->set_table('usuarios');
			//->
 			$crud->set_theme('datatables');
			$crud->set_language('spanish');
			$crud->set_subject('Usuario');
			// Display As
			$crud->display_as('id_nivel','Nivel');
			$crud->display_as('id_estatus','Estatus');
			$crud->field_type('id_cliente','hidden');
			$crud->field_type('clave', 'password');
			$crud->field_type('email', 'email');
			//-> Columnas
			$crud->columns('nombre','usuario','email','id_nivel');
			// Relaciones
			$crud->set_relation('id_nivel','usuario_niveles','descripcion');
			$crud->set_relation('id_estatus','usuario_estatus','descripcion');
			// Upload
			$crud->set_field_upload('foto','assets/uploads/users/');
			// Validacion
			$crud->required_fields('nombre','email','usuario','	clave','id_nivel','id_estatus');
			//-> Renderizar
			$output = $crud->render();
			$data['titulo']="USUARIOS";
			$this->load->view('include/head',$output);
			$this->load->view('include/header',$data);
			$this->load->view('admin/output');
			$this->load->view('admin/librerias');	
			$this->load->view('include/footer',$data);
        } else {
        	$this->load->view('admin/login');	
        }	
	}
	
	function niveles(){
		if($this->session->userdata('is_logged_in')){
			$crud = new grocery_CRUD();
			$crud->set_table('usuario_niveles');
			//->
 			$crud->set_theme('datatables');
			$crud->set_language('spanish');
			$crud->set_subject('Nivel');
			// Display As
			$crud->display_as('id_estatus','Estatus');
			//-> Columnas
			$crud->columns('descripcion','id_estatus');
			// Relaciones
			$crud->set_relation('id_estatus','disponible_nodisponible','descripcion');
			// Upload
			// Validacion
			$crud->required_fields('descripcion','id_estatus');
			//-> Renderizar
			$output = $crud->render();
			$data['titulo']="NIVELES";
			$this->load->view('include/head',$output);
			$this->load->view('include/header',$data);
			$this->load->view('admin/output');
			$this->load->view('admin/librerias');	
			$this->load->view('include/footer',$data);
        } else {
        	$this->load->view('admin/login');	
        }	
	}
	
	function operadoras(){
		if($this->session->userdata('is_logged_in')){
			$crud = new grocery_CRUD();
			$crud->set_table('operadoras');
			//->
 			$crud->set_theme('datatables');
			$crud->set_language('spanish');
			$crud->set_subject('Operadora');
			// Display As
			$crud->display_as('id_estado','Estado');
			$crud->display_as('id_estatus','Estatus');
			//-> Columnas
			$crud->columns('nombre');
			// Relaciones
			$crud->set_relation('id_estatus','disponible_nodisponible','descripcion');
			$crud->set_relation_n_n('sucursal', 'sucursales_operadoras', 'sucursales', 'operadora_id', 'sucursal_id', 'marca',null,array('sucursales.id_estatus'=>'1'));
			// Validacion
			$crud->required_fields('nombre','id_estatus');
			//-> Renderizar
			$output = $crud->render();
			$data['titulo']="OPERADORAS";
			$this->load->view('include/head',$output);
			$this->load->view('include/header',$data);
			$this->load->view('admin/output');
			$this->load->view('admin/librerias');	
			$this->load->view('include/footer',$data);
        } else {
        	$this->load->view('admin/login');	
        }	
	}
	
	function sucursales(){
		if($this->session->userdata('is_logged_in')){
			$crud = new grocery_CRUD();
			$crud->set_table('sucursales');
			//->
 			$crud->set_theme('datatables');
			$crud->set_language('spanish');
			$crud->set_subject('Sucursal');
			// Display As
			$crud->display_as('id_estatus','Estatus');
			//-> Columnas
			$crud->columns('marca');
			// Relaciones
			$crud->set_relation('id_estatus','disponible_nodisponible','descripcion');
			// Upload
			// Validacion
			$crud->required_fields('marca');
			//-> Renderizar
			$output = $crud->render();
			$data['titulo']="SUCURSALES";
			$this->load->view('include/head',$output);
			$this->load->view('include/header',$data);
			$this->load->view('admin/output');
			$this->load->view('admin/librerias');	
			$this->load->view('include/footer',$data);
        } else {
        	$this->load->view('admin/login');	
        }	
	}
	
	function tipos_pago(){
		if($this->session->userdata('is_logged_in')){
			$crud = new grocery_CRUD();
			$crud->set_table('tipos_pago');
			//->
 			$crud->set_theme('datatables');
			$crud->set_language('spanish');
			$crud->set_subject('Tipo de Pago');
			// Display As
			$crud->display_as('id_estatus','Estatus');
			$crud->display_as('id_formas_pago','Forma de Pago');
			//-> Columnas
			$crud->columns('descripcion','id_estatus');
			// Relaciones
			$crud->set_relation('id_estatus','disponible_nodisponible','descripcion');
			$crud->set_relation_n_n('id_formas_pago', 'tipo_forma_pago', 'formas_pago', 'tipo_id', 'forma_id', 'descripcion',null,array('formas_pago.id_estatus'=>'1'));
			// Upload
			// Validacion
			$crud->required_fields('descripcion','id_estatus');
			//-> Renderizar
			$output = $crud->render();
			$data['titulo']="TIPOS DE PAGO";
			$this->load->view('include/head',$output);
			$this->load->view('include/header',$data);
			$this->load->view('admin/output');
			$this->load->view('admin/librerias');	
			$this->load->view('include/footer',$data);
        } else {
        	$this->load->view('admin/login');	
        }	
	}
	
	function formas_pago(){
		if($this->session->userdata('is_logged_in')){
			$crud = new grocery_CRUD();
			$crud->set_table('formas_pago');
			//->
 			$crud->set_theme('datatables');
			$crud->set_language('spanish');
			$crud->set_subject('Forma de Pago');
			// Display As
			$crud->display_as('id_estatus','Estatus');
			//-> Columnas
			$crud->columns('descripcion','id_estatus');
			// Relaciones
			$crud->set_relation('id_estatus','disponible_nodisponible','descripcion');
			// Upload
			// Validacion
			$crud->required_fields('descripcion','id_estatus');
			//-> Renderizar
			$output = $crud->render();
			$data['titulo']="FORMAS DE PAGO";
			$this->load->view('include/head',$output);
			$this->load->view('include/header',$data);
			$this->load->view('admin/output');
			$this->load->view('admin/librerias');	
			$this->load->view('include/footer',$data);
        } else {
        	$this->load->view('admin/login');	
        }	
	}
	
	function clasificacion_clientes(){
		if($this->session->userdata('is_logged_in')){
			$crud = new grocery_CRUD();
			$crud->set_table('clientes_clasificacion');
			//->
 			$crud->set_theme('datatables');
			$crud->set_language('spanish');
			$crud->set_subject('Clasificación de Cliente');
			// Display As
			$crud->display_as('id_estatus','Estatus');
			//-> Columnas
			$crud->columns('descripcion','id_estatus');
			// Relaciones
			$crud->set_relation('id_estatus','disponible_nodisponible','descripcion');
			// Upload
			// Validacion
			$crud->required_fields('descripcion','id_estatus');
			//-> Renderizar
			$output = $crud->render();
			$data['titulo']="CLASIFICACION DE CLIENTES";
			$this->load->view('include/head',$output);
			$this->load->view('include/header',$data);
			$this->load->view('admin/output');
			$this->load->view('admin/librerias');	
			$this->load->view('include/footer',$data);
        } else {
        	$this->load->view('admin/login');	
        }	
	}
	
	function clasificacion_productos(){
		if($this->session->userdata('is_logged_in')){
			$crud = new grocery_CRUD();
			$crud->set_table('productos_clasificaciones');
			//->
 			$crud->set_theme('datatables');
			$crud->set_language('spanish');
			$crud->set_subject('Clasificación de Producto');
			// Display As
			$crud->display_as('id_estatus','Estatus');
			//-> Columnas
			$crud->columns('descripcion','id_estatus');
			// Relaciones
			$crud->set_relation('id_estatus','disponible_nodisponible','descripcion');
			// Upload
			// Validacion
			$crud->required_fields('descripcion','id_estatus');
			//-> Renderizar
			$output = $crud->render();
			$data['titulo']="CLASIFICACION DE PRODUCTOS";
			$this->load->view('include/head',$output);
			$this->load->view('include/header',$data);
			$this->load->view('admin/output');
			$this->load->view('admin/librerias');	
			$this->load->view('include/footer',$data);
        } else {
        	$this->load->view('admin/login');	
        }	
	}
	
	function tipos_moneda(){
		if($this->session->userdata('is_logged_in')){
			$crud = new grocery_CRUD();
			$crud->set_table('tipos_moneda');
			//->
 			$crud->set_theme('datatables');
			$crud->set_language('spanish');
			$crud->set_subject('Tipo de Moneda');
			// Display As
			$crud->display_as('id_estatus','Estatus');
			//-> Columnas
			$crud->columns('descripcion','id_estatus');
			// Relaciones
			$crud->set_relation('id_estatus','disponible_nodisponible','descripcion');
			// Upload
			// Validacion
			$crud->required_fields('descripcion','id_estatus');
			//-> Renderizar
			$output = $crud->render();
			$data['titulo']="TIPOS DE MONEDA";
			$this->load->view('include/head',$output);
			$this->load->view('include/header',$data);
			$this->load->view('admin/output');
			$this->load->view('admin/librerias');	
			$this->load->view('include/footer',$data);
        } else {
        	$this->load->view('admin/login');	
        }	
	}
	
	function estatus_pago(){
		if($this->session->userdata('is_logged_in')){
			$crud = new grocery_CRUD();
			$crud->set_table('pago_estatus');
			//->
 			$crud->set_theme('datatables');
			$crud->set_language('spanish');
			$crud->set_subject('Estatus de Pago');
			// Display As
			$crud->display_as('id_estatus','Estatus');
			//-> Columnas
			$crud->columns('descripcion','id_estatus');
			// Relaciones
			$crud->set_relation('id_estatus','disponible_nodisponible','descripcion');
			// Upload
			// Validacion
			$crud->required_fields('descripcion','id_estatus');
			//-> Renderizar
			$output = $crud->render();
			$data['titulo']="ESTATUS DE PAGOS";
			$this->load->view('include/head',$output);
			$this->load->view('include/header',$data);
			$this->load->view('admin/output');
			$this->load->view('admin/librerias');	
			$this->load->view('include/footer',$data);
        } else {
        	$this->load->view('admin/login');	
        }	
	}
	
	function estados_mexico(){
		if($this->session->userdata('is_logged_in')){
			$crud = new grocery_CRUD();
			$crud->set_table('estados_mexico');
			//->
 			$crud->set_theme('datatables');
			$crud->set_language('spanish');
			$crud->set_subject('Estado de México');
			// Display As
			$crud->display_as('id_estatus','Estatus');
			//-> Columnas
			$crud->columns('descripcion','id_estatus');
			// Relaciones
			$crud->set_relation('id_estatus','disponible_nodisponible','descripcion');
			// Upload
			// Validacion
			$crud->required_fields('descripcion','id_estatus');
			//-> Renderizar
			$output = $crud->render();
			$data['titulo']="ESTADOS DE MEXICO";
			$this->load->view('include/head',$output);
			$this->load->view('include/header',$data);
			$this->load->view('admin/output');
			$this->load->view('admin/librerias');	
			$this->load->view('include/footer',$data);
        } else {
        	$this->load->view('admin/login');	
        }	
	}
	
	function paises(){
		if($this->session->userdata('is_logged_in')){
			$crud = new grocery_CRUD();
			$crud->set_table('paises');
			//->
 			$crud->set_theme('datatables');
			$crud->set_language('spanish');
			$crud->set_subject('Paises');
			// Display As
			$crud->display_as('id_estatus','Estatus');
			//-> Columnas
			$crud->columns('descripcion','id_estatus');
			// Relaciones
			$crud->set_relation('id_estatus','disponible_nodisponible','descripcion');
			// Upload
			// Validacion
			$crud->required_fields('descripcion','id_estatus');
			//-> Renderizar
			$output = $crud->render();
			$data['titulo']="PAISES";
			$this->load->view('include/head',$output);
			$this->load->view('include/header',$data);
			$this->load->view('admin/output');
			$this->load->view('admin/librerias');	
			$this->load->view('include/footer',$data);
        } else {
        	$this->load->view('admin/login');	
        }	
	}
	
	function trazabilidad(){
		if($this->session->userdata('is_logged_in')){
			$crud = new grocery_CRUD();
			$crud->set_table('trazabilidad');
			//->
 			$crud->set_theme('datatables');
			$crud->set_language('spanish');
			$crud->set_subject('trazabilidad');
			// Display As
			$crud->unset_add();
			$crud->unset_print();
			$crud->display_as('id_usuario','Usuario');
			//-> Columnas
			$crud->columns('modulo','accion','registro','id_usuario','fecha','hora');
			// Relaciones
			$crud->set_relation('id_usuario','usuarios','nombre');
			// Upload
			// Validacion
			$crud->required_fields('descripcion','id_estatus');
			//-> Renderizar
			$output = $crud->render();
			$data['titulo']="TRAZABILIDAD";
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