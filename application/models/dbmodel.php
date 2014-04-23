<?php

class Dbmodel extends CI_Model {

    public function __construct() {
        $this->load->database();
    }
    
    function validate() {
        $this->db->where('user_name', $this->input->post('username'));
        $this->db->where('user_pass', md5($this->input->post('password')));
        $query = $this->db->get('user_info');

        if ($query->num_rows == 1) {
            return true;
        } else {
            return FALSE;
        }
    }
    
    
    public function add_new_user($user_name, $userfname, $userlname, $useremail, $userpass){
        $data = array(
            'user_name' => $user_name,
            'user_fname'=> $userfname,
            'user_lname'=> $userlname,
            'user_email'=> $useremail,
            'user_pass'=> $userpass);
        
         $this->db->insert('user_info', $data);
    }
    
 
    
 }