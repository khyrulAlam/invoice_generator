<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct() {
        parent::__construct();
        
        $admin_id=  $this->session->userdata('user_id');
        
        if($admin_id!=NULL){
            redirect('Invoice');

		}
	}
	
	
	
	public function index()
	{
		$this->load->view('login');
	}
	public function login(){

	    $this->load->model('Welcome_Model');
	    $user = $this->input->post('user_email', TRUE);
	    $pass =  $this->input->post('user_password', TRUE);

	   $result = $this->Welcome_Model->check_user($user, $pass);

	   if(!$result){
	       $data=array();
	       $data['logInError']= 'Try again with valid information';
	       $this->session->set_userdata($data);
	       redirect('Welcome');
       }

        $sdata = array();
        $sdata['user_name']= $result->user_name;
        $sdata['user_id'] = $result->user_id;
        $this->session->set_userdata($sdata);
        redirect('Invoice');
    }
}
