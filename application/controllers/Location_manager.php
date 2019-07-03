<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Location_manager extends GH_Controller {


	private $data;
	public $table = "locations";

	public function __construct() {
		parent::__construct();

		$this->data['menu_class'] = "manager_menu";
		$this->data['title'] = "Location Manager";
		$this->data['sidebar_file'] = "location_manager/manager_sidebar";
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



	public function index($status = 0)
	{

		$task_type = isset($_GET['type']) ? $_GET['type'] : '';

		$this->data['type'] = $task_type;
		$this->data['start_date'] = "";
		$this->data['end_date'] = "";
		$start_date = "";
		$end_date = "";
		

		if ($this->input->get("date_range") != "") {
			
			$date = $this->input->get("date_range");

			$data = explode("-", $date);

			$start_date =  date("Y-m-d", strtotime($data[0]));
			$end_date = date("Y-m-d", strtotime($data[1]));

			$this->data['start_date'] = date("m/d/Y", strtotime($start_date));
			$this->data['end_date'] = date("m/d/Y", strtotime($end_date));


		}


		$where_in = array();


		$join['advertisements a'] = "a.advert_id=t.advert_id";
		$join['locations l'] = "a.location_id=l.location_id";

		$where['t.status'] = $status;
		$where['a.status'] = 1;

		$user_role = get_user_role();

		if ($user_role == 3) {
			$where['a.created_by'] = get_user_id();
		}


		if ($task_type != '') {

			$where['t.task_type'] = $task_type;
		}else{

			$where_in['t.task_type'] = array('add_advert','remove_advert');
		}

		if ($start_date != '' & $end_date != "") {

				$where['date(t.date) >='] = $start_date;
				$where['date(t.date) <='] = $end_date; 
		}

		

		$this->data['tasks'] = $this->crud_model->get_data('tasks t',$where,'',$join,'','','',$where_in);

		$this->data['status'] = $status;
		
		$this->load->view('common/header',$this->data);
		$this->load->view('common/sidebar',$this->data);
		$this->load->view('location_manager/manager');
		$this->load->view('common/footer');
	}

	public function tasks_assigned($task_id){
		
		$where['t.task_id'] = $task_id;
		$join['advertisements a'] = "a.advert_id=t.advert_id";
		$join['locations l'] = "a.location_id=l.location_id";

		$this->data['task'] = $this->crud_model->get_data('tasks t',$where,true,$join,'','*,t.status as task_status');

		$this->load->view('common/header',$this->data);
		$this->load->view('common/sidebar',$this->data);
		$this->load->view('location_manager/tasks_assigned');
		$this->load->view('common/footer');
	}




	public function deliver_task($task_id){

		$form_data = $this->input->post();

		if (!empty($form_data)) {

			if ($_FILES['proof_file']['error'] == 4)
			{

				$this->form_validation->set_rules('proof_file', '*File', 'required', array(
					'required' => '%s Missing'
				));

				$result = $this->form_validation->run();

			}else{

				$result = true;
			}


			if ($result) {

				$proof_file = $this->crud_model->upload_file($_FILES['proof_file'],'proof_file',PROOF_UPLOAD_PATH);

				if ($proof_file) {

					$where['task_id'] = $task_id;

					$update_data['delivery_file'] = $proof_file;

					$proof = $this->crud_model->update_data("tasks",$where,$update_data);

					$join['advertisements a'] = "a.advert_id=t.advert_id";
					$join['users u'] = "u.user_id=a.created_by";

					$user = $this->crud_model->get_data("tasks t",array("t.task_id"=>$task_id),true,$join,'','u.user_id');

					$notify['receiver_id'] = $user->user_id;

					$notify['message'] = sprintf($this->lang->line('task_delivered'), get_user_fullname());

					$notify['link'] = "location_manager/view_deliveries";

					$this->add_notifications($notify);

					$this->add_notifications($notify,'1');

				}


				if ($proof) {
					$this->session->set_flashdata("success_msg","Task Delivered");

				}else{
					$this->session->set_flashdata("error_msg","Task Not Delivered");
				}

				redirect($_SERVER['HTTP_REFERER']);
			}

		}



		$this->data['task_id'] = $task_id;


		$this->load->view('common/header',$this->data);
		$this->load->view('common/sidebar',$this->data);
		$this->load->view('location_manager/deliver_task');
		$this->load->view('common/footer');
	}


	public function view_deliveries(){


		$join['advertisements a'] = "a.advert_id=t.advert_id";
		$join['locations l'] = "a.location_id=l.location_id";

		$where_in['t.task_type'] = array('add_advert','remove_advert');
		$where['t.delivery_file !='] =  "";

		$user_role = get_user_role();

		if ($user_role == 3) {
			$where['a.created_by'] = get_user_id();
		}


		$this->data['proofs'] = $this->crud_model->get_data("tasks t",$where,'',$join,'','*,t.status as task_status','',$where_in);


		$this->load->view('common/header',$this->data);
		$this->load->view('common/sidebar',$this->data);
		$this->load->view('location_manager/view_deliveries');
		$this->load->view('common/footer');
	}


}