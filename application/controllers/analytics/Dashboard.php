<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//memory_limit 8G
//max_input_vars 100000
//max_execution_time 8000
//post_max_size 8G

class Dashboard extends GH_Controller {

	public $data = array();

	public function __construct() {

		parent::__construct();

		$this->load->model("video_model");
		
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

	public function index($locationID)
	{
		$analytics_param = array('locationID'=>$locationID);

		if ($this->input->get("daterange") != "") {
			
			$date = $this->input->get("daterange");

			$data = explode("/", $date);

			$start_date = $data[0];
			$end_date = $data[1];

			$this->data['start_date'] = date("m/d/Y", strtotime($start_date));
			$this->data['end_date'] = date("m/d/Y", strtotime($end_date));

			$analytics_param = array("start_date"=> $start_date , "end_date"=> $end_date);


		}


		$location = $this->video_model->get_data_new(array('table' => 'locations' , 'where'=> array("location_id"=>$locationID), 'single_row'=>true ));

			

		$this->data['location'] = $location;

		

		$this->data['analytics'] = $this->video_model->get_analytics($analytics_param);



		$this->load->view('analytics/includes/header');
		$this->load->view('analytics/includes/navbar');
		$this->load->view('analytics/dashboard/index',$this->data);
		$this->load->view('analytics/includes/footer');
	}
}
