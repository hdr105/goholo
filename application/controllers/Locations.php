<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Locations extends GH_Controller {

	private $data;
	public $table = "locations";

	public function __construct() {
		parent::__construct();
		
		$user_role = get_user_role();

		if ($user_role == 4) {
			$redirect_url = base_url()."designer";
			redirect($redirect_url);
		}elseif ($user_role == 5) {
			$redirect_url = base_url()."location_manager";
			redirect($redirect_url);
		}


		$this->load->model("location_model");

		$this->data['menu_class'] = "location_menu";
		$this->data['title'] = "Locations";
		$this->data['sidebar_file'] = "location/location_sidebar";
	}


	public function index()
	{

		// $this->quick_books->payments();
		// die;

		$locations = $this->crud_model->get_data($this->table);

		$filters = array();

		foreach ($locations as $key => $value) {

			$demographic = explode(',', $value->main_demographic);

			foreach ($demographic as $k => $v) {
				$filters[] = trim($v);
			}
			
			$filters[] = trim($value->industry);
		}

		$filters = array_unique($filters);
		$this->data['filters'] = array_filter($filters, function($value) { return $value !== ''; }); 

		$this->load->view('common/header',$this->data);
		$this->load->view('common/sidebar',$this->data);
		$this->load->view('location/location');
		$this->load->view('common/footer');
	}


	public function manage_location_view($id = ""){

		$form_data = $this->input->post();

		if (!empty($form_data)) {

			$user_role = get_user_role();

			extract($form_data);

			$this->form_validation->set_rules('location_address', '*Location Address', 'required', array(
				'required' => '%s Missing'
			));

			// $this->form_validation->set_rules('owner_type', '*Owner Type', 'required', array(
			// 	'required' => '%s Missing'
			// ));

			// if ($owner_type == 1) {
			// 	$this->form_validation->set_rules('location_owner', '*Location Owner', 'required', array(
			// 		'required' => '%s Missing'
			// 	));
			// }elseif ($owner_type == 2) {

			// 	$this->form_validation->set_rules('user[first_name]', '*First Name', 'required', array(
			// 		'required' => '%s Missing'
			// 	));

			// 	$this->form_validation->set_rules('user[last_name]', '*Last Name', 'required', array(
			// 		'required' => '%s Missing'
			// 	));

			// 	$this->form_validation->set_rules('user[email]', '*Email', 'required|valid_email|is_unique[users.email]', array(
			// 		'required' => '%s Missing',
			// 		'is_unique' => '%s already Registered'

			// 	));
			// 	$this->form_validation->set_rules('user[password]', '*Password', 'required|min_length[6]|max_length[12]|alpha_numeric', array(
			// 		'required' => '%s Missing',
			// 		'min_length' => '%s must be at least 6 characters',
			// 		'max_length' => '%s must be at most 12 characters',
			// 		'alpha_numeric' => '%s must be Alpha Numeric'
			// 	));
			// 	$this->form_validation->set_rules('user[re_password]', '*Re-type Password', 'required|matches[user[password]]', array(
			// 		'required' => '%s Missing',
			// 		'matches' => 'Password does not match'
			// 	));
			// }

			$result = $this->form_validation->run();

			if ($result) {
				
				$qb_vendor = true;	

				if ($owner_type == 2) {

					$qb_add_vendor = $this->quick_books->add_vendor($form_data['user']);
					if ($qb_add_vendor['error'] == false) {

						$form_data['user']['user_qb_id'] = $qb_add_vendor['msg'];

						unset($form_data['user']['re_password']);

						$form_data['user']['user_role'] = 2;
						if ($user_role != 1) {
							$form_data['user']['status'] = 0;
						}
						
						$form_data['user']['created_by'] = get_user_id();

						$form_data['location_owner'] = $this->crud_model->add_data("users",$form_data['user']);

						if ($form_data['location_owner']) {

							$this->load->library("PhpMailerLib");
							$mail = $this->phpmailerlib->welcome_email($form_data['user']);

							if (!$mail['res']) {

								$msg = $mail['data']->ErrorInfo;
							}
						}
					}else{

						$qb_vendor = false;
					}

				}

				if ($qb_vendor) {
					$location_image = $this->crud_model->upload_file($_FILES['location_image'],'location_image',LOCATION_IMAGE_UPLOAD_PATH);

					if ($location_image) {

						$form_data['location_image'] = $location_image;

					}elseif ($form_data['old_location_image'] != "") {

						$form_data['location_image'] = $form_data['old_location_image'];
					}

					$location_video = $this->crud_model->upload_file($_FILES['location_video'],'location_video',LOCATION_VIDEO_UPLOAD_PATH);

					if ($location_video) {

						$form_data['location_video'] = $location_video;

					}elseif ($form_data['old_location_video'] != "") {

						$form_data['location_video'] = $form_data['old_location_video'];
					}


					unset($form_data['old_location_image']);
					unset($form_data['old_location_video']);
					unset($form_data['user']);
					unset($form_data['owner_type']);

					$form_data['location_description'] = $this->db->escape_str($form_data['location_description']);
					$form_data['other_notes'] = $this->db->escape_str($form_data['other_notes']);
					$edit = false;

					if ($location_id != "") {
						$edit = true;
						
						//$qb_update_item = $this->quick_books->update_item($form_data);

						//if ($qb_update_item['error'] == false) {

							$where['location_id'] = $form_data['location_id'];

							unset($form_data['location_id']);

							$location = $this->crud_model->update_data($this->table,$where,$form_data);
						// }else{
						// 	$location = false;
						// 	$msg = $qb_update_item['msg'];
						// }
					}else{

						// $qb_add_item = $this->quick_books->add_item($form_data);
						// if ($qb_add_item['error'] == false) {
						// 	$form_data['location_qb_id'] = $qb_add_item['msg'];
							$form_data['created_by'] = get_user_id();

							$form_data['location_number'] = LOCATION_NUMBER_PREFIX.mt_rand(100000, 999999); 

							if ($user_role == 1) {

								$form_data['status'] = 1;
							}

							$location = $this->crud_model->add_data("locations",$form_data);

							$notify['receiver_id'] = $form_data['location_owner'];
							$notify['message'] = sprintf($this->lang->line('new_location_added'), get_user_fullname());
							$notify['link'] = "locations/view_locations";

							$this->add_notifications($notify);

							if ($user_role != 1) {

								$notify['link'] = "admin/unapproved_locations";

							}

							$this->add_notifications($notify,'1');


						// }else{

						// 	$location = false;
						// 	$msg = $qb_add_item['msg'];

						// }
					}

					

				}else{

					$location = false;
					$msg = $qb_add_vendor['msg'];
				}

				
				

				

				if ($location) {



					if (isset($edit)) {
						if (!isset($msg)) {
							$msg = "Location Updated successfully";
						}
					}else{
						if (!isset($msg)) {
							$msg = "Location created successfully";
						}
					}

					$this->session->set_flashdata("success_msg",$msg);


					redirect(base_url()."locations/view_locations");

				}else{

					if (isset($edit)) {
						if (!isset($msg)) {
							$msg = "Location Not Updated";
						}
					}else{
						if (!isset($msg)) {
							$msg = "Location Not created";
						}
					}

					$this->session->set_flashdata("error_msg",$msg);

					redirect($_SERVER['HTTP_REFERER']);
				}
			}

			

			
		}

		$this->data['owners'] = $this->crud_model->get_data("users",array("user_role"=>2));

		if ($id != "") {
			$where['l.location_id'] = $id;

			$this->data['location'] = $this->crud_model->get_data('locations l',$where,true);
		}

		$where_in['user_role'] = array(1,2,3);
		$this->data['users'] = $this->crud_model->get_data("users",'','','','','','',$where_in);

		$this->load->view('common/header',$this->data);
		$this->load->view('common/sidebar',$this->data);
		$this->load->view('location/manage_location');
		$this->load->view('common/footer');

	}

	public function view_locations(){



		$join['users ou'] = "ou.user_id=l.location_owner";
		$join['users su'] = "su.user_id=l.created_by";

		$where = array();
		$user_role = get_user_role();

		$this->data['user_role'] = $user_role;



		

		$this->data['locations'] =  $this->crud_model->get_data("locations l",$where,'',$join,'','*,l.status as location_status,CONCAT(ou.first_name, " " ,ou.last_name) AS owner_name,CONCAT(su.first_name, " " ,su.last_name) AS satff_name,l.created_by as created_by');

	
		if ($user_role != 1) {
		foreach ($this->data['locations'] as $key => $value) {
			
			if ($user_role == 3) {

			if ($value->created_by != get_user_id() && $value->location_type == 0) {
				
				unset($this->data['locations'][$key]);
			}

			}elseif ($user_role == 2) {

				if ($value->location_owner != get_user_id() && $value->location_type == 0) {
				
				unset($this->data['locations'][$key]);
			}


			}
				
			
		}

		}



		$this->load->view('common/header',$this->data);
		$this->load->view('common/sidebar',$this->data);
		$this->load->view('location/view_locations',$this->data);
		$this->load->view('common/footer');
	}


	public function delete_location($id){

		$where['location_id'] = $id;

		// $location =  $this->crud_model->get_data($this->table,$where,true,'','','location_qb_id');

		// $qb_inactive_location = $this->quick_books->inactive_item($location->location_qb_id);

		// if ($qb_inactive_location['error'] == false) {


			$result = $this->crud_model->delete_data($this->table,$where);

		// }else{

		// 	$this->session->set_flashdata("error_msg",$qb_inactive_location['msg']);

		// }

		redirect($_SERVER['HTTP_REFERER']);
		
	}


	public function get_location_marker(){

		$user_role = get_user_role();
		$where = "";
		$where_query = false;
		$or_where = false;

		$location_id = $this->input->post('location_id');

		if ($location_id != "") {
			
			$where .= 'location_id = '.$location_id;

			$where_query = true;
		}

		$filters = $this->input->post('filter');

		if ($filters != "") {
			if ($where_query) {
				$where .= " AND (";
			}
			foreach ($filters as $key => $value) {

				if ($or_where) {
					$where .= " OR ";
				}
				
				$where .= " industry like '%".$value."%'";
				$where .= " OR main_demographic like '%".$value."%'";

				$or_where = true;
			}

			if ($where_query) {
				$where .= ")";
			}
		}

		$locations = $this->location_model->get_location_marker($where); 

		if ($user_role != 1) {
			foreach ($locations as $key => $value) {
				
				if ($user_role == 3) {

				if ($value->created_by != get_user_id() && $value->location_type == 0) {
					
					unset($locations[$key]);
				}

				}elseif ($user_role == 2) {

					if ($value->location_owner != get_user_id() && $value->location_type == 0) {
					
					unset($locations[$key]);
				}


				}
					
				
			}

		}


		$res = array();

		foreach ($locations as $key => $value) {
			
			$arr['lat'] = (float) $value->lat;
			$arr['lng'] = (float) $value->lng;

			$locations[$key]->lat_lng = $arr;

			$value->user_role = $user_role;

			$locations[$key]->infowindow_content = $this->load->view("location/infowindow_content",$value,true);
			
		}
		// echo "<pre>";
		// print_r($locations);
		// exit();
		echo json_encode($locations);
		exit();
	}



}
