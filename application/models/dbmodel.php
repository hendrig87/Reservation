<?php

class Dbmodel extends CI_Model {

    public function __construct() {
        $this->load->database();
    }
    
    function validate() {
       
        $this->db->where('user_email', $this->input->post('userEmail') );
        $this->db->where('user_pass', md5($this->input->post('userPass')) );
        $query = $this->db->get('user_info');
       // print_r($query);
        if ($query->num_rows == 1) {
            return true;
        } else {
            return FALSE;
        }
    }
    
    
    public function add_new_user($user_name, $userfname, $userlname, $useremail, $userpass, $loginStatus,$loginDate){
        $data = array(
            'user_name' => $user_name,
            'user_fname'=> $userfname,
            'user_lname'=> $userlname,
            'user_email'=> $useremail,
            'user_pass'=> $userpass,
            'login_status'=> $loginStatus,
            'last_login_date'=> $loginDate);
        
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
     public function update_registered_user_status($user_id, $loginStatus){
        $data = array(
            'login_status'=>$loginStatus);
        $this->db->where('login_status', $user_id);
         $this->db->set('last_login_date', 'NOW()', FALSE);
        $this->db->update('user_info', $data);
    }
    
    public function update_loggedOut_user_status($user_id, $loginStatus){
        $data = array(
            'login_status'=>$loginStatus
           );
        $this->db->where('login_status', $user_id);
         $this->db->set('last_login_date', 'NOW()', FALSE);
        $this->db->update('user_info', $data);
    }
    
    
    public function update_LoggedIn_user_status($user_id, $loginStatus){
         $data = array(
            'login_status'=>$loginStatus
           );
        $this->db->where('login_status', $user_id);
        $this->db->set('last_login_date', 'NOW()', FALSE);
        $this->db->update('user_info', $data);
    }
    public function update_user_password($token, $userPassword){
        $data = array(
        'user_pass'=>md5($userPassword));
        $this->db->where('user_email', $token);
        $this->db->update('user_info', $data);
    }
    
    
    function find_user_auth_key($token) {       
        $this->db->where('user_auth_key', $token ); 
        $query = $this->db->get('user_info');
        return $query->result();
    }  
    
    
    public function get_user_email($a) {  
        $this->db->select('user_email');
        $this->db->where('user_auth_key', $a );
         $data = array(
            'user_auth_key'=> " ");
        
        $this->db->update('user_info', $data);
        $query = $this->db->get('user_info');
        return $query->result();
    } 
    
    function update_user_token($token){
        $data = array(
            'user_auth_key'=> " ");
        $this->db->where('user_auth_key', $token);
        $this->db->update('user_info', $data);
    }
    
 public function get_all_users(){
      $query = $this->db->get('user_info');
        return $query->result();
 }
 
  public function get_user_info($username){
      $this->db->where('user_email', $username);
        $query = $this->db->get('user_info');
        return $query->result();
 }
 
 public function add_new_hotel($hotel_name, $address, $contact, $user_id){
     $data = array(
            'name' => $hotel_name,
            'address'=> $address,
            'contact'=> $contact,
            'user_id'=> $user_id);
        
         $this->db->insert('hotel_info', $data);
 }
 
 public function get_user_hotel($user_id){
     $this->db->where('user_id', $user_id);
        $query = $this->db->get('hotel_info');
        return $query->result();
     
 }
 
 
 
 
 }