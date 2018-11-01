<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GH_Controller extends CI_Controller {

	public function __construct() {
		parent::__construct();


		if (empty($this->session->userdata('user_session'))) {
			$redirect_url = base_url()."login";
			redirect($redirect_url);

		}
		
		$this->lang->load('main');
		

		if (isset($_GET['notify_id']) && isset($_GET['read'])) {

			if ($_GET['read'] == 0) {

				$this->crud_model->update_data("notifications",array("notify_id"=>$_GET['notify_id']),array("read"=>1));
			}
		}
	}


	public function add_notifications($notify_data,$user_role = ""){

		if ($user_role != "") {

			if (is_array($user_role)) {

				foreach ($user_role as $k => $v) {

					$users = $this->crud_model->get_data("users",array("user_role"=>$v));

					foreach ($users as $key => $value) {
						$notify_data['receiver_id'] = $value->user_id;
						$this->crud_model->add_data("notifications",$notify_data);
					}
				}

			}else{

				$users = $this->crud_model->get_data("users",array("user_role"=>$user_role));
				foreach ($users as $key => $value) {
					$notify_data['receiver_id'] = $value->user_id;
					$this->crud_model->add_data("notifications",$notify_data);
				}
			}

			
			
		}else{

			if (is_array($notify_data['receiver_id'])) {
				$data = $notify_data;
				foreach ($data['receiver_id'] as $key => $value) {
					if (!is_admin($value)) {
						$notify_data['receiver_id'] = $value;
						$this->crud_model->add_data("notifications",$notify_data);
					}
				}
			}else{
				if (!is_admin($notify_data['receiver_id'])) {
					$this->crud_model->add_data("notifications",$notify_data);
				}
			}

			

		}


	}


	public function notify_status(){

		$table = $this->input->post("table");

		switch ($table) {
			case 'locations':
			$this->notify_location_status();
			break;
			case 'advertisements':
			$this->notify_advertisements_status();
			break;
			case 'users':
			$this->notify_users_status();
			break;
			case 'tasks':
			$this->notify_tasks_status();
			break;
			default:
			return false;
			break;
		}
	}

	public function notify_location_status()
	{
		$where['location_id'] = $this->input->post("record_id");

		$location = $this->crud_model->get_data("locations",$where,true);

		$notify['receiver_id'][] = $location->location_owner;
		$notify['receiver_id'][] = $location->created_by;

		$notify['message'] = sprintf($this->lang->line('status_change'), get_user_fullname(),detect_status_change($this->input->post("status")),'location');

		$notify['link'] = "locations/view_locations";

		$this->add_notifications($notify);

		$this->add_notifications($notify,'1');


	}

	public function notify_advertisements_status(){

		$where['a.advert_id'] = $this->input->post("record_id");
		$join['locations l'] = "l.location_id=a.location_id";
		$advert = $this->crud_model->get_data("advertisements a",$where,true,$join,'','*,a.created_by as marketing_person');

		$notify['receiver_id'][] = $advert->location_owner;
		$notify['receiver_id'][] = $advert->marketing_person;

		$notify['message'] = sprintf($this->lang->line('status_change'), get_user_fullname(),detect_status_change($this->input->post("status")),'advertisement');

		$notify['link'] = "advertisers/view_advertisements";

		$this->add_notifications($notify);

		$this->add_notifications($notify,'1');

	}

	public function notify_users_status(){

		$where['user_id'] = $this->input->post("record_id");

		$user = $this->crud_model->get_data("users",$where,true);

		$user_role = get_user_role($user->user_id);

		if ($user_role == 3) {

			$notify['receiver_id'] = $user->user_id;

			$notify['message'] = sprintf($this->lang->line('status_change'), get_user_fullname(),detect_status_change($this->input->post("status")),'marketing member');

			$notify['link'] = "recruitments";

			$this->add_notifications($notify);
		}
	}


	public function notify_tasks_status(){

		$where['t.task_id'] = $this->input->post("record_id");

		$join['advertisements a'] = "a.advert_id=t.advert_id";

		$task = $this->crud_model->get_data("tasks t",$where,true,$join);

		$by_whom = "location manager";

		if ($task->task_type == "designer") {

			$by_whom = "designer";

			$notify['link'] = "designer/view_deliveries";
		
		}else{
			$notify['link'] = "location_manager/view_deliveries";
		}

		$notify['receiver_id'] = $task->created_by;

		$notify['message'] = sprintf($this->lang->line('task_status_change'), get_user_fullname(),detect_status_change($this->input->post("status")),'delivery',$by_whom);

		if (!is_admin()) {
			
			$this->add_notifications($notify,'1');	

		}else{

			$this->add_notifications($notify);
		}

		
		if ($task->task_type == "designer") {

			$this->add_notifications($notify,'4');
		}else{

			$this->add_notifications($notify,'5');
		}
		
	}


}
