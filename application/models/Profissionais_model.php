<?php 

class Profissionais_model extends CI_Model {

    const table = 'transacionador';

    public function get_all(){
        return $this->db->get(self::table)->result();
    }

    public function delete($where){
        $this->db->where($where);
        $this->db->delete(self::table);
        return $this->db->affected_rows();
    }

    public function insert($fields){
        $this->db->insert(self::table,$fields);
        return $this->db->insert_id();
    }
    public function get_where($where){
        $this->db->where($where);
        return $this->db->get(self::table)->row();
    }

    public function update($id,$fields){
        $this->db->where(array('id'=>$id));
        $this->db->update(self::table,$fields);
        return $this->db->affected_rows();
    }

    // public function get(){
    //     $query = $this->db->get('transacionador');
    //     $this->db->last_query();
    //     return $query->result();
    // }
    // public function getWhere($where){
    //     $this->db->where($where);
    //     return $this->db->get('transacionador')->row();
    // }
}