<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Resource_center extends GH_Controller {

	public $data = array();

	public $table = 'resource_center';

	public function __construct() {
		parent::__construct();

		$this->data['menu_class'] = "resource_menu";
		$this->data['title'] = "Resource Center";
		$this->data['sidebar_file'] = "resource_center/resource_center_sidebar";
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

	public function index($type = "")
	{
		$where = array();

		if ($type != "") {
			
			$where['resource_type'] = $type;				
		}

		$this->data['resources'] = $this->crud_model->get_data($this->table,$where);
		

		$this->load->view('common/header',$this->data);
		$this->load->view('common/sidebar',$this->data);
		$this->load->view('resource_center/resource_center',$this->data);
		$this->load->view('common/footer');
	}
}
