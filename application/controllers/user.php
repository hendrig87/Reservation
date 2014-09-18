<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class user extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('user_model');
        $this->load->model('dbmodel');
        $this->load->helper('url');
        $this->load->helper(array('form', 'url'));
    }

    public function get_all_users_tracked() {
        if ($this->session->userdata('logged_in')) {
            $data['users'] = $this->user_model->get_all_users();
            $this->load->view('template/header');
            $this->load->view("dashboard/reservationSystem");
            $this->load->view("users/listUsers", $data);
            $this->load->view('template/footer');
        } else {
            redirect('login', 'refresh');
        }
    }

    public function deleteUser($id) {
        if ($this->session->userdata('logged_in')) {
            $useremail = $this->session->userdata('useremail');
            $user = $this->dbmodel->get_user_info($useremail);
            foreach ($user as $uid) {
                $user_id = $uid->id;
            }
            if ($user_id == $id) {
                $this->session->set_flashdata('message', 'You can not delete yourself');
                redirect('user/get_all_users_tracked', 'refresh');
            } else {
                $this->user_model->delete_user($id);
                $this->session->set_flashdata('message', 'Data Deleted Sucessfully');
                redirect('user/get_all_users_tracked', 'refresh');
            }
        } else {
            redirect('login', 'refresh');
        }
    }

}