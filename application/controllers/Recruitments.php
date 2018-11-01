<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Recruitments extends GH_Controller {

	public $data = array();
	public $table = "users";

	public function __construct() {
		parent::__construct();

		$this->data['menu_class'] = "recruitments_menu";
		$this->data['title'] = "Recruitments";
		$this->data['sidebar_file'] = "recruitment/recruitment_sidebar";
	}

	public function index()
	{

		$where['created_by'] = get_user_id();

		$where['user_role'] = 3;

		$result = $this->crud_model->get_data('users',$where);

		$this->data['users'] = $result;

		$this->load->view('common/header',$this->data);
		$this->load->view('common/sidebar',$this->data);
		$this->load->view('recruitment/view_recruitments');
		$this->load->view('common/footer');
	}



	public function manage_user(){


		$email_validation = 'required|valid_email';

		if($_POST['user_id'] == ""){
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
				$where['user_id'] = $form_data['user_id'];
				
				unset($form_data['user_id']);

				$user_id = $this->crud_model->update_data($this->table,$where,$form_data);

			}else{

				$qb = true;


				$qb_add = $this->quick_books->add_employee($form_data);

				if ($qb_add['error'] == false) {

					$form_data['user_qb_id'] = $qb_add['msg'];
				}else{

					$qb = false;
				}
				if ($qb) {
					

					unset($form_data['user_id']);

					$form_data['created_by'] = get_user_id();

					$user_role = get_user_role();

					if ($user_role != 1) {

						$form_data['status'] = 0;
					}

					$user_id = $this->crud_model->add_data($this->table,$form_data);

					if ($user_id) {

							$this->load->library("PhpMailerLib");
							$mail = $this->phpmailerlib->welcome_email($form_data);

							if (!$mail) {

								$msg = $mail->ErrorInfo;
							}
						}

					$notify['message'] = sprintf($this->lang->line('new_marketing_member'), get_user_fullname());
					$notify['link'] = "users/0";

					$this->add_notifications($notify,'1');
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
				
				redirect(base_url()."recruitments/");

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

			$this->manage_recruitment_view();
		}


		
	}

	public function manage_recruitment_view($id = "")
	{

		if ($id != "") {
			$where['user_id'] = $id;

			$this->data['user'] = $this->crud_model->get_data($this->table,$where,true);
		}

		$this->load->view('common/header',$this->data);
		$this->load->view('common/sidebar',$this->data);
		$this->load->view('recruitment/manage_recruitment',$this->data);
		$this->load->view('common/footer');
	}


	public function view_recruitment($id){

		

		$where['user_id'] = $id;

		$this->data['user'] = $this->crud_model->get_data($this->table,$where,true);

		$this->load->view('common/header',$this->data);
		$this->load->view('common/sidebar',$this->data);
		$this->load->view('recruitment/view_recruitment',$this->data);
		$this->load->view('common/footer');
		


	}
}
