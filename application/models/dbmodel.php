<?php

class Dbmodel extends CI_Model {

    public function __construct() {
        $this->load->database();
    }
    
    function validate($email, $pass) {
        $this->db->where('user_email',$email );
        $this->db->where('user_pass',$pass );
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
    
     public function get_selected_user($useremail){
       $this->db->where('user_email', $useremail );
        $query = $this->db->get('user_info');
        return $query->result();
    }
    public function update_emailed_user($to, $token){
        $data = array(
            'user_auth_key'=>$token);
        $this->db->where('user_email', $to);
        $this->db->update('user_info', $data);
    }
    public function update_user_password($token, $userPassword){
        $data = array(
            'user_pass'=> md5($userPassword));
        $this->db->where('user_auth_key', $token);
        $this->db->update('user_info', $data);
    }
    function find_user_auth_key($token) {       
        $this->db->where('user_auth_key', $token );
        
        $query = $this->db->get('user_info');
        return $query->result();
    }  
    
    function update_user_token($token){
        $data = array(
            'user_auth_key'=> " ");
        $this->db->where('user_auth_key', $token);
        $this->db->update('user_info', $data);
    }
    
 
    
 }