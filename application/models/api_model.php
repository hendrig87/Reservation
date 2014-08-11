<?php

class Api_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }
    
    function add_new_api($key, $apiName, $user_id) {
       
       $data = array(
            'id' => $key,
            'api_name'=> $apiName,
            'user_id'=> $user_id);
        
         $this->db->insert('app_info', $data);
    }
    function add_new_code_user($apiName, $api, $hotelId, $template,$payment, $a, $user_id)
    {
        
        $data = array(
            'title'=>$apiName,
            'api_id'=>$api,
            'hotel_id'=>$hotelId,
            'template_id'=>$template,
            'payment_info'=>$payment,
            'code'=>$a,
            'user_id'=>$user_id);
         $this->db->insert('code_info', $data);
    }


    public function get_all_app_by_user($user_id)
    {
         $this->db->where('user_id', $user_id);
        $query = $this->db->get('app_info');
        return $query->result();
    }
    
    public function find_api($id) {
        $this->db->from('app_info');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->result();
    }
    
    public function update_api($api_name, $id)
    {
         $data = array(
            'api_name' => $api_name);

        $this->db->where('id', $id);
        $this->db->update('app_info', $data);
    }
    public function delete_api($id) {

        $this->db->delete('app_info', array('id' => $id));
    }
    
    public function get_user_hotel($user_id){
     $this->db->where('user_id', $user_id);
        $query = $this->db->get('hotel_info');
        return $query->result();
     
 }
    
    public function get_user_api($user_id){
     $this->db->where('user_id', $user_id);
        $query = $this->db->get('app_info');
        return $query->result();
     
 }
 public function get_api_detail( $apiName, $api)
 {
     $this->db->where('title', $apiName);
     $this->db->where('api_id', $api);
     $query = $this->db->get('code_info');
        return $query->result();
     
 }
 
 public function get_code_info($hotelId, $title)
 {
      $this->db->where('title', $title);
     $this->db->where('hotel_id', $hotelId);
     $query = $this->db->get('code_info');
        return $query->result();
 }
 
 public function get_all_code_by_user($user_id)
 {
        $this->db->where('user_id', $user_id);
        $query = $this->db->get('code_info');
        return $query->result();
 }
 
 
    
}
