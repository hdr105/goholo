<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Affiliate extends GH_Controller {

	public $data = array();

	public function __construct() {
		parent::__construct();
	}

	function _remap($method,$param){

		if (method_exists($this,$method)) {
			if (!empty($param)) {
				$this->$method($param[0]);
			}else{
				$this->$method();
			}
			
		} else {
			$this->index($method);
		}

	}

	public function index($userid)
	{


		$formdata = $this->input->post();

		$this->data['success'] = false;
		$this->data['error'] = false;

		if (!empty($formdata)) {
			$where['user_id'] = $userid;

			$user = $this->crud_model->get_data("users",$where,true,'','','email');

			$message = "You have recieved an inquiry from the Goholo Platform here are the details.<br>";
			$message .= "Full Name:".$formdata['name']."<br>";
			$message .= "Email:".$formdata['email']."<br>";
			$message .= "Message:".$formdata['message']."<br>";

			$config = Array(
				'protocol' => 'smtp',
				'smtp_host' => 'ssl://smtp.gmail.com',
				'smtp_port' => 465,
				'smtp_user' => 'Goholoads@gmail.com',
				'smtp_pass' => '',
				'mailtype'  => 'html', 
				'charset'   => 'iso-8859-1'
			);
			$this->load->library('email', $config);
			$this->email->set_newline("\r\n");

			$this->email->from($formdata['email']);
			$this->email->to($user->email); 

			$this->email->subject('Goholo Contact us');
			$this->email->message($message);  

			$mail = $this->email->send();

			if($mail){

				$this->data['success'] = true;

			}else{
				$this->data['error'] = true;
			}
		}



		

		$this->data['userid'] = $userid;

		$this->load->view('affiliate/affiliate',$this->data);

	}

}
