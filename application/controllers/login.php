<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

 function __construct()
 {
   parent::__construct();  
        $this->load->library('session');
        $this->load->model('dbmodel');
        $this->load->helper('url');
        $this->load->helper(array('form', 'url'));
        $this->load->library("pagination");
      
 }
 
 public function index(){
     $this->load->library('session');
     
      $this->load->view('template/header');
                $this->load->view('template/imageDiv');
		$this->load->view('template/reservation_template');
                $this->load->view('template/footer');
                $this->load->view('template/copyright');
 }

 public function registrationForm()
 {
        $this->load->library('session');
     
        $this->load->view('template/header');
        $this->load->view('login/register');
        $this->load->view('template/reservation_template');
        $this->load->view('template/footer');
        $this->load->view('template/copyright');
 }
 
 public function register(){
     $this->load->library('form_validation');
     $users= $this->dbmodel->get_all_users();
                $this->form_validation->set_rules('userName', 'Username', 'trim|required|xss_clean');
                $this->form_validation->set_rules('userFirstName', 'First name', 'trim|required|xss_clean');
                $this->form_validation->set_rules('userLastName', 'Last name', 'trim|required|xss_clean');
                $this->form_validation->set_rules('userEmail', 'Email', 'trim|required|xss_clean');
                $this->form_validation->set_rules('userPass', 'Password', 'trim|required|xss_clean|md5|callback_check_database');
                if($this->form_validation->run() == FALSE)
                     {
                        $this->registrationForm();
                     }
                else
                {  
                         foreach ($users as $user){
                             $userName= $user->user_name;
                         }
            $inputuserName= $_POST['userName'];             
            if($userName != $inputuserName){             
            $user_name = $this->input->post('userName');
            }
 else {
                $this->session->set_flashdata('message', 'User Name already exsists');
          redirect('login/registrationForm');
 }
            $userfname = $this->input->post('userFirstName');   
            $userlname = $this->input->post('userLastName');
          
            foreach ($users as $user){
                             $userEmail= $user->user_email;
                         }
           $inputuserEmail= $_POST['userEmail']; 
           
            if($userEmail != $inputuserEmail){             
              $useremail = $this->input->post('userEmail');
            }
 else {
                $this->session->set_flashdata('message', 'User Email already exsists');
          redirect('login/register');
 }
 
 if($userEmail==$inputuserEmail && $userName==$inputuserName);
                 $this->session->set_flashdata('message', 'User Name and Email already exsists');
          redirect('login/register');
  
 
               $userpass = $this->input->post('userPass');
            $this->dbmodel->add_new_user($user_name, $userfname, $userlname, $useremail, $userpass);
            
            echo '<h3>Hurray! Successfully Regisered</h3>';
                }
                
 }
 function logout() {
        $this->session->sess_destroy();
        $this->index();
        redirect('login', 'refresh');
    }
 
 public function loginForm()
 {
     $this->load->library('session');
     if(!$this->session->userdata('logged_in'))
     {
          $this->load->view('template/header');
          $this->load->view('login/login');
          $this->load->view('template/reservation_template');
          $this->load->view('template/footer');
          $this->load->view('template/copyright');
     }
     else{
         
     }
 }
 
 public function validate_user()
     
{$this->load->library('session');
    if(isset($_POST['checkMe']))
    {
    
   $this->session->sess_expiration = 60*60*24*7;
   $this->session->sess_expire_on_close = FALSE;
   
}
else
{
   $this->session->sess_expiration = 60*60;
   $this->session->sess_expire_on_close = FALSE;
}  
   
                $this->load->library('form_validation');
                $this->form_validation->set_rules('userEmail', 'Username', 'trim|required|xss_clean');
                $this->form_validation->set_rules('userPass', 'Password', 'trim|required|xss_clean|md5|callback_check_database');
                if($this->form_validation->run() == FALSE)
                     {
                        $this->loginForm();
                       
                     }
                else
                    {
                    
                $email= $this->input->post('userEmail');
                $pass= $this->input->post('userPass');
		
		$data['query'] = $this->dbmodel->validate($email, $pass);
		if($data['query']) // if the user's credentials validated...   
		{
                  
                  $a=  $this->input->ip_address();
                   
                   $session_id = $this->session->userdata('session_id');
                   $a=$this->session->userdata('ip_address');
                   $b=$this->session->userdata('user_agent');
                   $c=$this->session->userdata('last_activity');
                 
			$data = array(
				'username' => $this->input->post('userEmail'),
				'logged_in' => true);

                            redirect('dashboard/index');
			
		}
		else // incorrect username or password
                    {
                  
                        $this->session->set_flashdata('message', 'Username or password incorrect');
                        
                       redirect('login/loginForm');
                        
                    }
                    }
	}
        
 
 public function forgotPassword(){
     $this->load->library('session');
     if(!$this->session->userdata('logged_in'))
         {
         
          $this->load->view('template/header');
          $this->load->view('login/forgotPassword');
          $this->load->view('template/reservation_template');
          $this->load->view('template/footer');
          $this->load->view('template/copyright'); 
          //$this->session->set_flashdata('message', 'Instructions to reset your password have been emailed to you. Please check your email and login ');
          //redirect('welcome/mailSentMessage', 'refresh');
               }

     else{
         $this->session->set_flashdata('message', 'Incorrect Email');
          redirect('login/forgotPassword');
     }
       
    }
 
 
 public function email(){
        
       if(isset($_POST['userEmail'])) 
        $useremail= $_POST['userEmail'];
       
        $username =  $this->dbmodel->get_selected_user($useremail);
        
        foreach ($username as $dbemail){
            $to = $dbemail->user_email;
        }
        if ($to==$useremail) {                                       
               $token= $this->getRandomString(10);                          
                $this->dbmodel->update_emailed_user($to, $token);  
                $this->test($token);
                
                $this->mailresetlink($to, $token);
                
           //$this->session->set_flashdata('message', 'Instructions to reset your password have been emailed to you. Please check your email and login ');
           //redirect('welcome/mailSentMessage', 'refresh');    
            } else {
                $this->session->set_flashdata('message', 'Please type valid Email Address');
                redirect("login/forgotPassword");
            }
    }
    
    public function test($token){
        
        $data['query'] = $this->dbmodel->find_user_auth_key($token);
                $this->load->view('template/header');
                $this->load->view('login/messageSent',$data);
                $this->load->view('template/reservation_template');
                $this->load->view('template/footer');
                $this->load->view('template/copyright');
    }
    
    function getRandomString($length) 
	   {
    $validCharacters = "ABCDEFGHIJKLMNPQRSTUXYVWZ123456789";
    $validCharNumber = strlen($validCharacters);
    $result = "";

    for ($i = 0; $i < $length; $i++) {
        $index = mt_rand(0, $validCharNumber - 1);
        $result .= $validCharacters[$index];
    }
    return $result;
    
    
           } 
           
 function mailresetlink($to,$token){
     
 }
 
  public function resetPassword() {
      
      
      if(isset($_GET['resetPassword']))
      $a=$_GET['resetPassword'];
      
      $data['query']= $this->dbmodel->get_user_email($a);
      if($data['query']){
           $this->load->view('template/header');
             $this->load->view("login/resetPassword", $data);
             $this->load->view('template/reservation_template');
             $this->load->view('template/footer');
             $this->load->view('template/copyright');
      }
 else {
             $this->load->view('template/header');
             $this->load->view("template/errorMessage");
             $this->load->view('template/reservation_template');
             $this->load->view('template/footer');
             $this->load->view('template/copyright');
      }
             
         
    }        
 public function setpassword(){
     
   
   $password= $_POST['user_pass'];
        $token = $_POST['userEmail'];
     //die($token);  
        $confirmPassword =  $_POST['user_confirm_pass'];
        if ($password==$confirmPassword) {                                       
               
            $userPassword=  $this->input->post('user_pass');
            
                $this->dbmodel->update_user_password($token, $userPassword);
                $this->dbmodel->update_user_token($token);
                
                $this->session->set_flashdata('message', 'Your password has been changed successfully');
                redirect('welcome/mailSentMessage', 'refresh');
               
            } else {
                
                $this->session->set_flashdata('message', 'Password didnot match');
               redirect('login/forgotPassword', 'refresh');
            }
            
      
 }
 


 
}