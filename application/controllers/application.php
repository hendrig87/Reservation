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
                $key = $this->getRandomStringForCoupen(5);
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
    
    function updateApi()
    {
         if ($this->session->userdata('logged_in')) {
       $useremail = $this->session->userdata('useremail'); 
     $id= $this->input->post('id');
     $data['query'] = $this->api_model->find_api($id);

       $this->load->library('form_validation');
       
                $this->form_validation->set_rules('api_name', 'API Name', 'trim|regex_match[/^[a-z,0-9,A-Z_ ]{5,35}$/]|required|xss_clean');
               
                
                if($this->form_validation->run() == FALSE)
                     {
                         $this->load->view('template/header');
                        $this->load->view('dashboard/reservationSystem');
                        $this->load->view('apps/editApi', $data);
                        $this->load->view('template/footer');
                     }
                else
                {  
                    
                    $api_name= $this->input->post('api_name');
                                   
                   $this->api_model->update_api($api_name, $id);                    
                    $this->session->set_flashdata('message', 'Data Updated sucessfully');
                    redirect('application/apiListing', 'refresh');      
                }
  }
 else {
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
    
    public function getCode()
    {
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
    
    
    
    function requestCode()
        {   
             $this->load->helper('availableroom');
             
            $data['abc']=array(
            'apiName' => $_POST['apiName'],
            'api' => $_POST['api'],
            'hotel' => $_POST['hotel'],
            'template' => $_POST['template']);
           
         $this->load->view('apps/popupGetCode',$data);
        }

}
