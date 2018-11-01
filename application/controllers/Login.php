<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {


	public function __construct() {
		parent::__construct();
		$this->load->model("users_model");
	}

	public function index()
	{

		$this->load->view('login/login');
	}

		public function login_auth(){


		$data= $this->input->post();
        unset($data['submit']);


        $result = $this->users_model->login_user($data);

        if($result){
   
            $this->session->set_userdata("user_session",$result);
    
            redirect(base_url());
        }else{

         $this->session->set_flashdata('error','Invalid Email or Password');
         redirect($_SERVER['HTTP_REFERER']);

        }
		
	}

}
