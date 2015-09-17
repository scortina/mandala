<?php
class datos_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

    public function get_datos($tabla=null,$campos=null,$ordenar=null,$orden=null){
    	$query=$this->db
                    	->select($campos)
                		->from($tabla)
                		->order_by($ordenar,$orden)
                		->get();
    	return $query->result();
    }

    public function get_dato_where($tabla=null,$campos=null,$filtro=null){
        $query=$this->db
                        ->select($campos)
                        ->from($tabla)
                        ->where($filtro)
                        ->get();
        return $query->row();
    }
    public function get_where($tabla=null,$campos=null,$ordenar=null,$orden=null,$filtro=null){
            $query=$this->db
                            ->select($campos)
                            ->from($tabla)
                            ->where($filtro)
                            ->order_by($ordenar,$orden)
                           ->get();
       return $query->result();
    }
public function get_where_limit($tabla=null,$campos=null,$ordenar=null,$orden=null,$filtro=null,$limit=null){
            $query=$this->db
                            ->select($campos)
                            ->from($tabla)
                            ->where($filtro)
                            ->order_by($ordenar,$orden)
                            ->limit($limit)
                           ->get();
       return $query->result();
    }


    public function get_like($tabla=null,$campos=null,$ordenar=null,$orden=null,$filtro=null){
        $query=$this->db
                            ->select($campos)
                            ->from($tabla)
                            ->like($filtro)
                            ->order_by($ordenar,$orden)
                            ->get();
     
        return $query->result();
    }


    public function add_datos($tabla,$datos=array()){
        $query=$this->db->insert($tabla,$datos);
        return true;
       //$this->db->insert_id();//ultimo id
    }

     public function edit_datos($tabla,$datos=array(),$id){
        $this->db->where('id',$id);
        $this->db->update($tabla,$datos);
        return true;
    }

     public function del_datos($tabla,$id){
        $this->db->where('id',$id);
        $this->db->delete($tabla);
    }

    public function contar($tabla,$filtro=array()){
        $this->db->select('*');
        $this->db->from($tabla);
        $this->db->where($filtro);
        return $this->db->count_all_results();
        
    }
     public function suma($tabla,$filtro=array(),$campo_sumar){
        $var=0;
        $query=$this->db
                        ->select('*')
                        ->from($tabla)
                        ->where($filtro)
                        ->get();
       foreach ($query->result() as $sumar) {
            $var=$var+$sumar->$campo_sumar;
        } 
        return $var;
            
    }



    

    public function get_paginacion($pagina,$x_pagina,$do){
        switch($do){
            case'limit':
                $query=$this->db
                ->select('id','nombre','usuario')
                ->from('usuarios')
                ->limit($x_pagina,$pagina)
                ->get();
                return $query->result();
            break;
            case 'cuantos';
                $query=$this->db
                ->select('id','nombre','usuario')
                ->from('usuarios')
                ->count_all_results();
                return $query;
            break;
        }
    }



}
?>