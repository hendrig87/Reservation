<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class dashboard extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('dbmodel');
        $this->load->model('dashboard_model');
        $this->load->helper('url');
        $this->load->helper(array('form', 'url'));
        $this->load->library("pagination");
    }

    public function index() {
        if ($this->session->userdata('logged_in')) {

            $useremail = $this->session->userdata('useremail');
            $user = $this->dbmodel->get_user_info($useremail);
            foreach ($user as $id) {
                $user_id = $id->id;
            }
            $data['hotelName'] = $this->dbmodel->get_user_hotel($user_id);

            $this->load->view('template/header');
            $this->load->view("dashboard/reservationSystem");

            $this->load->view("dashboard/addNewRoom", $data);

            $this->load->view('template/footer');
        } else {

            redirect('login', 'refresh');
        }
    }

    function addNewRoomForm() {
        if ($this->session->userdata('logged_in')) {

            $useremail = $this->session->userdata('useremail');
            $user = $this->dbmodel->get_user_info($useremail);
            foreach ($user as $id) {
                $user_id = $id->id;
            }

            $data['hotelName'] = $this->dbmodel->get_user_hotel($user_id);

            $this->load->view('template/header');
            $this->load->view("dashboard/reservationSystem");

            $this->load->view("dashboard/addNewRoom", $data);

            $this->load->view('template/footer');
        } else {
            redirect('login', 'refresh');
        }
    }

    function addRoom() {
        if ($this->session->userdata('logged_in')) {
            $useremail = $this->session->userdata('useremail');
            $user = $this->dbmodel->get_user_info($useremail);
            foreach ($user as $id) {
                $user_id = $id->id;
            }

            $data['hotelName'] = $this->dbmodel->get_user_hotel($user_id);


            $this->load->library('upload');
            $this->load->library('form_validation');

            $this->form_validation->set_rules('room_type', 'Room Type', 'trim|regex_match[/^[a-z,0-9,A-Z_ ]{5,35}$/]|required|xss_clean');
            $this->form_validation->set_rules('price', 'Price', 'trim|regex_match[/^[0-9]{3,5}$/]|required|xss_clean');
            $this->form_validation->set_rules('description', 'Description', 'trim|regex_match[/^[A-Za-z0-9\-\\,._ ]{2,35}$/]|required|xss_clean');
            $this->form_validation->set_rules('selectHotel', 'Price', 'trim|required|xss_clean');

            if ($this->form_validation->run() == FALSE) {
                $this->load->view('template/header');
                $this->load->view("dashboard/reservationSystem");

                $this->load->view("dashboard/addNewRoom", $data);

                $this->load->view('template/footer');
            } else {
                if (($_SERVER['REQUEST_METHOD'] == 'POST')) {
                    $hotel_id = $_POST['selectHotel'];
                }
                if (!empty($_FILES['room_img']['name'])) {
                    // Specify configuration for File 1
                    $config['upload_path'] = 'uploads/';
                    $config['allowed_types'] = 'gif|jpg|png';


                    // Initialize config for File 1
                    $this->upload->initialize($config);

                    // Upload file 1
                    if ($this->upload->do_upload('room_img')) {
                        $data = $this->upload->data();
                        $img_name = $data['file_name'];
                    } else {
                        echo $this->upload->display_errors();
                    }
                }

                // $this->session->set_flashdata('mess', 'Fill up the required field');
                elseif (empty($img_name)) {
                    $img_name = "";
                }


                $room_type = $this->input->post('room_type');
                $noOfRoom = $this->input->post('noOfRoom');
                $price = $this->input->post('price');
                $description = $this->input->post('description');
                
                if($hotel_id=="0" || $hotel_id=="")
                {
                    $data['error'] = "Please select hotel";
                     $this->load->view('template/header');
                $this->load->view("dashboard/reservationSystem");

                $this->load->view("dashboard/addNewRoom", $data);

                $this->load->view('template/footer');
                }
                else
                {
                   
               
                $data['add_room'] = $this->dashboard_model->add_new_room($room_type, $noOfRoom, $price, $description, $img_name, $hotel_id, $user_id);

              $this->addNewRoomEmail($useremail, $room_type, $hotel_id);
                    $this->session->set_flashdata('message', 'Data sucessfully Added');
                redirect('dashboard/roomInfo', 'refresh');
            }}
        } else {
            redirect('login', 'refresh');
        }
    }

    public function addNewRoomEmail($username, $room_type, $hotel_id) {
        $user = $this->dbmodel->get_current_user($username);
        $hotel = $this->dbmodel->get_current_hotel_by_id($hotel_id);
        if (!empty($user)) {
            foreach ($user as $data) {
                $username = $data->user_name;
                $useremail = $data->user_email;
            }
        }
        if (!empty($hotel)) {
            foreach ($hotel as $data) {
                $hotelname = $data->name;
            }
        }

        $this->load->helper('send_email_helper');
        $subject = "Room Addition Successful";
        $imglink = base_url() . "contents/images/ParkReserve.png";
        $message = room_add_email($username, $imglink, $hotelname, $room_type);


        send_room_add_email($useremail, $subject, $message);
    }

    public function get_hotel_id() {
        if ($this->session->userdata('logged_in')) {
            $useremail = $this->session->userdata('useremail');
            $user = $this->dbmodel->get_user_info($useremail);
            foreach ($user as $id) {
                $user_id = $id->id;
            }
            $hotel_id = $_POST['id'];
          
         $data['hotelName'] = $this->dbmodel->get_user_hotel($user_id);
         /*for pagination*/
            $config = array();
        $config["base_url"] = base_url() . "index.php/dashboard/roomInfo";
          if($hotel_id!=0){$config["total_rows"] = $this->dashboard_model->record_count_all_room_registration($hotel_id);}
          else{$config["total_rows"] = $this->dashboard_model->record_count_all_room_registration($user_id);}
        $config["per_page"] = 8;
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
       
        $config["num_links"] = $config["total_rows"] / $config["per_page"];
        $config['full_tag_open'] = '<ul class="tsc_pagination tsc_paginationA tsc_paginationA01">';
        $config['full_tag_close'] = '</ul>';
        $config['prev_link'] = 'First';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = 'Next';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="current"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['first_link'] = '&lt;&lt;';
        $config['last_link'] = '&gt;&gt;';
        $this->pagination->initialize($config);
        /* pagination ends here */
        $config['display_pages'] = FALSE;
             $data["links"] = $this->pagination->create_links();
             
            $hotel_id = $_POST['id'];
            if($hotel_id!=0){
                
            $data['query'] = $this->dashboard_model->get_all_rooms_by_hotel($config["per_page"], $page, $hotel_id);
        }
        else
        {        
             $data['query'] = $this->dashboard_model->get_all_rooms($config["per_page"], $page, $user_id);
        }
     
        $this->load->view('dashboard/roomInformation', $data);
} else {
            redirect('login', 'refresh');
        }
    }

    public function roomInfo() {
        if ($this->session->userdata('logged_in')) {
            $useremail = $this->session->userdata('useremail');
            $user = $this->dbmodel->get_user_info($useremail);
            foreach ($user as $id) {
                $user_id = $id->id;
            }
           
             $data['hotelName'] = $this->dbmodel->get_user_hotel($user_id);
            
                
/*for pagination*/
            $config = array();
        $config["base_url"] = base_url() . "index.php/dashboard/roomInfo";
        $config["total_rows"] = $this->dashboard_model->record_count_all_room_registration($user_id);
        $config["per_page"] = 8;
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
       
        $config["num_links"] = $config["total_rows"] / $config["per_page"];
        $config['full_tag_open'] = '<ul class="tsc_pagination tsc_paginationA tsc_paginationA01">';
        $config['full_tag_close'] = '</ul>';
        $config['prev_link'] = 'First';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = 'Next';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="current"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['first_link'] = '&lt;&lt;';
        $config['last_link'] = '&gt;&gt;';
        $this->pagination->initialize($config);
        /* pagination ends here */
           
          
             $data['query'] = $this->dashboard_model->get_all_rooms($config["per_page"], $page, $user_id);
            
             $config['display_pages'] = FALSE;
             $data["links"] = $this->pagination->create_links();
            $this->load->view('template/header');
            $this->load->view('dashboard/reservationSystem');
            $this->load->view('dashboard/hotelSelection', $data);
            //$this->load->view('dashboard/roomInformation', $data);

            $this->load->view('template/footer');
        } else {
            redirect('login', 'refresh');
        }
    }

    function edit($id) {
        if ($this->session->userdata('logged_in')) {
            $data['username'] = Array($this->session->userdata('logged_in'));
            $data['query'] = $this->dashboard_model->findroom($id);


            //die($data['query']);
            $this->load->view('template/header');
            $this->load->view('dashboard/reservationSystem', $data);
            $this->load->view('dashboard/editRoomInfo', $data);

            $this->load->view('template/footer', $data);
        } else {
            redirect('login', 'refresh');
        }
    }
    
                function update() {
        if ($this->session->userdata('logged_in')) {
            $data['username'] = Array($this->session->userdata('logged_in'));
            $this->load->library('upload');

            if (!empty($_FILES['room_img']['name'])) {

                $config['upload_path'] = 'uploads/';
                $config['allowed_types'] = 'gif|jpg|png';



                $this->upload->initialize($config);


                if ($this->upload->do_upload('room_img')) {
                    $data = $this->upload->data();
                    $img_name = $data['file_name'];
                } else {
                    echo $this->upload->display_errors();
                }
            }
            if (empty($img_name)) {
                echo "";
            }

            $id = $this->input->post('id');
            $room_type = $this->input->post('room_type');
            $noOfRoom = $this->input->post('noOfRoom');
            $price = $this->input->post('price');
            $description = $this->input->post('description');




            $data['add_room'] = $this->dashboard_model->updateRoom($id, $room_type, $noOfRoom, $price, $description, $img_name);

            if ($data) {
                $this->session->set_flashdata('message', 'Data sucessfully Added');
            } else {
                $this->session->set_flashdata('mess', 'Fill up the required field');
            }


            $this->load->library('session');


            redirect('dashboard/roomInfo', 'refresh');
        } else {
            redirect('login', 'refresh');
        }
    }

    public function delete($id) {
        if ($this->session->userdata('logged_in')) {
            $data['username'] = Array($this->session->userdata('logged_in'));
            $this->dashboard_model->deleteRoom($id);
            $this->session->set_flashdata('message', 'Data Deleted Sucessfully');
            redirect('dashboard/roomInfo', 'refresh');
        } else {
            redirect('login', 'refresh');
        }
    }

    public function calender($year=NULL, $month=NULL) {
          if ($this->session->userdata('logged_in')) {
            $useremail = $this->session->userdata('useremail');
            $user = $this->dbmodel->get_user_info($useremail);
            foreach ($user as $id) {
                $user_id = $id->id;
            }    
     if (!$year) {
                $year = date('Y');
            }
    if (!$month) {
            $month = date('m');
            }  
 
        $data['mthBooking'] = $this->dashboard_model->get_booking_info_this_month($user_id, $year, $month);
        $data['mthEvents'] = $this->dashboard_model->get_event_info_this_month($year, $month);
        $data['months']= array($year, $month);
        $this->load->helper('date_helper');

        $this->load->view('template/header');
        $this->load->view('dashboard/reservationSystem');
        $this->load->view('template/calendar', $data);
        $this->load->view('template/footer');
            }
     else {
            redirect('login', 'refresh');
        }        
   
    }
    
    public function getBookingDetails()
    {
     $id = $_POST['book'];
     $day = $_POST['day'];
     $monthyr = $_POST['monYr'];
     $book = $this->dashboard_model->get_booking_personal_info_by_booking_id($id);
     foreach($book as $booker)
     {
         $name= $booker->full_name;
         $address= $booker->address;
         $contactNo = $booker->contact_no;
         $child = $booker->child;
         $adult = $booker->adult;
     }
     $booking = $this->dashboard_model->get_booking_info_by_booking_id($id);
     foreach ($booking as $books)
     {
         $bookId = $books->id;
         $from = $books->check_in_date;
         $to = $books->check_out_date;
     }
     $room = $this->dashboard_model->get_booked_room_info_by_booking_id($id);
     $array= array();
     foreach ($room as $rooms)
     {
         $roomName= $rooms->room_type;
         $roomNo = $rooms->no_of_rooms_booked;
         $roomDet = $roomName.'->'.$roomNo.' room/s';
         array_push($array, $roomDet);
     }
     
  $editUrl= base_url().'index.php/dashboard/editBooking/'.$bookId;
  $deleteUrl = base_url().'index.php/dashboard/deleteBooking/'.$bookId;
    $view= '<h4 style="margin:0px; float:left; color:#0092b4;">'.$day.'-'.$monthyr.'</h4><div style="clear:both;"></div><h3 style="margin:5px;"> Name: '.$name.'</h3><p style="margin:5px;">'.$from.' to '.$to.'<br/>Address: '.$address.'<br/>Conatct No: '.$contactNo.'<br/>Adults: '.$adult.'<br/>Childs: '.$child.'<br/>Rooms: '.implode('<br/>',$array).'</p>'
            . '<a href="'.$editUrl.'">Edit entry</a>'.'<a style="float:right;" href="'.$deleteUrl.'">Delete entry</a>';
        echo $view;
    }




    public function bookingInfo() {
        if ($this->session->userdata('logged_in')) {
           
            $useremail = $this->session->userdata('useremail');
            $user = $this->dbmodel->get_user_info($useremail);
            foreach ($user as $id) {
                $user_id = $id->id;
            }
/*for pagination*/
            $config = array();
        $config["base_url"] = base_url() . "index.php/dashboard/bookingInfo";
        $config["total_rows"] = $this->dashboard_model->record_count_all_booking_info($user_id);

        $config["per_page"] = 2;

        $config["per_page"] = 10;

        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
       
        $config["num_links"] = $config["total_rows"] / $config["per_page"];
        $config['full_tag_open'] = '<ul class="tsc_pagination tsc_paginationA tsc_paginationA01">';
        $config['full_tag_close'] = '</ul>';
        $config['prev_link'] = 'First';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = 'Next';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="current"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['first_link'] = '&lt;&lt;';
        $config['last_link'] = '&gt;&gt;';
        $this->pagination->initialize($config);
        /* pagination ends here */
            
            $data['hotelName'] = $this->dbmodel->get_user_hotel($user_id);
            if(!empty($data['hotelName'])){
            $data['roomInfo'] = $this->dashboard_model->get_booked_room_info($config["per_page"], $page, $user_id);}
             $config['display_pages'] = FALSE;
             $data["links"] = $this->pagination->create_links();
            $this->load->view('template/header');
            $this->load->view('dashboard/reservationSystem');
            $this->load->view('ReservationInformation/bookedRoomInformation', $data);
            $this->load->view('template/footer');
        } else {
            redirect('login', 'refresh');
        }
    }
    
    
    function view(){
      if ($this->session->userdata('logged_in')) {  
     $useremail = $this->session->userdata('useremail');
            $user['uid'] = $this->dbmodel->get_user_info($useremail);
           $hid = $_POST['hotel'];
$checkIn = $_POST['checkIn'];
$checkOut = $_POST['checkOut'];
             foreach ($user['uid'] as $id) {
                $user_id = $id->id;
            }
           if(($hid!=0 && $hid!=NULL && $hid!="") || ($checkIn!="" && $checkIn!=NULL) || ($checkOut!="" && $checkOut!=NULL) ){
        $roomInfo = $this->dashboard_model->pagination_query_test($hid,$checkIn,$checkOut);}
        else{  $roomInfo = $this->dashboard_model->query_test($user_id);}
         // $roomInfo = $this->dashboard_model->query_test($user_id);
        // var_dump($roomInfo);
//        $previous_btn = true;
//$next_btn = true;
//$first_btn = true;
//$last_btn = true;
          $per_page = 9;
         $pages['pages'] = ceil($roomInfo/$per_page);
        
        $this->load->view('test/view',$pages);
        
    }
    else{
        redirect('login', 'refresh');
    }
    }
    
function pagination(){
     if ($this->session->userdata('logged_in')) {  
    $useremail = $this->session->userdata('useremail');
            $user['uid'] = $this->dbmodel->get_user_info($useremail);
            foreach ($user['uid'] as $id) {
                $user_id = $id->id;
            }
           
    
if($_GET)
{
$page=$_GET['page'];
$id = $_POST['i'];
$hid = $_POST['hotel'];
$checkIn = $_POST['checkin'];
$checkOut = $_POST['checkout'];
}
 //die($checkIn);
//die($hid);
$per_page = 9;
$start = ($page-1)*$per_page;

 if(($hid!=0 && $hid!=NULL && $hid!="") || ($checkIn!="" && $checkIn!=NULL) || ($checkOut!="" && $checkOut!=NULL) ){       
             $data['hotelName'] = $this->dbmodel->get_user_hotel($user_id);
                 $data['roomInfo'] = $this->dashboard_model->get_booked_room_info_search($per_page, $start, $hid, $checkIn, $checkOut);     
            
                 }
        else
        {
            $data['hotelName'] = $this->dbmodel->get_user_hotel($user_id);
           $data['roomInfo'] = $this->dashboard_model->get_booked_room_info($per_page, $start, $user_id);
           
 }
            
    $this->load->view('test/pagination_data',$data);
}
 else{
        redirect('login', 'refresh');
    }
}




function searchManagedBooking(){
         if ($this->session->userdata('logged_in')) {
        
         $useremail = $this->session->userdata('useremail');
            $user = $this->dbmodel->get_user_info($useremail);
            foreach ($user as $id) {
                $user_id = $id->id;
            }
            
              $hotelId= $_POST['hotel'];
            //$hotelId= '10';
            
              $checkIn= $_POST['checkIn'];
            
            
              $checkOut = $_POST['checkOut'];     
           
            
             /*for pagination */
 $config = array();
        $config["base_url"] = base_url() . "index.php/dashboard/searchManagedBooking/#";
        if($hotelId!="0"){
        $config["total_rows"] = $this->dashboard_model->record_count_all_booking_info_search($hotelId);}
        else{  $config["total_rows"] = $this->dashboard_model->record_count_all_booking_info($user_id);}

        $config["per_page"] = 2;

        $config["per_page"] = 5;

        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
       
        $config["num_links"] = $config["total_rows"] / $config["per_page"];
        $config['full_tag_open'] = '<ul class="tsc_pagination tsc_paginationA tsc_paginationA01">';
        $config['full_tag_close'] = '</ul>';
        $config['prev_link'] = 'First';
        $config['prev_tag_open'] = '<li class="test"> ';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = 'Next';
        $config['next_tag_open'] = '<li class="test" > ';
        $config['next_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="current" ><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li class="test" >';
        $config['num_tag_close'] = '</li>';
        $config['first_tag_open'] = '<li class="test" >';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li class="test" >';
        $config['last_tag_close'] = '</li>';
        $config['first_link'] = '&lt;&lt;';
        $config['last_link'] = '&gt;&gt;';
        $this->pagination->initialize($config);
         $config['display_pages'] = FALSE;
             $data["links"] = $this->pagination->create_links();
        /*pagination ends here */
           
             
           
             if(($hotelId!=0 && $hotelId!=NULL && $hotelId!="") || ($checkIn!="" && $checkIn!=NULL) || ($checkOut!="" && $checkOut!=NULL) ){       
             $data['hotelName'] = $this->dbmodel->get_user_hotel($user_id);
                 $data['roomInfo'] = $this->dashboard_model->get_booked_room_info_search($config["per_page"], $page, $hotelId, $checkIn, $checkOut);     
            
                 }
        else
        {
            $data['hotelName'] = $this->dbmodel->get_user_hotel($user_id);
           $data['roomInfo'] = $this->dashboard_model->get_booked_room_info($config["per_page"], $page, $user_id);
           
 }
        
         $this->load->view('reservationInformation/bookedRoomInfoAjax', $data);
    }
     else {
            redirect('login', 'refresh');
        }
    }
    
     function editBooking($id=NULL) {
        if ($this->session->userdata('logged_in')) {
            $data['username'] = Array($this->session->userdata('logged_in'));
            $data['query'] = $this->dashboard_model->findbooking($id);  
          
            foreach ($data['query'] as $book)
            {
                $booking_id= $book->booking_id;
            }
            if(!empty($booking_id)){
            $data['book'] = $this->dashboard_model->get_booking_personal_info_by_booking_id($booking_id);
     
    
     $data['room'] = $this->dashboard_model->get_booked_room_info_by_booking_id($booking_id);
    
    if(!empty($data['room'])){
         $array=array();
     foreach ($data['room'] as $dataS)
        { $roomName = $dataS->room_type;
    $roomDetail = $this->dashboard_model->get_room_detail_by_room_name($roomName);  
    $array= array_merge($array, $roomDetail);
        }}
        $json['json']= json_encode($array);   
            }
            $this->load->view('template/header', $json);
            $this->load->view('dashboard/reservationSystem');
            $this->load->view('reservationInformation/editBooking', $data);
            $this->load->view('template/footer');
        } else {
            redirect('login', 'refresh');
        }
    }
    
    public function updateBooking()
    {
        if ($this->session->userdata('logged_in')) {
            $data['username'] = Array($this->session->userdata('logged_in'));
            
        $jsondatas = $_POST['json'];
        $jsonDecode = json_decode($jsondatas, true);
        $jsonArray = $jsonDecode;

        var_dump($jsonArray);
        foreach ($jsonArray as $item) {
            if ($item['no_of_room'] != "0") {
                $room = $item['room_name'];
               // mysql_query("INSERT INTO `booking_info` (check_in_date, check_out_date, booking_id, hotel_id)
      // VALUES ('" . $item['check_in_date'] . "', '" . $item['check_out_date'] . "','" . $bookId . "','" . $item['hotel_id'] . "' )");
      //           mysql_query("INSERT INTO `booked_room_info` (booking_id, room_type, no_of_rooms_booked, check_in_date, check_out_date)
      // VALUES ('" . $bookId . "','" . $item['room_name'] . "', '" . $item['no_of_room'] . "','" . $item['check_in_date'] . "', '" . $item['check_out_date'] . "')");
            }
        }
       
            
//            $id= $this->input->post('id');
//            $checkIn= $this->input->post('CheckIn');
//            $checkOut = $this->input->post('CheckOut');
//            $adults = $this->input->post('adults');
//            $childs = $this->input->post('children');
//            $roomId = $this->input->post('roomId');
//            $roomNo = $this->input->post('rooms');
//            var_dump($roomNo);
//            die($id);
 //           $this->session->set_flashdata('message', 'Data Updated Sucessfully');
//            redirect('dashboard/bookingInfo', 'refresh');
        } else {
            redirect('login', 'refresh');
        }
    }

        public function deleteBooking($id) {
        if ($this->session->userdata('logged_in')) {
            $data['username'] = Array($this->session->userdata('logged_in'));
            $this->dashboard_model->updateBooking($id);
            $this->session->set_flashdata('message', 'Data Deleted Sucessfully');
            redirect('dashboard/bookingInfo', 'refresh');
        } else {
            redirect('login', 'refresh');
        }
    }
    
    
    public function checkAvailable()
    {
        if ($this->session->userdata('logged_in')) {
         
            $data['abc'] = array(
            'checkin' => $_POST['checkin'],
            'checkout' => $_POST['checkout'],
            'adult' => $_POST['adults'],
            'child' => $_POST['childs'],
            'hotelId' => $_POST['hotelId']
        );
            $hotelId= $_POST['hotelId'];
          $data['room'] = $this->dashboard_model->get_rooms_by_hotel_id($hotelId);
          $data['json']= json_encode($data['room']);   

        $this->load->view('ReservationInformation/checkAvailableDateChange', $data);
              
        }
        else {
            redirect('login', 'refresh');
        }

    }
    
     public function checkRoomChange()
    {
        if ($this->session->userdata('logged_in')) {
         
            $data['abc'] = array(
            'checkin' => $_POST['checkin'],
            'checkout' => $_POST['checkout'],
            'adult' => $_POST['adults'],
            'child' => $_POST['childs'],
            'hotelId' => $_POST['hotelId'],
                'update'=> $_POST['json']
        );
            $hotelId= $_POST['hotelId'];
            $data['update']= $_POST['json'];
          $data['room'] = $this->dashboard_model->get_rooms_by_hotel_id($hotelId);
          $data['json']= json_encode($data['room']);   

        $this->load->view('ReservationInformation/checkAvailableOnUpdate', $data);
              
        }
        else {
            redirect('login', 'refresh');
        }

    }
    
    
    
}
