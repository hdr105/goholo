<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends GH_Controller {

	public $data = array();
	public $table = "users";

	public function __construct() {
		parent::__construct();

		$this->data['menu_class'] = "admin_menu";
		$this->data['title'] = "Admin";
		$this->data['sidebar_file'] = "admin/admin_sidebar";
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

	public function index($status = "")
	{

		$where = array();

		if ($status != "") {
			$where['status'] = $status;
		}

		

		$result = $this->crud_model->get_data('users',$where);

		$this->data['users'] = $result;

		$this->load->view('common/header',$this->data);
		$this->load->view('common/sidebar',$this->data);
		$this->load->view('admin/view_users');
		$this->load->view('common/footer');
	}



	public function manage_user(){


		$email_validation = 'required|valid_email';

		if(!empty($_POST) && $_POST['user_id'] == ""){
			$email_validation .= "|is_unique[users.email]";
		}  

		$this->form_validation->set_rules('email', '*Email', $email_validation, array(
			'required' => '%s Missing',
			'is_unique' => '%s already Registered'

		));
		$this->form_validation->set_rules('password', '*Password', 'required|min_length[6]|max_length[12]|alpha_numeric', array(
			'required' => '%s Missing',
			'min_length' => '%s must be at least 6 characters',
			'max_length' => '%s must be at most 12 characters',
			'alpha_numeric' => '%s must be Alpha Numeric'
		));
		$this->form_validation->set_rules('re_password', '*Re-type Password', 'required|matches[password]', array(
			'required' => '%s Missing',
			'matches' => 'Password does not match'
		));

		$result = $this->form_validation->run();

		if ($result) {
			$form_data = $_POST;

			$profile_image = $this->crud_model->upload_file($_FILES['profile_image'],'profile_image',PROFILE_IMAGE_UPLOAD_PATH);

			if ($profile_image) {
				
				$form_data['profile_image'] = $profile_image;

			}elseif ($form_data['old_profile_image'] != "") {
				
				$form_data['profile_image'] = $form_data['old_profile_image'];
			}

			unset($form_data['old_profile_image']);
			unset($form_data['re_password']);

			$edit = false;

			if ($form_data['user_id'] != "") {
				$edit = true;
				$qb = true;

				if ($form_data['user_role'] == 2) {

					$qb_update = $this->quick_books->update_vendor($form_data);

					if ($qb_update['error'] == true) {

						$qb = false;
					}

				}elseif ($form_data['user_role'] != 1) {

					$qb_update = $this->quick_books->update_employee($form_data);

					if ($qb_update['error'] == true) {

						$qb = false;
					}
				}

				if ($qb) {
					
					$where['user_id'] = $form_data['user_id'];

					unset($form_data['user_id']);

					$user_id = $this->crud_model->update_data($this->table,$where,$form_data);
				}else{

					$user_id = false;

					$msg = $qb_update['msg'];
				}

			}else{

				$qb = true;

				if ($form_data['user_role'] == 2) {

					$qb_add = $this->quick_books->add_vendor($form_data);

					if ($qb_add['error'] == false) {

						$form_data['user_qb_id'] = $qb_add['msg'];
					}else{

						$qb = false;
					}
				}elseif ($form_data['user_role'] != 1) {

					$qb_add = $this->quick_books->add_employee($form_data);

					if ($qb_add['error'] == false) {

						$form_data['user_qb_id'] = $qb_add['msg'];
					}else{

						$qb = false;
					}
				}


				if ($qb) {
					
					unset($form_data['user_id']);

					$form_data['created_by'] = get_user_id();

					$user_id = $this->crud_model->add_data($this->table,$form_data);

					if ($user_id) {
						$this->load->library("PhpMailerLib");
						$mail = $this->phpmailerlib->welcome_email($form_data);

						if (!$mail) {

							$msg = $mail->ErrorInfo;
						}
					}

				}else{

					$user_id = false;

					$msg = $qb_add['msg'];
				}

			}


			if ($user_id) {

				
				if (isset($edit)) {
					if (!isset($msg)) {
						$msg = "User Updated successfully";
					}
				}else{
					if (!isset($msg)) {
						$msg = "User created successfully";
					}
				}

				$this->session->set_flashdata("success_msg",$msg);

				redirect(base_url()."users/");

			}else{

				if (isset($edit)) {
					if (!isset($msg)) {
						$msg = "User Not Updated";
					}
				}else{
					if (!isset($msg)) {
						$msg = "User Not created";
					}
				}

				$this->session->set_flashdata("error_msg",$msg);

				redirect($_SERVER['HTTP_REFERER']);
			}
		}else{

			$this->manage_user_view();
		}


		
	}

	public function manage_user_view($id = "")
	{

		if ($id != "") {
			$where['user_id'] = $id;

			$this->data['user'] = $this->crud_model->get_data($this->table,$where,true);
		}

		$this->load->view('common/header',$this->data);
		$this->load->view('common/sidebar',$this->data);
		$this->load->view('admin/manage_user',$this->data);
		$this->load->view('common/footer');
	}


	public function delete_user($id){

		$where['user_id'] = $id;

		$user =  $this->crud_model->get_data($this->table,$where,true,'','','user_qb_id,user_role');

		$qb = true;

		if ($user->user_role == 2) {
			
			$qb_inactive_user = $this->quick_books->inactive_vendor($user->user_qb_id);

			if ($qb_inactive_user['error'] == true) {
				$qb = false;
			}

		}elseif ($user->user_role != 1) {
			
			$qb_inactive_user = $this->quick_books->inactive_employee($user->user_qb_id);

			if ($qb_inactive_user['error'] == true) {
				$qb = false;
			}

		}


		if ($qb) {

			$result = $this->crud_model->delete_data($this->table,$where);

		}else{

			$this->session->set_flashdata("error_msg",$qb_inactive_user['msg']);

		}
		
		redirect($_SERVER['HTTP_REFERER']);
		
		


	}
}
