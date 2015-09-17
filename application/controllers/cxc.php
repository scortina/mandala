<?php
class Cxc extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->pagina = '';
		$timezone = @date_default_timezone_get();
       if (!isset($timezone) || $timezone == '') { $timezone = @ini_get('date.timezone'); }
       if (!isset($timezone) || $timezone == '') { $timezone = 'UTC'; }
       date_default_timezone_set($timezone); 
		$this->load->database();
		$this->load->helper('url');
		$this->load->library('grocery_CRUD');
		$this->load->model('datos_model');
	}

	function pendientes(){
		if($this->session->userdata('is_logged_in')){
			$data['titulo'] = "Pendientes CXC";
			$data['calendario'] = true;
			$this->load->view('include/head');
			$this->load->view('include/header',$data);
			$this->load->view('admin/html_cxc');
			$this->load->view('admin/librerias');
			$this->load->view('admin/cxc');
			$this->load->view('include/footer');
		} else {
			$this->load->view('admin/login');	
		}
	}
        function efectivo(){
		if($this->session->userdata('is_logged_in')){
			$data['titulo'] = "Efectivo";
			$data['calendario'] = false;
			$this->load->view('include/head');
			$this->load->view('include/header',$data);
			$this->load->view('admin/html_cxc_efectivo');
			$this->load->view('admin/librerias');
			$this->load->view('admin/cxc');
			$this->load->view('include/footer');
		} else {
			$this->load->view('admin/login');	
		}
	}
        function facturas(){
		if($this->session->userdata('is_logged_in')){
			$data['titulo'] = "Facturas";
			$data['calendario'] = false;
			$this->load->view('include/head');
			$this->load->view('include/header',$data);
			$this->load->view('admin/html_cxc_facturas');
			$this->load->view('admin/librerias');
			$this->load->view('admin/cxc');
			$this->load->view('include/footer');
		} else {
			$this->load->view('admin/login');	
		}
	}
        function grupo(){
		if($this->session->userdata('is_logged_in')){
			$data['titulo'] = "Grupo";
			$data['calendario'] = false;
			$this->load->view('include/head');
			$this->load->view('include/header',$data);
			$this->load->view('admin/html_cxc_grupos');
			$this->load->view('admin/librerias');
			$this->load->view('admin/cxc');
			$this->load->view('include/footer');
		} else {
			$this->load->view('admin/login');	
		}
	}
        function pagos(){
		if($this->session->userdata('is_logged_in')){
			$data['titulo'] = "Pagos";
			$data['calendario'] = false;
			$this->load->view('include/head');
			$this->load->view('include/header',$data);
			$this->load->view('admin/html_cxc_pagos');
			$this->load->view('admin/librerias');
			$this->load->view('admin/cxc');
			$this->load->view('include/footer');
		} else {
			$this->load->view('admin/login');	
		}
	}

}