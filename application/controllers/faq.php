<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class faq extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->helper(array('form', 'url'));
    }    
    public function index()
    {
         $this->load->view('template/header');
         $this->load->view("dashboard/reservationSystem");
        $this->load->view('faq/faq');
        $this->load->view('template/footer');
    } 
}