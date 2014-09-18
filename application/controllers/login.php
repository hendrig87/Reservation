<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('dbmodel');
        $this->load->helper('url');
        $this->load->helper('date');
        $this->load->helper(array('form', 'url', 'date'));
        $this->load->library("pagination");
    }

    public function index() {
        $this->load->library('session');
        $this->load->view('template/header');
        $this->load->view('login/loginOnHover');
        $this->load->view('template/imageDiv');
        $this->load->view('template/reservation_template');
        $this->load->view('template/footer');
    }

    public function registrationForm() {
        if (!$this->session->userdata('logged_in')) {
            $this->load->library('session');
            $this->load->view('template/header');
            $this->load->view('login/register');
            $this->load->view('template/reservation_template');
            $this->load->view('template/footer');
        } else {
            redirect('dashboard/index');
        }
    }

    public function register() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('userName', 'Username', 'trim|regex_match[/^[a-z,0-9,A-Z_ ]{5,35}$/]|required|xss_clean');
        $this->form_validation->set_rules('userFirstName', 'First name', 'trim|regex_match[/^[a-z,0-9,A-Z_ ]{5,35}$/]|required|xss_clean');
        $this->form_validation->set_rules('userLastName', 'Last name', 'trim|regex_match[/^[a-z,0-9,A-Z_ ]{5,35}$/]|required|xss_clean');
        $this->form_validation->set_rules('userEmail', 'Email', 'trim|regex_match[/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/]|required|xss_clean');
        $this->form_validation->set_rules('userPass', 'Password', 'trim|regex_match[/^[a-z,0-9,A-Z]{5,35}$/]|required|xss_clean|md5|callback_check_database');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header');
            $this->load->view('login/register');
            $this->load->view('template/reservation_template');
            $this->load->view('template/footer');
        } else {
            if (isset($_POST['userName'])) {
                $uname = trim($_POST['userName']);
            }

            if (isset($_POST['userEmail'])) {
                $email = trim($_POST['userEmail']);
            }
            $userEmail = $this->dbmodel->check_user($email, $uname);
            if (!empty($userEmail)) {
                $validation = FALSE;
                $data['validation_message'] = "Sorry! User Name or Email already exsists.";
                $this->load->view('template/header', $data);
                $this->load->view('login/register');
                $this->load->view('template/reservation_template');
                $this->load->view('template/footer');
            } else {
                $user_name = $this->input->post('userName');
                $userfname = $this->input->post('userFirstName');
                $userlname = $this->input->post('userLastName');
                $useremail = $this->input->post('userEmail');
                $userpass = $this->input->post('userPass');
                $loginStatus = "Registered";
                $loginDate = "Not logged in till";
                $this->dbmodel->add_new_user($user_name, $userfname, $userlname, $useremail, $userpass, $loginStatus, $loginDate);
                $data = array(
                    'useremail' => $useremail,
                    'username' => $user_name,
                    'logged_in' => true);
                $this->session->set_userdata($data);
                $this->registerEmail($useremail, $user_name);
                redirect('login/index');
            }
        }
    }

    public function registerEmail($useremail, $user_name) {
        $this->load->helper('send_email_helper');
        $subject = "Registration Successful";
        $imglink = base_url() . "contents/images/ParkReserve.png";
        $message = register_email($user_name, $imglink);
        send_email($useremail, $subject, $message);
    }

    function logout() {
        if ($this->session->userdata('logged_in')) {
            $useremail = $this->session->userdata('useremail');
            $user = $this->dbmodel->get_user_info($useremail);
            foreach ($user as $id) {
                $user_id = $id->login_status;
                $user_email = $id->user_email;
            }
            if ($user_id == "Logged In") {
                $loginStatus = 'Logged Out';

                $this->dbmodel->update_loggedOut_user_status($user_email, $loginStatus);
            }
        }
        $this->session->sess_destroy();
        $this->index();
        redirect('login/index', 'refresh');
    }

    public function loginForm() {
        $this->load->library('session');
        if (!$this->session->userdata('logged_in')) {
            $this->load->view('template/header');
            $this->load->view('login/login');
            $this->load->view('template/reservation_template');
            $this->load->view('template/footer');
        } else {
            redirect('login/index');
        }
    }

    public function validate_user() {
        $this->load->library('session');
        if (isset($_POST['checkMe'])) {
            $this->session->sess_expiration = 60 * 60 * 24 * 7;
            $this->session->sess_expire_on_close = FALSE;
        } else {
            $this->session->sess_expiration = 60 * 60;
            $this->session->sess_expire_on_close = FALSE;
        }
        $this->load->library('form_validation');
        $this->form_validation->set_rules('userEmail', 'User Email', 'trim|regex_match[/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/]|required|xss_clean');
        $this->form_validation->set_rules('userPass', 'Password', 'trim|regex_match[/^[a-z,0-9,A-Z]{5,35}$/]|required|xss_clean|callback_check_database');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header');
            $this->load->view('login/login');
            $this->load->view('template/reservation_template');
            $this->load->view('template/footer');
        } else {
            $email = $this->input->post('userEmail');
            $pass = $this->input->post('userPass');
            $query = $this->dbmodel->validate_user($email, $pass);
            if (!empty($query)) { // if the user's credentials validated...
                foreach ($query as $users) {
                    $userName = $users->user_name;
                }
                $data = array(
                    'useremail' => $email,
                    'username' => $userName,
                    'logged_in' => true);
                $this->session->set_userdata($data);
                $useremail = $this->session->userdata('useremail');
                $user = $this->dbmodel->get_user_info($useremail);
                foreach ($user as $id) {
                    $user_id = $id->login_status;
                    $user_email = $id->user_email;
                }
                if ($user_id == "Registered") {
                    $this->load->view('template/header');
                    $this->load->view('template/welcomeMessage');
                    $this->load->view('template/imageDiv');
                    $this->load->view('template/reservation_template');
                    $this->load->view('template/footer');
                    $loginStatus = 'Logged In';
                    $this->dbmodel->update_Registered_user_status($user_email, $loginStatus);
                } else {
                    $user = $this->dbmodel->get_user_info($userName);
                    foreach ($user as $id) {
                        $user_id = $id->login_status;
                        $user_email = $id->user_email;
                    }
                    if ($user_id == "Logged Out") {

                        $loginStatus = 'Logged In';
                        $this->dbmodel->update_LoggedIn_user_status($user_email, $loginStatus);
                    }
                    redirect('dashboard/index');
                }
            } else { // incorrect username or password
                $this->session->set_flashdata('message', 'Username or password incorrect');
                redirect('login/loginForm');
            }
        }
    }

    public function forgotPassword() {
        $this->load->library('session');
        if (!$this->session->userdata('logged_in')) {
            $this->load->view('template/header');
            $this->load->view('login/forgotPassword');
            $this->load->view('template/reservation_template');
            $this->load->view('template/footer');
        } else {
            $this->session->set_flashdata('message', 'Incorrect Email');
            redirect('login/forgotPassword');
        }
    }

    public function email() {
        if (isset($_POST['userEmail'])) {
            $useremail = $_POST['userEmail'];
            $username = $this->dbmodel->get_selected_user($useremail);
            if (!empty($username)) {
                foreach ($username as $dbemail) {
                    $to = $dbemail->user_email;
                    $user = $dbemail->user_name;
                }
                $token = $this->getRandomString(10);
                $this->dbmodel->update_emailed_user($to, $token);
                $this->passwordresetemail($to, $user, $token);
                $this->session->set_flashdata('message', 'Instructions to reset your password have been emailed to you. Please check your email and login ');
                redirect('welcome/mailSentMessage', 'refresh');
            } else {
                $this->session->set_flashdata('message', 'Please type valid Email Address');
                redirect("login/forgotPassword");
            }
        } else {
            redirect("login/index");
        }
    }

    public function passwordresetemail($to, $userName, $token) {
        $this->load->helper('send_email_helper');
        $subject = "Password Reset";
        $link = base_url();
        $message = password_reset_email($to, $userName, $token, $link);
        send_password_reset_email($to, $subject, $message);
    }

    public function test($token) {
        $data['query'] = $this->dbmodel->find_user_auth_key($token);
        $this->load->view('template/header');
        $this->load->view('login/messageSent', $data);
        $this->load->view('template/imageDiv');
        $this->load->view('template/reservation_template');
        $this->load->view('template/footer');
    }

    function getRandomString($length) {
        $validCharacters = "ABCDEFGHIJKLMNPQRSTUXYVWZ123456789";
        $validCharNumber = strlen($validCharacters);
        $result = "";
        for ($i = 0; $i < $length; $i++) {
            $index = mt_rand(0, $validCharNumber - 1);
            $result .= $validCharacters[$index];
        }
        return $result;
    }

    public function resetPassword() {
        if (isset($_GET['resetPassword']))
            $a = $_GET['resetPassword'];
        $data['query'] = $this->dbmodel->get_user_email($a);
        if ($data['query']) {
            $this->load->view('template/header');
            $this->load->view("login/resetPassword", $data);
            $this->load->view('template/reservation_template');
            $this->load->view('template/footer');
        } else {
            $this->load->view('template/header');
            $this->load->view("template/errorMessage");
            $this->load->view('template/reservation_template');
            $this->load->view('template/footer');
        }
    }

    public function setpassword() {
        $password = $_POST['user_pass'];
        $email = $_POST['userEmail'];  //die($token);  
        $confirmPassword = $_POST['user_confirm_pass'];
        if ($password == $confirmPassword) {
            $userPassword = $this->input->post('user_pass');
            $this->dbmodel->update_user_password($email, $userPassword);    //$this->dbmodel->update_user_token($token);
            $this->session->set_flashdata('message', 'Your password has been changed successfully');
            redirect('welcome/mailSentMessage', 'refresh');
        } else {
            $this->session->set_flashdata('message', 'Password didnot match');
            redirect('login/forgotPassword', 'refresh');
        }
    }

}