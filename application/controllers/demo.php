<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Demo extends CI_Controller {
     function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('api_model');
        $this->load->model('dbmodel');
        $this->load->model('dashboard_model');
        $this->load->helper('url');
        $this->load->helper(array('form', 'url'));
        $this->load->library("pagination");
        $this->load->helper('captcha');
    }
    function index(){
        
        $this->load->view('demo/demo');
    }
    
}