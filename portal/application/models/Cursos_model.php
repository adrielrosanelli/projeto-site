<?php

class Cursos_model extends CI_Model{
	public function get(){
		$query = $this->db->get('cursos');
		echo $this->db->last_query(); //Exibe a ultima query que foi executada
		return $query->result();
	}
	public function getWhere($where){
		$this->db->where($where);
		return $this->db->get('cursos')->row();
	}
}
