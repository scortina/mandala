<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	private $sesdion_id;
	public function __construct(){
			parent::__construct();
			$this->load->model('datos_model');
			//Do your magic here
	}

function index(){
	if($this->uri->segment(3)==1){
		$rendimiento_total_m_anterior=0;
		$rendimiento_total_m_actual=0;
		$rendimiento_total_f_anterior=0;
		$rendimiento_total_f_actual=0;
		$rendimiento_promedio=0;
		$kilometro_total=0;
		$litros_total=0;
		$i=0;
		$cliente=$this->session->userdata('cliente');
		$consumo_unidades=array();
		$consumo_total=$this->datos_model->suma('transacciones',array("cliente"=>$cliente),'importe');
		$consumo_mes_anterior_m=$this->datos_model->suma('transacciones',array("mes"=>(date('m')-1),"anio"=>date('Y'),"cliente"=>$cliente),'importe');
		$consumo_mes_anterior_f=$this->datos_model->suma('transacciones_foraneas',array("mes"=>(date('m')-1),"anio"=>date('Y'),"cliente"=>$cliente),'importe');
		$consumo_actual_m=$this->datos_model->suma('transacciones',array("mes"=>date('m'),"anio"=>date('Y'),"cliente"=>$cliente),'importe');
		$consumo_actual_f=$this->datos_model->suma('transacciones_foraneas',array("mes"=>date('m'),"anio"=>date('Y'),"cliente"=>$cliente),'importe');
					
		//<--rendimiento
		$filtro=array("alias"=>$cliente);
		$datos=$this->datos_model->get_dato_where('clientes','*',$filtro);
		//echo $datos->row_id."<br>";	

		$filtro_unidad=array("row_cliente"=>$datos->row_id,"estatus"=>'1');
		$unidades=$this->datos_model->get_where('clientes_unidades','*','row_id','ASC',$filtro_unidad);
		
		foreach ($unidades as $unidad) {
			$i++;
			//redimiento_marlo_anterior
			$filtro_unidad=array("cliente"=>$cliente,"kilometraje !="=>'',"consumidor"=>$unidad->alias,"mes"=>(date('m')-1));
			$transacciones=$this->datos_model->get_where('transacciones','*','row_id','DESC',$filtro_unidad);
			//$transacciones=$this->datos_model->get_where_limit('transacciones','*','row_id','DESC',$filtro_unidad,'2');
			$inicial='';
			$final='';
			
			foreach ($transacciones as $transaccion) {
				if($inicial==0){
					$inicial=$transaccion->kilometraje;
				} else {
					$final=$transaccion->kilometraje;
				} 
				$litros_total+=$transaccion->cantidad;
			}
					
			$kilometro_total=$inicial-$final;
			if($kilometro_total!='' && $kilometro_total!=''){
				$rendimiento_unidad=$kilometro_total/$litros_total;
			} else {
				$rendimiento_unidad=0;
			}
			
			$rendimiento_total_m_anterior+=$rendimiento_unidad;
						
			//echo "Marlo Mes".(date('m')-1)."Unidad: ".$unidad->alias."- Kilometros:".$kilometro_total." -Litros:".$litros_total." -Rendimiento:".$rendimiento_unidad."<br>";

			$litros_total=0;
			
			//redimiento_marlo_actual
			$filtro_unidad=array("cliente"=>$cliente,"kilometraje !="=>'',"consumidor"=>$unidad->alias,"mes"=>(date('m')));
			$transacciones=$this->datos_model->get_where('transacciones','*','row_id','DESC',$filtro_unidad);
			
			//$transacciones=$this->datos_model->get_where_limit('transacciones','*','row_id','DESC',$filtro_unidad,'2');
			$inicial='';
			$final='';
			foreach ($transacciones as $transaccion) {
				if($inicial==0){
					$inicial=$transaccion->kilometraje;
				} else {
					$final=$transaccion->kilometraje;
				}
				$litros_total+=$transaccion->cantidad;
			}
						
			$kilometro_total=$inicial-$final;
			if($kilometro_total!='' && $kilometro_total!=''){
				$rendimiento_unidad=$kilometro_total/$litros_total;
			} else {
				$rendimiento_unidad=0;
			}
						
			$rendimiento_total_m_actual+=$rendimiento_unidad;
						
			//echo "Marlo Mes".(date('m'))."Unidad: ".$unidad->alias."- Kilometros:".$kilometro_total." -Litros:".$litros_total." -Rendimiento:".$rendimiento_unidad."<br>";

			$litros_total=0;
			
//redimiento_foranea_anterior
			$filtro_unidad=array("cliente"=>$cliente,"kilometraje !="=>'',"consumidor"=>$unidad->alias,"mes"=>(date('m')-1));
			$transacciones=$this->datos_model->get_where('transacciones_foraneas','*','row_id','DESC',$filtro_unidad);
			//$transacciones=$this->datos_model->get_where_limit('transacciones','*','row_id','DESC',$filtro_unidad,'2');
			$inicial='';
			$final='';
			foreach ($transacciones as $transaccion) {
				if($inicial==0){
					$inicial=$transaccion->kilometraje;
				}else{
					$final=$transaccion->kilometraje;
				}

				$litros_total+=$transaccion->cantidad;
			}
			
			$kilometro_total=$inicial-$final;
			if($kilometro_total!='' && $kilometro_total!=''){
				$rendimiento_unidad=$kilometro_total/$litros_total;
			}else{
				$rendimiento_unidad=0;
			}
			
			$rendimiento_total_f_anterior+=$rendimiento_unidad;
						
			//echo "Foraneas Mes".(date('m')-1)."Unidad: ".$unidad->alias."- Kilometros:".$kilometro_total." -Litros:".$litros_total." -Rendimiento:".$rendimiento_unidad."<br>";

			$litros_total=0;

			//redimiento_foranea_actual
			$filtro_unidad=array("cliente"=>$cliente,"kilometraje !="=>'',"consumidor"=>$unidad->alias,"mes"=>(date('m')));
			$transacciones=$this->datos_model->get_where('transacciones_foraneas','*','row_id','DESC',$filtro_unidad);
			//$transacciones=$this->datos_model->get_where_limit('transacciones','*','row_id','DESC',$filtro_unidad,'2');
			$inicial='';
			$final='';
			foreach ($transacciones as $transaccion) {
				if($inicial==0){
					$inicial=$transaccion->kilometraje;
				}else{
					$final=$transaccion->kilometraje;
				}

				$litros_total+=$transaccion->cantidad;
			}
			
			$kilometro_total=$inicial-$final;
			if($kilometro_total!='' && $kilometro_total!=''){
				$rendimiento_unidad=$kilometro_total/$litros_total;
			}else{
				$rendimiento_unidad=0;
			}
			
			$rendimiento_total_f_actual+=$rendimiento_unidad;
						
			//echo "Foraneas Mes".(date('m'))."Unidad: ".$unidad->alias."- Kilometros:".$kilometro_total." -Litros:".$litros_total." -Rendimiento:".$rendimiento_unidad."<br>";

			$litros_total=0;
			$encabezado=array("consumo_total"=>"$ ".number_format($consumo_total,'2','.',','),"consumo_anterior_m"=>$consumo_mes_anterior_m,"consumo_anterior_f"=>$consumo_mes_anterior_f,"consumo_actual_m"=>number_format($consumo_actual_m,'2','.',','),"consumo_actual_f"=>number_format($consumo_actual_f,'2','.',','),"rendimiento_anterior_m"=>number_format($rendimiento_total_m_anterior,'2','.',','),"rendimiento_actual_m"=>number_format($rendimiento_total_m_actual,'2','.',','),"rendimiento_anterior_f"=>number_format($rendimiento_total_f_anterior,'2','.',','),"rendimiento_actual_f"=>number_format($rendimiento_total_f_actual,'2','.',','));

			//consumo y rendimiento por unidad unidades por dia actual
			//echo $unidad->alias." ".date('Y-m-d')."<br>";	
			$consumo_m=$this->datos_model->suma('transacciones',array("fecha"=>date('Y-m-d'),"consumidor"=>$unidad->alias),'importe');
			$consumo_f=$this->datos_model->suma('transacciones_foraneas',array("fecha"=>date('Y-m-d'),"consumidor"=>$unidad->alias),'importe');	
			if($consumo_m>0){
				$i++;
				//rendimiento
				$filtro_unidad=array("cliente"=>$cliente,"kilometraje !="=>'',"consumidor"=>$unidad->alias);
				$transacciones=$this->datos_model->get_where_limit('transacciones','*','row_id','DESC',$filtro_unidad,'2');
				$inicial='';
				$final='';
				foreach ($transacciones as $transaccion) {
					if($inicial==''){
						$inicial=$transaccion->kilometraje;
					}else{
						$final=$transaccion->kilometraje;
					}
					//echo $unidad->kilometraje."<br>";	
				}
				$kilometro=$inicial-$final;
				
				$filtro_litros=array("cliente"=>$cliente,"consumidor"=>$unidad->alias);
				$litros=$this->datos_model->get_where_limit('transacciones','*','row_id','DESC',$filtro_litros,'1');
				foreach ($litros as $litro) {
					$total_litros=$litro->cantidad;
				}
				$rendimiento=number_format($kilometro/$total_litros,2,'.',',');
				$consumo_unidades[]=array("num_uni"=>$unidad->row_id,"nombre"=>$unidad->nombre,"alias"=>$unidad->alias,"consumo_m"=>$consumo_m,"consumo_f"=>number_format($consumo_f,2,'.',','),"rendimiento"=>number_format($rendimiento,2,'.',','));

			}	
			
		}
	} else {
		$rendimiento_total_m_anterior=0;
		$rendimiento_total_m_actual=0;
		$rendimiento_total_f_anterior=0;
		$rendimiento_total_f_actual=0;
		$rendimiento_promedio=0;
		$kilometro_total=0;
		$litros_total=0;
		$i=0;
		$cliente=$this->session->userdata('cliente');
		$consumo_unidades=array();
		$consumo_total=$this->datos_model->suma('transacciones',array("importe !="=>'0'),'importe');
		$consumo_mes_anterior_m=$this->datos_model->suma('transacciones',array("mes"=>(date('m')-1),"anio"=>date('Y')),'importe');
		$consumo_mes_anterior_f=$this->datos_model->suma('transacciones_foraneas',array("mes"=>(date('m')-1),"anio"=>date('Y')),'importe');
		$consumo_actual_m=$this->datos_model->suma('transacciones',array("mes"=>date('m'),"anio"=>date('Y')),'importe');
		$consumo_actual_f=$this->datos_model->suma('transacciones_foraneas',array("mes"=>date('m'),"anio"=>date('Y')),'importe');
		
		//<--rendimiento
		$filtro=array("alias !="=>'0');
		$datos=$this->datos_model->get_dato_where('clientes','*',$filtro);
		//echo $datos->row_id."<br>";	

		$filtro_unidad=array("row_cliente"=>$datos->row_id,"estatus"=>'1');
		$unidades=$this->datos_model->get_where('clientes_unidades','*','row_id','ASC',$filtro_unidad);
					
		foreach ($unidades as $unidad) {
			$i++;
			//redimiento_marlo_anterior
			$filtro_unidad=array("cliente"=>$cliente,"kilometraje !="=>'',"consumidor"=>$unidad->alias,"mes"=>(date('m')-1));
			$transacciones=$this->datos_model->get_where('transacciones','*','row_id','DESC',$filtro_unidad);
			//$transacciones=$this->datos_model->get_where_limit('transacciones','*','row_id','DESC',$filtro_unidad,'2');
			$inicial='';
			$final='';
			foreach ($transacciones as $transaccion) {
				if($inicial==0){
					$inicial=$transaccion->kilometraje;
				}else{
					$final=$transaccion->kilometraje;
				}

				$litros_total+=$transaccion->cantidad;
			}
						
			$kilometro_total=$inicial-$final;
			if($kilometro_total!='' && $kilometro_total!=''){
				$rendimiento_unidad=$kilometro_total/$litros_total;
			} else {
				$rendimiento_unidad=0;
			}
			
			$rendimiento_total_m_anterior+=$rendimiento_unidad;
						
			//echo "Marlo Mes".(date('m')-1)."Unidad: ".$unidad->alias."- Kilometros:".$kilometro_total." -Litros:".$litros_total." -Rendimiento:".$rendimiento_unidad."<br>";

			$litros_total=0;

//redimiento_marlo_actual
			$filtro_unidad=array("cliente"=>$cliente,"kilometraje !="=>'',"consumidor"=>$unidad->alias,"mes"=>(date('m')));
			$transacciones=$this->datos_model->get_where('transacciones','*','row_id','DESC',$filtro_unidad);
			//$transacciones=$this->datos_model->get_where_limit('transacciones','*','row_id','DESC',$filtro_unidad,'2');
			$inicial='';
			$final='';
			foreach ($transacciones as $transaccion) {
				if($inicial==0){
					$inicial=$transaccion->kilometraje;
				}else{
					$final=$transaccion->kilometraje;
				}

				$litros_total+=$transaccion->cantidad;
			}
			
			$kilometro_total=$inicial-$final;
			if($kilometro_total!='' && $kilometro_total!=''){
				$rendimiento_unidad=$kilometro_total/$litros_total;
			}else{
				$rendimiento_unidad=0;
			}
			
			$rendimiento_total_m_actual+=$rendimiento_unidad;
			
			//echo "Marlo Mes".(date('m'))."Unidad: ".$unidad->alias."- Kilometros:".$kilometro_total." -Litros:".$litros_total." -Rendimiento:".$rendimiento_unidad."<br>";

			$litros_total=0;




			//redimiento_foranea_anterior
			$filtro_unidad=array("cliente"=>$cliente,"kilometraje !="=>'',"consumidor"=>$unidad->alias,"mes"=>(date('m')-1));
			$transacciones=$this->datos_model->get_where('transacciones_foraneas','*','row_id','DESC',$filtro_unidad);
			//$transacciones=$this->datos_model->get_where_limit('transacciones','*','row_id','DESC',$filtro_unidad,'2');
			$inicial='';
			$final='';
			foreach ($transacciones as $transaccion) {
				if($inicial==0){
					$inicial=$transaccion->kilometraje;
				}else{
					$final=$transaccion->kilometraje;
				}

				$litros_total+=$transaccion->cantidad;
			}
			
			$kilometro_total=$inicial-$final;
			if($kilometro_total!='' && $kilometro_total!=''){
				$rendimiento_unidad=$kilometro_total/$litros_total;
			} else {
				$rendimiento_unidad=0;
			}
			
			$rendimiento_total_f_anterior+=$rendimiento_unidad;
			
		//echo "Foraneas Mes".(date('m')-1)."Unidad: ".$unidad->alias."- Kilometros:".$kilometro_total." -Litros:".$litros_total." -Rendimiento:".$rendimiento_unidad."<br>";

			$litros_total=0;



//redimiento_foranea_actual
			$filtro_unidad=array("cliente"=>$cliente,"kilometraje !="=>'',"consumidor"=>$unidad->alias,"mes"=>(date('m')));
			$transacciones=$this->datos_model->get_where('transacciones_foraneas','*','row_id','DESC',$filtro_unidad);
			//$transacciones=$this->datos_model->get_where_limit('transacciones','*','row_id','DESC',$filtro_unidad,'2');
			$inicial='';
			$final='';
			foreach ($transacciones as $transaccion) {
				if($inicial==0){
					$inicial=$transaccion->kilometraje;
				}else{
					$final=$transaccion->kilometraje;
				}

				$litros_total+=$transaccion->cantidad;
			}
			
			$kilometro_total=$inicial-$final;
			if($kilometro_total!='' && $kilometro_total!=''){
				$rendimiento_unidad=$kilometro_total/$litros_total;
			}else{
				$rendimiento_unidad=0;
			}
						
			$rendimiento_total_f_actual+=$rendimiento_unidad;
			
		//echo "Foraneas Mes".(date('m'))."Unidad: ".$unidad->alias."- Kilometros:".$kilometro_total." -Litros:".$litros_total." -Rendimiento:".$rendimiento_unidad."<br>";

			$litros_total=0;

			$encabezado=array("consumo_total"=>"$ ".number_format($consumo_total,'2','.',','),"consumo_anterior_m"=>number_format($consumo_mes_anterior_m,'2','.',','),"consumo_anterior_f"=>$consumo_mes_anterior_f,"consumo_actual_m"=>number_format($consumo_actual_m,'2','.',','),"consumo_actual_f"=>number_format($consumo_actual_f,'2','.',','),"rendimiento_anterior_m"=>number_format($rendimiento_total_m_anterior,'2','.',','),"rendimiento_actual_m"=>number_format($rendimiento_total_m_actual,'2','.',','),"rendimiento_anterior_f"=>number_format($rendimiento_total_f_anterior,'2','.',','),"rendimiento_actual_f"=>number_format($rendimiento_total_f_actual,'2','.',','));

			//consumo y rendimiento por unidad unidades por dia actual
			//echo $unidad->alias." ".date('Y-m-d')."<br>";	
			$consumo_m=$this->datos_model->suma('transacciones',array("fecha"=>date('Y-m-d'),"consumidor"=>$unidad->alias),'importe');
			$consumo_f=$this->datos_model->suma('transacciones_foraneas',array("fecha"=>date('Y-m-d'),"consumidor"=>$unidad->alias),'importe');	
			if($consumo_m>0){
				$i++;
				//rendimiento
				$filtro_unidad=array("cliente"=>$cliente,"kilometraje !="=>'',"consumidor"=>$unidad->alias);
				$transacciones=$this->datos_model->get_where_limit('transacciones','*','row_id','DESC',$filtro_unidad,'2');
				$inicial='';
				$final='';
				foreach ($transacciones as $transaccion) {
					if($inicial==''){
						$inicial=$transaccion->kilometraje;
					} else {
						$final=$transaccion->kilometraje;
					}
					//echo $unidad->kilometraje."<br>";	
				}
				$kilometro=$inicial-$final;
				$filtro_litros=array("cliente"=>$cliente,"consumidor"=>$unidad->alias);
				$litros=$this->datos_model->get_where_limit('transacciones','*','row_id','DESC',$filtro_litros,'1');
				foreach ($litros as $litro) {
					$total_litros=$litro->cantidad;
				}
				$rendimiento=number_format($kilometro/$total_litros,2,'.',',');
				$consumo_unidades[]=array("num_uni"=>$unidad->row_id,"nombre"=>$unidad->nombre,"alias"=>$unidad->alias,"consumo_m"=>$consumo_m,"consumo_f"=>number_format($consumo_f,2,'.',','),"rendimiento"=>number_format($rendimiento,2,'.',','));
			}	
		}
	}

	print_r($encabezado);
	echo "<hr>";
	print_r($consumo_unidades);

//consumo_mes_anterior
//consumo_actual
//rendimiento_mes_anterior
//rendimiento_actual
}
}