<?php

class Dbmodel extends CI_Model {

    public function __construct() {
        $this->load->database();
    }
    
    function validate($email, $pass) {
       
        $this->db->where('user_email', $email );
        $this->db->where('user_pass', md5($pass));
        $query = $this->db->get('user_info');
        
        if ($query->num_rows == 1) {
            return true;
        } else {
            return FALSE;
        }
    }
    
    function validate_user($email, $pass) {
    $password=md5($pass);
        $this->db->where('user_email',$email );
        $this->db->where('user_pass', $password);
        
        $query = $this->db->get('user_info');
        return $query->result();
    }
    
    public function check_user($email, $uname){
        $this->db->where('user_email', $email );
        $this->db->or_where('user_name', $uname);
        $query = $this->db->get('user_info');
        return $query->result();
    }
    
    public function get_logged_in_user($email, $pass){
       $this->db->where('user_email', $email );
        $this->db->where('user_pass', md5($pass));
        $query = $this->db->get('user_info');
        return $query->result();
        
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
     public function update_registered_user_status($user_email, $loginStatus){
        $data = array(
            'login_status'=>$loginStatus);
        $this->db->where('user_email', $user_email);
         $this->db->set('last_login_date', 'NOW()', FALSE);
        $this->db->update('user_info', $data);
    }
    
    public function update_loggedOut_user_status($user_email, $loginStatus){
        $data = array(
            'login_status'=>$loginStatus
           );
        $this->db->where('user_email', $user_email);
         $this->db->set('last_login_date', 'NOW()', FALSE);
        $this->db->update('user_info', $data);
    }
    
    
    public function update_LoggedIn_user_status($user_email, $loginStatus){
         $data = array(
            'login_status'=>$loginStatus
           );
        $this->db->where('user_email', $user_email);
        $this->db->set('last_login_date', 'NOW()', FALSE);
        $this->db->update('user_info', $data);
    }
    public function update_user_password($email, $userPassword){
        $token = " ";
        $data = array(
        'user_pass'=>md5($userPassword),
            'user_auth_key'=>$token);
        $this->db->where('user_email', $email);
        $this->db->update('user_info', $data);
    }
    
    
    function find_user_auth_key($token) {       
        $this->db->where('user_auth_key', $token ); 
        $query = $this->db->get('user_info');
        return $query->result();
    }  
    
    
    public function get_user_email($a) {  
        $this->db->select('user_email,user_auth_key');
        $this->db->where('user_auth_key', $a );
         
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
 
  public function get_user_info($useremail){
      $this->db->where('user_email', $useremail);
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
 public function room_info($hotel_id){
        $this->db->where('hotel_id', $hotel_id);
        $query = $this->db->get('room_registration');
        return $query->result();
 }
 public function get_booking_person_info($room_id){
      $this->db->where('room_id', $room_id);
        $query = $this->db->get('personal_info');
        return $query->result();
 }
 public function get_booked_room_info($person_id){
      $this->db->where('personal_info_id', $person_id);
        $query = $this->db->get('booking_info');
        return $query->result();
 }
 
 public function get_current_user($useremail){
      $this->db->where('user_email', $useremail);
        $query = $this->db->get('user_info');
        return $query->result();
 }
 public function get_current_hotel($hotel_name){
      $this->db->where('name', $hotel_name);
        $query = $this->db->get('hotel_info');
        return $query->result();
 }
 public function get_current_hotel_by_id($hotel_id){
      $this->db->where('id', $hotel_id);
        $query = $this->db->get('hotel_info');
        return $query->result();
 }
 
 function count_page($hid)
 {
    
     $per_page = 9;
if($hid==0){
  //$sql = "select * from booking_info"; 
  $result = $this->db->get('booking_info');
  $count = $this->db->count_all_results();
  //redirect('dashboard/bookingInfo');
}
else{
//$sql = "select * from booking_info where hotel_id=".$hid;
    
           $this->db->where('hotel_id',$hid);
           $result = $this->db->get('booking_info');
           $count = $this->db->count_all_results();
           
          
}
//$sql = "select * from booking_info where hotel_id=".$hid;
//$result = mysql_query($sql);
//$count = mysql_num_rows($result);
//$count = $this->db->count_all_results();
 //var_dump($count);
 //          die('');
//$pages = $this->db->ceil($count/$per_page);
//$pages = $count/$per_page;
//var_dump($pages);
//die('');
return $count->result();
 }
 
 }