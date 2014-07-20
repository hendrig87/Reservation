<?php


class searchdb extends CI_Model {

    public function __construct() {
        $this->load->database();
    }
    
    function search($value){
        $this->db->like('name', $value);
       $result = $this->db->get('hotel_info');
       
       return $result->result();
        
        
        
    }
} ?>