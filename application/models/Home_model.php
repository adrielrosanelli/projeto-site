<?php 

class Home_model extends CI_Model {

    const table = 'transacionador';

    public function get_all(){
        return $this->db->get(self::table)->result();
    }
}
