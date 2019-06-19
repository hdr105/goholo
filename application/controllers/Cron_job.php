<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cron_job extends CI_Controller {


	public $data = array();
	public $manually = false;

	public function __construct() {
		parent::__construct();
		$this->load->model('settings_model');

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


}