<?php
class Facturas_model extends CI_Model {
 
    /**
    * Responsable for auto load the database
    * @return void
    */
    public function __construct()
    {
        $this->load->database();
    }

    /**
    * Get facturas by his is
    * @param int $cliente, $fecha, $registro
    * @return dato
    */
    public function get_factura_by_datos($cliente_id, $fecha, $registro)
    {
		$this->db->select('row_id');
		$this->db->from('facturas');
		$this->db->where('id_cliente', $cliente_id);
        $this->db->where('fecha_creacion', $fecha);
        $this->db->where('registrado_por', $registro);
		$query = $this->db->get();
		return $query->result(); 
    }
}