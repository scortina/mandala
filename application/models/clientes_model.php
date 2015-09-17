<?php

class Clientes_model extends CI_Model {
	/**
    * Get all Clients from database
    * 
    */
    function GetClients(){
    	$this->db->select('nombre, row_id');
		$this->db->from('clientes');
    	$query = $this->db->get();
    	return $query->result();
    }

    function GetAllDataClients($id){
    	$this->db->select('nombre, row_id, razon_social, rfc, calle');
		$this->db->from('clientes');
		$this->db->where('row_id', $id);
    	$query = $this->db->get();
    	return $query->result();
    }
}

?>