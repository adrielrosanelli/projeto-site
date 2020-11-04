<?php 

class Profissionais_model extends CI_Model {
    public function get(){
        $query = $this->db->get('profissional');
        $this->db->last_query();
        return $query->result();
    }
    public function getWere($where){
        $this->db->where($where);
        return $this->db->get('profissional')->row();
    }
}