<?php
class User extends CI_Controller {
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

	function index(){
		if($this->session->userdata('is_logged_in')){
			if($this->session->userdata('user_nivel')== 1){
				redirect('user/dashboard');
			}
        } else {
        	$this->load->view('admin/login');	
        }
	}
	
	function dashboard(){
		if($this->session->userdata('is_logged_in')){
			$data['titulo']="Dashboard";
			$data['calendario']= false;
			$this->load->view('include/head');
			$this->load->view('include/header',$data);
			$this->load->view('admin/html_dashboard');
			$this->load->view('admin/librerias');
			$this->load->view('admin/dashboard');
			$this->load->view('include/footer');
		} else {
			$this->load->view('admin/login');	
		}
	}
	
	function validate_credentials(){	
		$is_valid=false;	
		$data= array(
			'usuario' => $this->input->post('usuario'),
			'clave' => $this->input->post('password')
		);
		$query= $this->db->get_where('usuarios',$data);
		if($query->num_rows() > 0){
			$data = array(
				'user_nombre' 	=> $query->row()->nombre,
				'user_id'		=> $query->row()->row_id,
				'user_nivel'	=> $query->row()->id_nivel,
				'user_img' 	=> $query->row()->foto,
				'is_logged_in' => true
			);
			$this->session->set_userdata($data);
			redirect('user/dashboard');
		} else {
			$data['message_error'] = TRUE;
			$this->load->view('admin/login', $data);	
		}
	}
	
	function configuracion(){
		$crud = new grocery_CRUD();
		$crud->set_table('usuarios');
		$crud->set_theme('datatables');
		$crud->set_language('spanish');
		$crud->set_subject('Usuario');
		$state = $crud->getState();
		$state_info = $crud->getStateInfo();
		if($state == 'list' || $state == 'success'){
			redirect('user/dashboard');
		} else {
			$crud->unset_add();
			$crud->unset_delete();
			$crud->field_type('usuario','readonly');
			$crud->field_type('clave','password');
			$crud->field_type('id_cliente','hidden');
			$crud->field_type('id_nivel','hidden');
			$crud->field_type('row_id', 'hidden');
			$crud->field_type('id_estatus', 'hidden');
			$crud->set_field_upload('foto','assets/uploads/users/');
			$output = $crud->render();
			$data['titulo']="CONFIGURACION DE USUARIO";
			$this->load->view('include/head',$output);
			$this->load->view('include/header',$data);
			$this->load->view('admin/output');
			$this->load->view('include/footer',$data);
			$this->load->view('admin/librerias');	
		}
	}
	
	function logout(){
		$this->session->sess_destroy();
		redirect('user/index');
	}

}