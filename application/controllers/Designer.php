<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Designer extends GH_Controller {

	private $data;


	public function __construct() {
		parent::__construct();

		$this->data['menu_class'] = "designer_menu";
		$this->data['title'] = "Designer";
		$this->data['sidebar_file'] = "designer/designer_sidebar";
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
		$join['advertisements a'] = "a.advert_id=t.advert_id";
		$join['locations l'] = "a.location_id=l.location_id";

		$where['t.status'] = $status;
		$where['t.task_type'] = "designer";

		$where['a.status'] = 1;

		$user_role = get_user_role();

		if ($user_role == 3) {
			$where['a.created_by'] = get_user_id();
		}




		$this->data['tasks'] = $this->crud_model->get_data('tasks t',$where,'',$join);

		$this->data['status'] = $status;
		$this->load->view('common/header',$this->data);
		$this->load->view('common/sidebar',$this->data);
		$this->load->view('designer/designer');
		$this->load->view('common/footer');
	}

	public function tasks_assigned($task_id){
		
		$where['t.task_id'] = $task_id;
		$join['advertisements a'] = "a.advert_id=t.advert_id";
		$join['locations l'] = "a.location_id=l.location_id";

		$this->data['task'] = $this->crud_model->get_data('tasks t',$where,true,$join);


		$cjoin['users u'] = "u.user_id=t.user_id";

		$order_by = "comment_id DESC";

		$this->data['comments'] = $this->crud_model->get_data("task_comments t",$where,'',$cjoin,'','','','',$order_by);

		$this->data['task_id']  = $task_id;

		$this->load->view('common/header',$this->data);
		$this->load->view('common/sidebar',$this->data);
		$this->load->view('designer/tasks_assigned');
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

					$notify['link'] = "designer/view_deliveries";

					$this->add_notifications($notify);

					$this->add_notifications($notify,'1');


					

					if ($proof) {
						$this->session->set_flashdata("success_msg","Task Delivered");

					}else{
						$this->session->set_flashdata("error_msg","Task Not Delivered");
					}


					redirect($_SERVER['HTTP_REFERER']);
					
				}
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

		$where['t.task_type'] = "designer";
		$where['t.delivery_file !='] =  "";

		$user_role = get_user_role();

		if ($user_role == 3) {
			$where['a.created_by'] = get_user_id();
		}



		$this->data['proofs'] = $this->crud_model->get_data("tasks t",$where,'',$join,'','*,t.status as task_status');


		$this->load->view('common/header',$this->data);
		$this->load->view('common/sidebar',$this->data);
		$this->load->view('designer/view_deliveries');
		$this->load->view('common/footer');
	}


	public function add_comment(){

		$comment_file = $this->crud_model->upload_file($_FILES['comment_file'],'comment_file',PROOF_UPLOAD_PATH);

		if ($comment_file) {
			
			$_POST['comment_file'] = $comment_file;
		}

		$res = 	$this->crud_model->add_data("task_comments",$_POST);

		$notify['message'] = sprintf($this->lang->line('comment_added_task'), get_user_fullname());

		$notify['link'] = "designer/tasks_assigned/".$_POST['task_id'];

		$user_role = get_user_role();

		if ($user_role == 4) {
			
			$join['advertisements a'] = "a.advert_id=t.advert_id";
			$join['users u'] = "u.user_id=a.created_by";

			$user = $this->crud_model->get_data("tasks t",array("t.task_id"=>$_POST['task_id']),true,$join,'','u.user_id');

			$notify['receiver_id'] = $user->user_id;

			$this->add_notifications($notify);

		}else{

			$this->add_notifications($notify,'4');

		}

		$this->add_notifications($notify,'1');

		

		if ($res) {
			
			redirect($_SERVER['HTTP_REFERER']);
		}

	}



}


?>