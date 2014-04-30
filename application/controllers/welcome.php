<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {
    
    function __construct()
 {
   parent::__construct();  
        $this->load->library('session');
         $this->load->helper(array('form', 'url'));
        $this->load->helper('url');
        
      
 }

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
             $this->load->library('session');
           if(!$this->session->userdata('logged_in')){
                $this->load->view('template/header');
                $this->load->view('login/loginOnHover');
                $this->load->view('template/imageDiv');
		$this->load->view('template/reservation_template');
                $this->load->view('template/footer');
           }
 else {
         redirect('dashboard/index');   
     }    
	}
        public function mailSentMessage(){
                $this->load->view('template/header');
                $this->load->view('template/errorMessage');
                $this->load->view('template/imageDiv');
		$this->load->view('template/reservation_template');
                $this->load->view('template/footer');
              
        }
        
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */