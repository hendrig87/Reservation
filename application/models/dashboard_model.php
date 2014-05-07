<?php

class dashboard_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }
    
public function add_new_room($room_type,$noOfRoom,$price,$description,$img_name, $hotel_id){
        $data = array(
            'room_name' => $room_type,
            'no_of_room'=> $noOfRoom,
            'price'=> $price,
            'description'=> $description,
            'image'=> $img_name,
            'hotel_id'=>$hotel_id);
        
         $this->db->insert('room_registration', $data);
    }
    
    function booking_room($hotel_id)
        {   
        $this->db->where('hotel_id', $hotel_id);
         $this->db->order_by("id", "desc");
            $query = $this->db->get('room_registration');
           
            return $query->result();
          
        }
        
        //======== find out total num. of rooms=====================//
        
        function total_room(){
            $this->db->select('room_name,no_of_room');
            $total_room = $this->db->get('room_registration');
            return $total_room->result();
        }
        
        //======== find out total num. of room booked======//
        
        function booked_room(){
            
            $this->db->select('room_type,no_of_room_booked');
            $booked_room = $this->db->get('booking_info');
            //var_dump($booked_room);
            return $booked_room->result();
        }
        
        //==================== find out total no. of available rooms===============================//
        
        function availableRoom($InDate,$OutDate)
        {
           $this->db->select_sum('no_of_room_booked'); 
           $this->db->where('check_in_date >=', $InDate);
            $this->db->where('check_out_date <=', $OutDate);
           $availableRoom = $this->db->get('booking_info');
           return $availableRoom->result();
        }

        public function findroom($id) {
        $this->db->select();
        $this->db->from('room_registration');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->result();
    }
    
    function updateRoom($id,$room_type,$noOfRoom,$price,$description,$img_name)
    {
        $data = array(
            'room_name' => $room_type,
            'no_of_room'=> $noOfRoom,
            'price'=> $price,
            'description'=> $description,
            'image'=> $img_name
                );
        
        $this->db->where('id', $id);
        $this->db->update('room_registration', $data);
    }
    
     public function deleteRoom($id) {

        $this->db->delete('room_registration', array('id' => $id));
    }
}