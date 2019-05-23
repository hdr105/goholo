<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//memory_limit 8G
//max_input_vars 100000
//max_execution_time 8000
//post_max_size 8G

class Videos extends GH_Controller {

	public $data = array();

	public function __construct() {
		parent::__construct();
		$this->load->model("video_model");
		$this->load->model("kairos_model");

	
	}
		function _remap($method,$param){

		if (method_exists($this,$method)) {
			if (!empty($param)) {

				if(!isset($param[1])){
					$this->$method($param[0]);
				}else{
					$this->$method($param[0],$param[1]);
				}
				
			}else{
				$this->$method();
			}
			
		} else {
			$this->index($method);
		}


	}


	public function recordAnalytics($analyticsid,$videoID){

		$this->kairos_model->analyticsApi($analyticsid,$videoID);

		redirect($_SERVER['HTTP_REFERER']);
	}

	public function startAnalysis(){

			$video = $_FILES["video"]["tmp_name"];
	
			$galleryID = $this->video_model->makeFrames($video);
			//$galleryID = generateGalleryID();
			if ($galleryID) {
				
				$videoID = $this->video_model->insertGalleryID($galleryID,$this->input->post("locationID"));
				$this->kairos_model->startAnalysis($galleryID,$video,$videoID);

			}
	}


	public function index($locationID)
	{

		if (isset($_POST['submit'])) {
			
			$this->startAnalysis();

			redirect($_SERVER['HTTP_REFERER']);
		}


		$this->data['videos'] = $this->crud_model->get_data_new(array('table'=>"videos",'where'=>array("locationID"=>$locationID)));

		$this->data['locationID'] = $locationID;

		$this->load->view('analytics/includes/header');
		$this->load->view('analytics/includes/navbar');
		$this->load->view('analytics/video/upload_video',$this->data);
		$this->load->view('analytics/includes/footer');
	}


	public function deleteVideo($galleryID,$videoID){

		$res = $this->kairos_model->deleteGallery($galleryID);

		$this->video_model->deleteVideoData($videoID);

		deleteDir("./frames/".$galleryID);

		redirect($_SERVER['HTTP_REFERER']);

	}


	public function change_emotions(){

		$filter = $this->input->post("filter");
		$analytics_param = array();

		if ($this->input->post("daterange") != "") {
			
			$date = $this->input->post("daterange");

			$data = explode("/", $date);

			$start_date = $data[0];
			$end_date = $data[1];

			$analytics_param = array("start_date"=> $start_date , "end_date"=> $end_date);


		}

		$emotions = $this->video_model->get_analytics($analytics_param,$filter);


		echo json_encode($emotions);
	}
}
