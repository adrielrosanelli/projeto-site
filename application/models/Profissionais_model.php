<?php 

class Profissionais_model extends CI_Model {

    const table = 'transacionador';

    public function get_all(){
        return $this->db->get(self::table)->result();
    }

    public function insert($fields){
        $this->db->insert(self::table,$fields);
        $this->db->last_query();
        return $this->db->insert_id();
    }

    
}
