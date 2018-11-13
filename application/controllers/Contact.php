<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {
	
public $data = array();
public $table = "locations";

	public function __construct() {
		parent::__construct();

		$this->load->model("location_model");
		$this->load->helper("custom");

	}
	public function index($value='')
	{
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

		$this->load->view('contact_us/contact_us',$this->data);
	
	}

	public function send_mail()
	{
		
		$form_data = $this->input->post();
		$this->load->library("PhpMailerLib");
		$mail = $this->phpmailerlib->contact_us_mail($form_data);

		if (!$mail) {

			$msg = $mail->ErrorInfo;
			$this->session->set_flashdata('error',$msg);
			redirect(base_url("contact"));
		}
		else
		{
			$msg = " We Will Update You Shortly";
			$this->session->set_flashdata('success',$msg);
			redirect(base_url("contact"));
		}
		
	}

		public function get_location_marker(){

		
		$where = "";
		$where_query = false;
		$or_where = false;

		

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

		$res = array();

		foreach ($locations as $key => $value) {
			
			$arr['lat'] = (float) $value->lat;
			$arr['lng'] = (float) $value->lng;

			$locations[$key]->lat_lng = $arr;

			$locations[$key]->infowindow_content = $this->load->view("location/infowindow_content",$value,true);
			
		}
		echo json_encode($locations);
		exit();
	}

	public function form_load()
	{
		$id = $_POST['id'];
	
		$where['location_id'] = $id;
		$data['location'] = $this->location_model->get_data("locations",$where,true); 
		$this->load->view('contact_us/model.php',$data);
	
	}

}
