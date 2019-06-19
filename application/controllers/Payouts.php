<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payouts extends GH_Controller {

	private $data;

	public function __construct() {
		parent::__construct();

		$this->data['menu_class'] = "payouts_menu";
		$this->data['title'] = "Payouts";
		$this->data['sidebar_file'] = "payouts/payouts_sidebar";
	}

	public function index()
	{



		$this->load->view('common/header',$this->data);
		$this->load->view('common/sidebar',$this->data);
		$this->load->view('payouts/payouts');
		$this->load->view('common/footer');
	}



	public function view_royalties(){

		$user_role = get_user_role();
		$this->data['user_role'] = $user_role;

		if ($user_role == 1) {
			
			$where_in['user_role'] = array("1","2","3");	

			$this->data['users'] = $this->crud_model->get_data("users",'','','','','','',$where_in);

			$user_id = isset($_POST['user']) ? $_POST['user'] : '';
			
			$this->data['user_id'] = $user_id;

		}else{

			$user_id = get_user_id();
		}

		if (isset($user_id)) {

			$member_role = get_user_role($user_id);

			$this->data['member_role'] = $member_role;

			if ($member_role == 2) {

				$where['l.location_owner'] = $user_id;

			}elseif ($member_role == 1 || $member_role == 3) {

				$where['l.created_by'] = $user_id;

			}


			$join['packages p'] = "ad.package_id=p.package_id";
			$join['locations l'] = "ad.location_id=l.location_id"; 

			$locations = $this->crud_model->get_data("advertisements ad",array(),'',$join,array(),'ad.*,l.*,p.*,ad.status as advert_status');

			$net_royalty = 0;
			$total_paid = 0;
			$remaining = 0;

			foreach ($locations as $key => $value) {


				$total_cost = 0;

				if ($value->advertisment_type == 1) {
					$total_cost = $value->total_cost;
				}elseif ($value->advertisment_type == 2 && $value->advert_status == 2) {
					
					$total_cost = get_advert_payments($value->advert_id);

					
				}
				
				if ($member_role == 2) {
					
					$value->user_royalty = ($total_cost*$value->owner_royalty)/100;

					if ($value->owner_royalty_status == 0) {
					$remaining += $value->user_royalty;
					}elseif ($value->owner_royalty_status == 1) {
						$total_paid += $value->user_royalty;
					}		

				}elseif ($member_role == 1 || $member_role == 3) {

					$value->user_royalty = ($total_cost*$value->advert_royalty)/100;

					if ($value->advert_royalty_status == 0) {
					$remaining += $value->user_royalty;
					}elseif ($value->advert_royalty_status == 1) {
						$total_paid += $value->user_royalty;
					}	
				}

				$net_royalty +=  $value->user_royalty;	

					
			}
			$this->data['locations'] = $locations;

			$this->data['net_royalty'] = round($net_royalty,2);
			$this->data['remaining'] = round($remaining,2);
			$this->data['total_paid'] =round($total_paid,2);

		}



		$this->load->view('common/header',$this->data);
		$this->load->view('common/sidebar',$this->data);
		$this->load->view('payouts/view_royalties',$this->data);
		$this->load->view('common/footer');

		
	}

	public function view_commissions(){

		$user_role = get_user_role();
		$this->data['user_role'] = $user_role;

		if ($user_role == 1) {
			
			$where_in['user_role'] = array("1","2","3");	

			$this->data['users'] = $this->crud_model->get_data("users",'','','','','','',$where_in);

			$user_id = isset($_POST['user']) ? $_POST['user'] : '';
			
			$this->data['user_id'] = $user_id;

		}else{

			$user_id = get_user_id();
		}

		if (isset($user_id)) {

			$member_role = get_user_role($user_id);

			$where['ad.created_by'] = $user_id;
			$join['packages p'] = "ad.package_id=p.package_id"; 
			$join['locations l'] = "ad.location_id=l.location_id"; 
			$advert = $this->crud_model->get_data("advertisements ad",$where,'',$join);

			$net_commission = 0;
			$total_paid = 0;
			$remaining = 0;

			foreach ($advert as $key => $value) {

				// $start_month = DateTime::createFromFormat("m/Y", $value->start_date);
				// $start_timestamp = $start_month->getTimestamp();
				// $start_date = date('Y-m-01', $start_timestamp);

				// $end_month = DateTime::createFromFormat("m/Y", $value->end_date);
				// $end_timestamp = $end_month->modify('+1 month')->getTimestamp();
				// $end_date = date('Y-m-01', $end_timestamp);

				// $qty = (int)abs((strtotime($start_date) - strtotime($end_date))/(60*60*24*30));
				
				//$cost = $value->total_cost*$qty;

				$cost = 0;

				if ($value->advertisment_type == 1) {
					$cost = $value->total_cost;
				}elseif ($value->advertisment_type == 2 && $value->advert_status == 2) {
					
					$cost = get_advert_payments($value->advert_id);

					
				}

				$user_commission = get_user_commission($user_id);

				$value->user_commission = ($cost*$user_commission)/100;

				$net_commission +=  $value->user_commission;	

				if ($value->commission_status == 0) {
					$remaining += $value->user_commission;
				}elseif ($value->commission_status == 1) {
					$total_paid += $value->user_commission;
				}

			}

			$this->data['advert'] = $advert;
			$this->data['net_commission'] = $net_commission;
			$this->data['remaining'] = $remaining;
			$this->data['total_paid'] = $total_paid;

		}



		$this->load->view('common/header',$this->data);
		$this->load->view('common/sidebar',$this->data);
		$this->load->view('payouts/view_commissions',$this->data);
		$this->load->view('common/footer');

		
	}


	public function commission_status($advert_id,$status){

		$where['advert_id'] = $advert_id;
		$data['commission_status'] = $status;

		$res = $this->crud_model->update_data('advertisements',$where,$data);

		if ($res) {
			
			$this->session->set_flashdata('success_msg','Commission status updated');
		}else{
			$this->session->set_flashdata('error_msg','Error! Commission status not updated');
		}

		redirect($_SERVER['HTTP_REFERER']);
	}

	public function royalty_status($location_id,$where_status,$status){

		$where['location_id'] = $location_id;
		$data[$where_status] = $status;

		$res = $this->crud_model->update_data('locations',$where,$data);

		if ($res) {
			
			$this->session->set_flashdata('success_msg','Royalty status updated');
		}else{
			$this->session->set_flashdata('error_msg','Error! Royalty status not updated');
		}

		redirect($_SERVER['HTTP_REFERER']);
	}


	public function bank_details(){
		
	}
}
