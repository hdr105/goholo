<?php

class Users_model extends CI_Model{

	public function __construct() {
		parent::__construct();

		$this->load->model("crud_model");

	}


	public function login_user($data){
		extract($data);


		$query = $this->db->get_where('users', array('email' => $email,'password' => $password));

		if($query->num_rows()>0){
			
			$response =  $query->row();
			return $response;

		}else{
			
			return false;

		}


	}

}