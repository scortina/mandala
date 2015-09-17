<?php

class Facturas extends CI_Controller {
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
		$this->load->model('Clientes_model');
		$this->load->model('Products_model');
		$this->load->model('Sucursales_model');
		$this->load->model('datos_model');
		$this->load->model('Facturas_model');
	}
	
	function consultar(){
		if($this->session->userdata('is_logged_in')){
			$crud = new grocery_CRUD();
			//-> Identifico el ID del Cliente
			$crud->set_table('facturas');
			//->
 			$crud->set_theme('datatables');
			$crud->set_language('spanish');
			$crud->set_subject('Factura');
			// Display As
			$crud->unset_add();
			$crud->display_as('id_moneda_pago','Moneda Pago');
			$crud->display_as('id_cliente','Cliente');
			$crud->display_as('id_estatus','Estatus');
			//-> Columnas
			$crud->columns('folio','id_cliente','total','fecha_creacion','id_estatus');
			// Relaciones
			$crud->set_relation('id_moneda_pago','tipos_moneda','descripcion');
			$crud->set_relation('registrado_por','usuarios','nombre');
			$crud->set_relation('id_estatus','formas_pago','descripcion');
			$crud->set_relation('id_cliente','clientes','nombre');
			//-> Renderizar
			$output = $crud->render();
			$data['titulo']="CONSULTAR FACTURAS";
			$this->load->view('include/head',$output);
			$this->load->view('include/header',$data);
			$this->load->view('admin/output');
			$this->load->view('admin/librerias');	
			$this->load->view('include/footer',$data);
        } else {
        	$this->load->view('admin/login');	
        }	
	}

	function capturar(){
		if($this->session->userdata('is_logged_in')){
			$crud = new grocery_CRUD();
			//-> Identifico el ID del Cliente
			$crud->set_table('facturas');
			//->
 			$crud->set_theme('datatables');
			$crud->set_language('spanish');
			$crud->set_subject('Factura');

			$crud->unset_add();
			$crud->unset_export();
			$crud->unset_print();

	
			$output = $crud->render();

			$data['titulo']="CREAR FACTURAS";

			$clientes = $this->Clientes_model->GetClients();
			$producto = $this->Products_model->get_all_products();
			$sucursales = $this->Sucursales_model->get_all_sucursales();
			$moneda = $this->datos_model->get_datos("tipos_moneda","row_id, descripcion", "row_id", "ASC");
			$datos = array('clientes' => $clientes, 'productos' => $producto, 'sucursales' => $sucursales, "moneda" => $moneda);

			$this->load->view('include/head', $output);
			$this->load->view('include/header',$data);
			$this->load->view('admin/addFactura', $datos);
			$this->load->view('admin/librerias');	
			$this->load->view('include/footer',$data);
			
		}else{
			$this->load->view('admin/login');	
		}
	}

	function getDatosClientes(){
		$cliente = $_POST["cliente"];
		$clientes = $this->Clientes_model->GetAllDataClients($cliente);
		$datos = array('clientes' => $clientes);
		$this->load->view('ajax/clientes',$datos);	
	}

	function guardarFactura(){
		$cliente = $_POST["cliente"];
		$fecha = $_POST["fecha"];
		$subtotal = $_POST["subtotal"];
		$total = $_POST["total"];
		$iva = $_POST["iva"];
		$monedaPago = $_POST["moneda"];
		$notaCredito = $_POST["nota"];
		$user = $this->session->userdata('user_id');
		
		$this->load->helper('date');
        $datestring = "%Y-%m-%d";
        $dring = mdate($datestring);

		$datos  = array( 
					'id_cliente' => $cliente,
					'subtotal'   => $subtotal,
					'iva'        => $iva,
					'total'		 => $total,
					'nota_credito' => $notaCredito,
					'fecha_creacion' => $dring,
					'fecha_pago' => $fecha,
					'id_moneda_pago' => $monedaPago,
					'registrado_por' => $user,
					'id_estatus'     => 1,
					'folio'			=> 1
				);

		if($this->datos_model->add_datos("facturas", $datos)){
			$id = $this->Facturas_model->get_factura_by_datos( $cliente, $dring, $user);
			$longitud = $_POST["longitud"];
			$producto = $_POST["productos"];
			$row_id = 0;

			foreach ($id as $file) {
				$row_id = $file->row_id;
			}

			for($i = 0; $i < $longitud; $i++ ){
				if(isset($producto[$i])){
					$datos  = array( 
						'id_factura' 	=> $row_id,
						'cantidad'   	=> $producto[$i][1] ,
						'producto'   	=> $producto[$i][0],
						'sucursal'   	=> $producto[$i][2],
						'tarifa' 	 	=> $producto[$i][3],
						'tipo_cambio' 	=> $producto[$i][4],
						'subtotal' 		=> $producto[$i][5]
					);
					$this->datos_model->add_datos("facturas_contenido", $datos);
				}
			}

			$respuesta =  array();
			$respuesta["success"] = 1;
			echo json_encode($respuesta);
		}

	}
}