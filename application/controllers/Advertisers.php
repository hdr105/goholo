<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Advertisers extends GH_Controller {

	private $data;
	private $table = "advertisements";

	public function __construct() {
		parent::__construct();
		$this->data['menu_class'] = "advertisers_menu";
		$this->data['title'] = "Advertisers";
		$this->data['sidebar_file'] = "advertisers/advertisers_sidebar";


	}

	public function index()
	{
		$this->load->view('common/header',$this->data);
		$this->load->view('common/sidebar',$this->data);
		$this->load->view('advertisers/advertisers');
		$this->load->view('common/footer');
	}

	public function manage_advertisement($location_id,$advert_id = "")
	{

		$form_data = $this->input->post();

		if (!empty($form_data)) {

			$user_role = get_user_role();

			extract($form_data);
			

			$this->form_validation->set_rules('advertiser_type', '*Advertiser Type', 'required', array(
				'required' => '%s Missing'
			));

			if ($advertiser_type == 1) {
				$this->form_validation->set_rules('advertiser_id', '*Advertiser', 'required', array(
					'required' => '%s Missing'
				));
			}elseif ($advertiser_type == 2) {

				$this->form_validation->set_rules('advert[company_name]', '*Company Name', 'required', array(
					'required' => '%s Missing'
				));


				$this->form_validation->set_rules('advert[first_name]', '*First Name', 'required', array(
					'required' => '%s Missing'
				));

				$this->form_validation->set_rules('advert[last_name]', '*Last Name', 'required', array(
					'required' => '%s Missing'
				));

				$this->form_validation->set_rules('advert[email]', '*Email', 'required|valid_email', array(
					'required' => '%s Missing'
				));
				$this->form_validation->set_rules('advert[phone_number]', '*Phone Number', 'required', array(
					'required' => '%s Missing'
				));
				
			}

			$result = $this->form_validation->run();

			

			if ($result) {


				$qb_customer = true;	

				if ($advertiser_type == 2) {

					$form_data['advert']['street'] = "";
					$form_data['advert']['city'] = "";
					$form_data['advert']['country'] = "";
					$form_data['advert']['post_code'] = "";

					$qb_add_customer = $this->quick_books->add_customer($form_data['advert']);
					if ($qb_add_customer['error'] == false) {

						$form_data['advert']['user_qb_id'] = $qb_add_customer['msg'];
						
						$form_data['advert']['created_by'] = get_user_id();

						$form_data['advertiser_id'] = $this->crud_model->add_data("users",$form_data['advert']);

					}else{

						$qb_customer = false;
					}

				}

				if ($qb_customer) {

				$hologram_file = $this->crud_model->upload_file($_FILES['hologram_file'],'hologram_file',HOLOGRAM_FILE_UPLOAD_PATH);

				if ($hologram_file) {

					$form_data['hologram_file'] = $hologram_file;

				}elseif ($form_data['old_hologram_file'] != "") {

					$form_data['hologram_file'] = $form_data['old_hologram_file'];
				}

				unset($form_data['old_hologram_file']);
				unset($form_data['advert']);
				unset($form_data['advertiser_type']);


				$edit = false;

				$form_data['hologram_description'] = trim($form_data['hologram_description']);

				if ($advert_id != "") {
					$edit = true;

					$where['advert_id'] = $form_data['advert_id'];

					unset($form_data['advert_id']);

					$advert = $this->crud_model->update_data($this->table,$where,$form_data);

				}else{

					$package = $this->crud_model->get_data('packages',array("package_id"=>$form_data['package_id']),true);

					$advertiser = $this->crud_model->get_data('users',array("user_id"=>$form_data['advertiser_id']),true);


					// $start_month = DateTime::createFromFormat("m/Y", $form_data['start_date']);
					// $start_timestamp = $start_month->getTimestamp();
					// $start_date = date('Y-m-01', $start_timestamp);

					// $end_month = DateTime::createFromFormat("m/Y", $form_data['end_date']);
					// $end_timestamp = $end_month->modify('+1 month')->getTimestamp();
					// $end_date = date('Y-m-01', $end_timestamp);

					//$quick_books_data['qty'] = (int)abs((strtotime($start_date) - strtotime($end_date))/(60*60*24*30));

					//$quick_books_data['total_amount'] = $quick_books_data['qty'] * $package->total_cost;

					$quick_books_data['qty'] = 1;

					$quick_books_data['total_amount'] = $package->total_cost;

					$quick_books_data['monthly_cost'] = $package->total_cost;

					$quick_books_data['location_qb_id'] = $package->item_qb_id;

					$quick_books_data['advertiser_qb_id'] = $advertiser->user_qb_id;

					$quick_books_data['advertiser_email'] = $advertiser->email;


					$qb_add = $this->quick_books->create_invoice($quick_books_data);

					// echo "<pre>";
					// print_r($qb_add);
					// echo "</pre>"; die;

					if ($qb_add['error'] == false) {
						$form_data['advert_qb_id'] = $qb_add['msg'];

						$form_data['advert_number'] = ADVERT_NUMBER_PREFIX.mt_rand(100000, 999999); 

						$form_data['created_by'] = get_user_id();

						if ($user_role == 1) {

							$form_data['status'] = 1;
						}

						$advert = $this->crud_model->add_data($this->table,$form_data);


						//$notify['receiver_id'] = $location->location_owner;

						$notify['message'] = sprintf($this->lang->line('new_advert_added'), get_user_fullname());

						$notify['link'] = "advertisers/view_advertisements";

						//$this->add_notifications($notify);

						$this->add_notifications($notify,'1');



						$task['advert_id'] = $advert;

						$task['task_type'] = "add_advert";

						$task['date'] = date('Y-01-m', $start_timestamp);

						$task1 = $this->crud_model->add_data('tasks',$task);

						if ($task1) {


							$notify['message'] = $this->lang->line('new_task_added_manager');
							$notify['link'] = "location_manager";

							$this->add_notifications($notify,'5');

							$this->add_notifications($notify,'1');
						}



						$task['task_type'] = "remove_advert";

						$task['date'] = date('Y-01-m', $end_timestamp);

						$task2 = $this->crud_model->add_data('tasks',$task);

						if ($task2) {


							$notify['message'] = $this->lang->line('new_task_added_manager');
							$notify['link'] = "location_manager";

							$this->add_notifications($notify,'5');

							$this->add_notifications($notify,'1');
						}

						if ($form_data['hologram_type'] == 2) {
							$task['task_type'] = "designer";

							$task['date'] = date('Y-01-m', $start_timestamp);

							$task3 = $this->crud_model->add_data('tasks',$task);

							if ($task3) {


								$notify['message'] = $this->lang->line('new_task_added_designer');
								$notify['link'] = "designer";

								$this->add_notifications($notify,'4');

								$this->add_notifications($notify,'1');
							}

						}
					}else{

						$advert = false;
						$msg = $qb_add['msg'];

					}
				}

			}else{

					$advert = false;
					$msg = $qb_add_customer['msg'];
				}
				if ($advert) {

					if (isset($edit)) {
						$this->session->set_flashdata("success_msg","Advertisement Updated successfully");
					}else{
						$this->session->set_flashdata("success_msg","Advertisement created successfully");
					}


					redirect(base_url()."advertisers/view_advertisements");

				}else{

					if (isset($edit)) {
						if (!isset($msg)) {
							$msg = "Advertisement Not updated";
						}
					}else{
						if (!isset($msg)) {
							$msg = "Advertisement Not created";
						}
						$this->session->set_flashdata("error_msg",$msg);
					}

					//redirect($_SERVER['HTTP_REFERER']);
				}
			}
		}


		$this->data['location_id'] = $location_id;

		if ($advert_id != "") {
			$where['advert_id'] = $advert_id;

			$this->data['advert'] = $this->crud_model->get_data($this->table,$where,true);
		}

		$this->data['advertisers'] = $this->crud_model->get_data('users',array("user_role"=>6));
		$this->data['packages'] = $this->crud_model->get_data('packages');

		$this->load->view('common/header',$this->data);
		$this->load->view('common/sidebar',$this->data);
		$this->load->view('advertisers/manage_advertisement',$this->data);
		$this->load->view('common/footer');
	}

	public function view_advertisements()
	{
		$join['locations l'] = "ad.location_id=l.location_id";
		$join['users u'] = "u.user_id=ad.advertiser_id";

		$where = array();
		$user_role = get_user_role();

		$this->data['user_role'] = $user_role;

		if ($user_role != 1) {

			if ($user_role == 3) {
				$where['ad.created_by'] = get_user_id();
			}elseif ($user_role == 2) {
				$where['l.location_owner'] = get_user_id();
			}elseif ($user_role == 6) {
				$where['ad.advertiser_id'] = get_user_id();
			}
		}

		$this->data['adverts'] =  $this->crud_model->get_data("advertisements ad",$where,'',$join,'','*,ad.status as advert_status');


		$this->load->view('common/header',$this->data);
		$this->load->view('common/sidebar',$this->data);
		$this->load->view('advertisers/view_advertisements');
		$this->load->view('common/footer');
	}

	public function advertisement_info($location_id,$advert_id)
	{
		$join['locations l'] = "ad.location_id=l.location_id";
		$join['users u'] = "u.user_id=ad.advertiser_id";
		$join['packages p'] = "p.package_id=ad.package_id";

		$where = array();
		$user_role = get_user_role();

		$this->data['user_role'] = $user_role;
		$where['advert_id'] = $advert_id;
		$where['l.location_id'] = $location_id;

		if ($user_role != 1) {

			if ($user_role == 3) {
				$where['ad.created_by'] = get_user_id();
			}elseif ($user_role == 2) {
				$where['l.location_owner'] = get_user_id();
			}
		}

		$this->data['locations'] =  $this->crud_model->get_data("advertisements ad",$where,true,$join,'','*,ad.status as advert_status');
		
		$this->load->view('common/header',$this->data);
		$this->load->view('common/sidebar',$this->data);
		$this->load->view('advertisers/view_advertisements_info',$this->data);
		$this->load->view('common/footer');
	}


	public function delete_advertisement($id){



		$where['advert_id'] = $id;

		$advert =  $this->crud_model->get_data($this->table,$where,true,'','','advert_qb_id');


		$qb_delete_invoice = $this->quick_books->delete_invoice($advert->advert_qb_id);

		if ($qb_delete_invoice['error'] == false) {

			$result = $this->crud_model->delete_data($this->table,$where);
		}else{

			$this->session->set_flashdata("error_msg",$qb_delete_invoice['msg']);
		}

		redirect($_SERVER['HTTP_REFERER']);
		
	}


	public function manage_advertisers($user_id = ""){

		$form_data = $this->input->post();

		if (!empty($form_data)) {

			$user_role = get_user_role();


			$edit = false;

			if ($user_id != "") {
				$edit = true;

				$qb_update_customer = $this->quick_books->update_customer($form_data);

				if ($qb_update_customer['error'] == false) {

					$where['user_id'] = $form_data['user_id'];

					unset($form_data['user_id']);

					$advert = $this->crud_model->update_data('users',$where,$form_data);

				}else{
					$advert = false;
					$msg = $qb_update_customer['msg'];
				}

			}else{

				$qb_add_customer = $this->quick_books->add_customer($form_data);

				if ($qb_add_customer['error'] == false) {


					$form_data['created_by'] = get_user_id();

					$form_data['user_qb_id'] = $qb_add_customer['msg'];

					if ($user_role == 1) {

						$form_data['status'] = 1;
					}

					$advert = $this->crud_model->add_data('users',$form_data);
				}else{
					$advert = false;
					$msg = $qb_add_customer['msg'];
				}

			}


			if ($advert) {

				if (isset($edit)) {
					if (!isset($msg)) {
						$msg = "Advertiser Updated successfully";
					}
				}else{
					if (!isset($msg)) {
						$msg = "Advertiser created successfully";
					}
				}

				$this->session->set_flashdata("success_msg",$msg);

				redirect(base_url()."advertisers/view_advertisers");

			}else{

				if (isset($edit)) {
					if (!isset($msg)) {
						$msg = "Advertiser Not Updated";
					}
				}else{
					if (!isset($msg)) {
						$msg = "Advertiser Not created";
					}
				}

				$this->session->set_flashdata("error_msg",$msg);


				redirect($_SERVER['HTTP_REFERER']);
			}
		}

		if ($user_id != "") {
			$where['user_id'] = $user_id;

			$this->data['user'] = $this->crud_model->get_data('users',$where,true);
		}


		$this->load->view('common/header',$this->data);
		$this->load->view('common/sidebar',$this->data);
		$this->load->view('advertisers/manage_advertisers');
		$this->load->view('common/footer');
	}


	public function view_advertisers()
	{

		$where = array();
		$user_role = get_user_role();

		$this->data['user_role'] = $user_role;

		if ($user_role != 1) {

			$where['created_by'] = get_user_id();
		}

		$where['user_role'] = 6;

		$this->data['advertisers'] =  $this->crud_model->get_data("users",$where);


		$this->load->view('common/header',$this->data);
		$this->load->view('common/sidebar',$this->data);
		$this->load->view('advertisers/view_advertisers');
		$this->load->view('common/footer');
	}

	public function delete_advertiser($id){

		$where['user_id'] = $id;

		$advertiser =  $this->crud_model->get_data("users",$where,true,'','','user_qb_id');


		$qb_inactive_customer = $this->quick_books->inactive_customer($advertiser->user_qb_id);

		if ($qb_inactive_customer['error'] == false) {

			$result = $this->crud_model->delete_data('users',$where);

		}else{

			$this->session->set_flashdata("error_msg",$qb_inactive_customer['msg']);

		}

		redirect($_SERVER['HTTP_REFERER']);

	}

}
