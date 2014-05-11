<?php


class searchdb extends CI_Model {

    public function __construct() {
        $this->load->database();
    }
    
    function search($value){
        
        //$result = mysql_query("SELECT name FROM hotel_info WHERE name LIKE '%".$userPart."%'") or die(mysql_error());
        //die($value);
        $this->db->like('name', $value);
       $result = $this->db->get('hotel_info');
       
       return $result->result();
        
        
        
    }
} ?>