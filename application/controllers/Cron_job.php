<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cron_job extends CI_Controller {


	public $data = array();
	public $manually = false;

	public function __construct() {
		parent::__construct();
		$this->load->model('settings_model');
		$this->load->model('Crud_model');
		$this->data['menu_class'] = "admin_menu";
		$this->data['title'] = "Admin";
		$this->data['sidebar_file'] = "admin/admin_sidebar";
	}


	public function index(){

		$from = $this->input->post();

		if (!empty($from)) {
			
			$this->settings_model->set_value('price_per_impression',$from['price_per_impression']);
			$this->settings_model->set_value('pay_as_you_go_hour',$from['pay_as_you_go_hour']);
			$this->settings_model->set_value('pay_as_you_go_day',$from['pay_as_you_go_day']);
		}



		$this->data['price_per_impression'] = $this->settings_model->get_value("price_per_impression");
		$this->data['pay_as_you_go_hour'] = $this->settings_model->get_value("pay_as_you_go_hour");
		$this->data['pay_as_you_go_day'] = $this->settings_model->get_value("pay_as_you_go_day");


		$this->load->view('common/header',$this->data);
		$this->load->view('common/sidebar',$this->data);
		$this->load->view('admin/cron_job');
		$this->load->view('common/footer');

	}


	public function run($manually = 0)
	{

		if ($manually == 1) {
			
			$this->manually = true;
		}

		$this->pay_as_you_go();
		$this->get_impressions();

	

	}


	public function pay_as_you_go(){

		$invoice_hour_auto_operations = $this->settings_model->get_value("pay_as_you_go_hour");
		$invoice_day_auto_operations = $this->settings_model->get_value("pay_as_you_go_day");


        if ($invoice_hour_auto_operations == '') {
            $invoice_hour_auto_operations = 9;
        }

        if ($invoice_day_auto_operations == '') {
            $invoice_day_auto_operations = 1;
        }

        $invoice_hour_auto_operations = intval($invoice_hour_auto_operations);
        $invoice_day_auto_operations = intval($invoice_day_auto_operations);
        $hour_now                     = date('G');
        $day_now                     = date('N');

        if (($hour_now != $invoice_hour_auto_operations || $day_now != $invoice_day_auto_operations) && $this->manually == false ) {

            return;
        }

        $adverts = $this->crud_model->get_data("advertisements",array("status !="=>2));

		foreach ($adverts as $key => $value) {
			
			$this->crud_model->record_payment($value);
		}


		if ($this->manually == true) {
			redirect($_SERVER['HTTP_REFERER']);
		}

	}


	public function get_impressions(){
		$time = date('i', time()+36000);
		if($time != '00'){
			return;
		}

		$locations =  $this->Crud_model->get_data('locations',array('status'=>1));
		if(!empty($locations)){
			foreach ($locations as $loc) {
				if($this->db->table_exists(strtolower($loc->location_number))){
					$total_impression = $this->Crud_model->get_data(strtolower($loc->location_number),array('check_status' => 0),'','','','COUNT(impression_id) total_impression');
					$this->Crud_model->update_data(strtolower($loc->location_number),array('check_status'=> 0), array('check_status' => 1));
					$this->db->where('location_id', $loc->location_id);
					$this->db->where('status', 1);
					$this->db->set("impressions","impressions + ".$total_impression[0]->total_impression , false);
					$this->db->update('advertisements');
					$args = array();

			$args['table'] = "advertisements";
			$args['where']['location_id'] = $loc->location_id;
			$args['where']['advertisements.status'] = 1;
			$args['join']['packages'] = 'packages.package_id=advertisements.package_id'; 

			$adds = $this->crud_model->get_data_new($args);

			foreach ($adds as $key => $value) {
				// print_r($value->advertisment_type);
				if ($value->advertisment_type == 1 && ($value->impressions == $value->total_impressions || $value->impressions > $value->total_impressions)  ) {
					
					$this->db->where('advert_id', $value->advert_id);
					$this->db->set('status', 2);
					$this->db->set('end_date', date('m/d/Y'));
					$this->db->update('advertisements');

					$task['task_type'] = "remove_advert";
					$task['date'] = date('Y-d-m', strtotime(' +1 day'));
					$task['advert_id'] = $value->advert_id;

					$task2 = $this->crud_model->add_data('tasks',$task);

				}elseif ($value->advertisment_type == 2) {
					$end_date = $value->end_date;
					$cur_date = date('m/d/Y');

					if ($end_date < $cur_date) {

						$task['task_type'] = "remove_advert";
						$task['date'] = date('Y-d-m', strtotime(' +1 day'));
						$task['advert_id'] = $value->advert_id;

						$task2 = $this->crud_model->add_data('tasks',$task);

						$this->crud_model->record_payment($value);

						
					}
				}

				}
				
			}
			else{
					echo "Table Does Not Exist";
				}	
		}
		
	}

	
}

}