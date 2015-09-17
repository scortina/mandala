<?php
class Sucursales_model extends CI_Model {
 
    /**
    * Responsable for auto load the database
    * @return void
    */
      public function __construct()
    {
        $this->load->database();
    }

    /**
    * Get all sucursales
    * @return void
    */
    public function get_all_sucursales()
    {
	    
		$this->db->select('row_id, marca');
		$this->db->from('sucursales');
		$query = $this->db->get();
		
		return $query->result();
    }

}
?>