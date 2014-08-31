<?php
function get_available_rooms($data)
    {
           // echo '<span class="roomType">'.$data.'</span>';
            $ci=& get_instance();
            $ci->load-db('dashboard_model');
        $total_room = $ci->dashboard_model->total_room($data);
        
        foreach ($total_room as $troom){
   // echo $troom->room_name." = ". $troom->no_of_room."<br/>";
    $roomTotal = $troom->no_of_room;
            
            
    }
    }
    
   // function get_no_of_room(){
    //    $this->load-db('dashboard_model');
    //    $total_room = $this->dashboard_model->total_room();
        
    //    foreach ($total_room as $troom){
   // echo $troom->room_name." = ". $troom->no_of_room."<br/>";
   // $roomTotal = $troom->no_of_room;
//}
  //  }
  
    function check_available_room($first,$second,$r_type){
        $ci=& get_instance();
       $ci->load->database();
         $availableRoom = $ci->dashboard_model->havailableRoom($first,$second,$r_type);
         $total_room = $ci->dashboard_model->htotal_room($r_type);
         
         foreach ($total_room as $troom){
  
             $roomTotal = $troom->no_of_room;
            }
         
         foreach ($availableRoom as $rooms){
        $roomAvailable =  $rooms->no_of_rooms_booked;
        }
        $available_room = $roomTotal - $roomAvailable;
        $middata="";
        
       $predata = '<select class="available-room" style="width: 80px;" id="roomToBook"><option value="0">Select</option>';
                                       
                            for ($i = 1; $i <= $available_room; $i++)
                            {
                                
                            $middata =$middata.'<option value=' . $i . '>' . $i . '</option>';                                    
                               }
                               $postdata = '</select>';
                      $totalview= $predata.$middata.$postdata;
                      echo $totalview;                               
    }
    
     function check_available_room_with_data($first,$second,$r_type, $noOfRooms){
        $ci=& get_instance();
       $ci->load->database();
         $availableRoom = $ci->dashboard_model->havailableRoom($first,$second,$r_type);
         $total_room = $ci->dashboard_model->htotal_room($r_type);
         
         foreach ($total_room as $troom){
  
             $roomTotal = $troom->no_of_room;
            }
         
         foreach ($availableRoom as $rooms){
        $roomAvailable =  $rooms->no_of_rooms_booked;
        }
        $available_room = $roomTotal - $roomAvailable + $noOfRooms;
        $middata="";
        
       $predata = '<select class="available-room" style="width: 80px;" id="roomToBook"><option value="0">Select</option>';
                                       
                            for ($i = 1; $i <= $available_room; $i++)
                            {
                                
                            $middata =$middata.'<option value=' . $i . '>' . $i . '</option>';                                    
                               }
                               $postdata = '</select>';
                      $totalview= $predata.$middata.$postdata;
                      echo $totalview;                               
    }
    
     function calculate_sum($noOfRooms,  $price){
        
        
       $predata = '<span>Rs.</span> <span class="subTotal">'.$noOfRooms*$price.'</span>';
                      $totalview= $predata;
                      echo $totalview;                               
    }
    

?>
