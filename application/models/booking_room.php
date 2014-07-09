<?php


class booking_room extends CI_Model {

    public function __construct() {
        $this->load->database();
    }
    
    
     public function findhotel($id) {
        $this->db->select();
        $this->db->from('user_info');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->result();
    }
    
    
    //insertion of booking inforamtion of personalinfo
    
   public function personal_info($fullName,$address,$occupation,$nationality,$contactNo,$email,$remarks,$totalPrice,$child_s,$adult_s, $bookId)
    {
        
       
         $data = array(
            'full_name'=>$fullName,
            'address'=>$address,
            'occupation'=>$occupation,
            'nationality'=>$nationality,
            'contact_no'=>$contactNo,
            'email'=>$email,
            'remarks'=>$remarks,
            'total_amount'=>$totalPrice,
             'booking_id'=>$bookId,
            'child'=>$child_s,
            'adult'=>$adult_s);
        
         $this->db->insert('personal_info', $data);
         
         
    }
    
    public function get_biiking_id()
    {
     $this->db->order_by('booking_id','DESC');
     $query = $this->db->get('personal_info', 1);
       return $query->result();
    }
    
    
    
}