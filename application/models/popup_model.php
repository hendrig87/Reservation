<?php
 
class popup_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }
    
    public function popup_insert($jsonArray)    // inserting the updated json data
    {
     
        $this->db->insert_batch('booking_info', $data);
    }
}