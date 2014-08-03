<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class application extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('api_model');
        $this->load->model('dbmodel');
        $this->load->model('dashboard_model');
        $this->load->helper('url');
        $this->load->helper(array('form', 'url'));
        $this->load->library("pagination");
    }

    function getRandomStringForCoupen($length) {
        $validCharacters = "ABCDEFGHIJKLMNPQRSTUXYVWZabcdefghijklmnopqrstuvwxyz123456789";
        $validCharNumber = strlen($validCharacters);
        $result = "";

        for ($i = 0; $i < $length; $i++) {
            $index = mt_rand(0, $validCharNumber - 1);
            $result .= $validCharacters[$index];
        }
        return $result;
    }

    //

    public function index() {
        if ($this->session->userdata('logged_in')) {

            $useremail = $this->session->userdata('useremail');
            $user = $this->dbmodel->get_user_info($useremail);
            foreach ($user as $id) {
                $user_id = $id->id;
            }

            $this->load->view('template/header');
            $this->load->view("dashboard/reservationSystem");

            $this->load->view("apps/createApi");

            $this->load->view('template/footer');
        } else {

            redirect('login', 'refresh');
        }
    }

    public function addApi() {
        if ($this->session->userdata('logged_in')) {
            $useremail = $this->session->userdata('useremail');
            $user = $this->dbmodel->get_user_info($useremail);
            foreach ($user as $data) {
                $user_id = $data->id;
            }
            $this->load->library('form_validation');

            $this->form_validation->set_rules('api_name', 'API Name', 'trim|regex_match[/^[a-z,0-9,A-Z_ ]{5,35}$/]|required|xss_clean');


            if ($this->form_validation->run() == FALSE) {
                $this->load->view('template/header');
                $this->load->view("dashboard/reservationSystem");
                $this->load->view("apps/createApi");
                $this->load->view('template/footer');
            } else {
                $key = $this->getRandomStringForCoupen(10);
                $apiName = $this->input->post('api_name');


                // $this->addHotelEmail($username, $hotel_name);
                $this->api_model->add_new_api($key, $apiName, $user_id);


                $this->session->set_flashdata('message', 'One app added sucessfully');
                redirect('application/apiListing', 'refresh');
            }
        } else {
            redirect('login', 'refresh');
        }
    }

    public function apiListing() {
        if ($this->session->userdata('logged_in')) {
            $useremail = $this->session->userdata('useremail');
            $user = $this->dbmodel->get_user_info($useremail);
            foreach ($user as $id) {
                $user_id = $id->id;
            }

            $data['api'] = $this->api_model->get_all_app_by_user($user_id);

            $this->load->view('template/header');
            $this->load->view("dashboard/reservationSystem");
            $this->load->view("apps/listApi", $data);
            $this->load->view('template/footer');
        } else {
            redirect('login', 'refresh');
        }
    }

    function editApi($id) {
        if ($this->session->userdata('logged_in')) {
            $data['username'] = Array($this->session->userdata('logged_in'));
            $data['query'] = $this->api_model->find_api($id);

            $this->load->view('template/header');
            $this->load->view('dashboard/reservationSystem');
            $this->load->view('apps/editApi', $data);

            $this->load->view('template/footer');
        } else {
            redirect('login', 'refresh');
        }
    }

    function updateApi() {
        if ($this->session->userdata('logged_in')) {
            $useremail = $this->session->userdata('useremail');
            $id = $this->input->post('id');
            $data['query'] = $this->api_model->find_api($id);

            $this->load->library('form_validation');

            $this->form_validation->set_rules('api_name', 'API Name', 'trim|regex_match[/^[a-z,0-9,A-Z_ ]{5,35}$/]|required|xss_clean');


            if ($this->form_validation->run() == FALSE) {
                $this->load->view('template/header');
                $this->load->view('dashboard/reservationSystem');
                $this->load->view('apps/editApi', $data);
                $this->load->view('template/footer');
            } else {

                $api_name = $this->input->post('api_name');

                $this->api_model->update_api($api_name, $id);
                $this->session->set_flashdata('message', 'Data Updated sucessfully');
                redirect('application/apiListing', 'refresh');
            }
        } else {
            redirect('login', 'refresh');
        }
    }

    public function deleteApi($id) {
        if ($this->session->userdata('logged_in')) {

            $this->api_model->delete_api($id);
            $this->session->set_flashdata('message', 'Data Deleted Sucessfully');
            redirect('application/apiListing', 'refresh');
        } else {
            redirect('login', 'refresh');
        }
    }

    public function getCode() {
        if ($this->session->userdata('logged_in')) {

            $useremail = $this->session->userdata('useremail');
            $user = $this->dbmodel->get_user_info($useremail);
            foreach ($user as $id) {
                $user_id = $id->id;
            }
            $data['hotelName'] = $this->api_model->get_user_hotel($user_id);
            $data['apiName'] = $this->api_model->get_user_api($user_id);
            $this->load->view('template/header');
            $this->load->view("dashboard/reservationSystem");

            $this->load->view("apps/getCode", $data);

            $this->load->view('template/footer');
        } else {

            redirect('login', 'refresh');
        }
    }

    function requestCode() {
        $this->load->helper('availableroom');

        $apiName = $_POST['apiName'];
        $api = $_POST['api'];
        $hotelId = $_POST['hotel'];
        $template = $_POST['template'];

        $this->api_model->add_new_code_user($apiName, $api, $hotelId, $template);

       
        if($template==1){
            $a= '<pre>
<code>
    <textarea readonly  style="border: none;background-color:white; min-height:170px; width: 750px; margin:  0px ; padding: 0px;">
        <script src="http://localhost/reservation/contents/scripts/jquery.js" ></script> 
       <script src="http://localhost/reservation/apiTesting/scripts/common.js" ></script>
        <link rel="stylesheet" type="text/css" href="http://localhost/reservation/apiTesting/styles/first.css" /> 
        <div id="api-data-reserve" name="'.$apiName.'" data="'.$api.'"></div></textarea></code></pre>';
        }
 if($template==2){
           $a= '<pre>
<code>
    <textarea readonly  style="border: none;background-color:white; min-height:170px; width: 750px; margin:  0px ; padding: 0px;">
 <script src="http://localhost/reservation/contents/scripts/jquery.js" ></script> 
       <script src="http://localhost/reservation/apiTesting/scripts/common.js" ></script>
        <link rel="stylesheet" type="text/css" href="http://localhost/reservation/apiTesting/styles/second.css" /> 
        <div id="api-data-reserve" name="'.$apiName.'" data="'.$api.'"></div></textarea></code></pre>';
        }
 if($template==3){
            $a= '<pre>
<code>
    <textarea readonly  style="border: none;background-color:white; min-height:170px; width: 750px; margin:  0px ; padding: 0px;">
  <script src="http://localhost/reservation/contents/scripts/jquery.js" ></script> 
       <script src="http://localhost/reservation/apiTesting/scripts/common.js" ></script>
        <link rel="stylesheet" type="text/css" href="http://localhost/reservation/apiTesting/styles/third.css" /> 
        <div id="api-data-reserve" name="'.$apiName.'" data="'.$api.'"></div></textarea></code></pre>';
        }
         if($template==4){
            $a= '<pre>
<code>
    <textarea readonly  style="border: none;background-color:white; min-height:170px; width: 750px; margin:  0px ; padding: 0px;">
  <script src="http://localhost/reservation/contents/scripts/jquery.js" ></script> 
       <script src="http://localhost/reservation/apiTesting/scripts/common.js" ></script>
        <link rel="stylesheet" type="text/css" href="http://localhost/reservation/apiTesting/styles/fourth.css" /> 
        <div id="api-data-reserve" name="'.$apiName.'" data="'.$api.'"></div></textarea></code></pre>';
        }

echo $a;  

        
    }
    
    public function viewSender()
    {
       
         $apiName = $_POST['apiName'];
         $api = $_POST['api'];
        
         $data['api']= $this->api_model->get_api_detail( $apiName, $api);
      foreach($data['api'] as $temps){
          $template = $temps->template_id;
      }
    
      if($template =="1"){
      $this->load->view('apiTesting/first', $data);}
       if($template =="2"){
      $this->load->view('apiTesting/second', $data);}
       if($template =="3"){
      $this->load->view('apiTesting/third', $data);}
       if($template =="4"){
      $this->load->view('apiTesting/fourth', $data);}
    }
    
    

}
