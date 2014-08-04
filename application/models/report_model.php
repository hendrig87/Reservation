<?php

class report_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }
    
    function get_chart_data() {
       
      $query = $this->db->get('chart_data_test');
        return $query->result();
    }
    
    
}

