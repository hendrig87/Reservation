<?php

class user_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }
    
     public function get_all_users()
    { 
        $query = $this->db->get('user_info');
        return $query->result();
    }
    
    public function delete_user($id) {

        $this->db->delete('user_info', array('id' => $id));
    }
    
    
    
}