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
    
    function get_check_In_Out_date($first,$second)
    {
        

    }
    
    function check_available_room(){
        $ci=& get_instance();
       $ci->load-db('dashboard_model');
         $availableRoom = $ci->dashboard_model->availableRoom($first,$second);
         get_available_rooms($data);
         foreach ($availableRoom as $rooms){
        $roomAvailable =  $rooms->no_of_rooms_booked;
        }
        $available_room = $roomTotal - $roomAvailable;
       
          echo'<select class="available-room" style="width: 80px;" id="roomToBook">
                            <option value="0">Select</option>
                            <?php
                            for ($i = 1; $i <= $available_room; $i++) {
                                echo "<option value=" . $i . ">" . $i . "</option>";
                            }
                            ?>

                        </select>';
    }

?>
