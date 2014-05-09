<?php


class booking_room extends CI_Model {

    public function __construct() {
        $this->load->database();
    }
    
    
     public function findhotel($id) {
        $this->db->select();
        $this->db->from('user_info');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->result();
    }
    
   
    
}