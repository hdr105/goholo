<?php
class Crud_model extends CI_Model{


	public function __construct() {
		parent::__construct();

	}
//$table,$where = array(),$single_row = false,$join = array(), $like = array(),$select = "*",$or_where = "",$where_in = "", $order_by = ""

	public function get_data_new($args){

		extract($args);

		$select = (isset($select) ? $select : "*");
		$single_row = (isset($single_row) ? $single_row : false);

		
		$this->db->select($select);
		$this->db->from($table);

		if (!empty($join)) {
			foreach ($join as $key => $value) {
				$this->db->join($key,$value,'left');
			}
		}

		if (!empty($where)) {
			$this->db->where($where);
		}


		if (!empty($or_where)) {
			$this->db->or_where($or_where);
		}		
		
		if (!empty($where_in)) {
			
			foreach ($where_in as $key => $value) {
				$this->db->where_in($key, $value);
			}
			
		}

		if (!empty($like)) {
			$this->db->like($like);
		}

		if ($single_row) {
			
			$res = $this->db->get()->row();

		}else{

			if (!empty($order_by)) {
				$this->db->order_by($order_by);
			}

			

			$res = $this->db->get()->result();

		}

		return $res;

	}

	public function get_data($table,$where = array(),$single_row = false,$join = array(), $like = array(),$select = "*",$or_where = "",$where_in = "", $order_by = "" ){

		
		$this->db->select($select);
		$this->db->from($table);

		if (!empty($join)) {
			foreach ($join as $key => $value) {
				$this->db->join($key,$value,'left');
			}
		}

		if (!empty($where)) {
			$this->db->where($where);
		}


		if (!empty($or_where)) {
			$this->db->or_where($or_where);
		}		
		
		if (!empty($where_in)) {
			
			foreach ($where_in as $key => $value) {
				$this->db->where_in($key, $value);
			}
			
		}

		if (!empty($like)) {
			$this->db->like($like);
		}

		if ($single_row) {
			
			$res = $this->db->get()->row();

		}else{

			if (!empty($order_by)) {
				$this->db->order_by($order_by);
			}

			

			$res = $this->db->get()->result();

		}

		return $res;

	}


	public function delete_data($table,$where){

		$this->db->where($where);
		$res = $this->db->delete($table);

		return $res;
	}


	public function add_data($table,$data,$batch = false){

		if ($batch) {
			$res =  $this->db->insert_batch($table, $data); 
		}else{
			$res = $this->db->insert($table, $data);
		}
		return $this->db->insert_id();

	}


	public function update_data($table,$where,$data,$batch = false){

		if ($batch) {
			$res = $this->db->update_batch($table,$data,$where);
		}else{
			
			$this->db->where($where);
			$res = $this->db->update($table, $data);
		}
		
		return $res;
	}



	public function upload_file($file,$input_name,$path){


		if ($file['error'] != 4 ) {
			$config['upload_path']          = $path;
			$config['allowed_types']        = '*';
			$file_name = rand().$file['name'];
			$config['file_name'] = str_replace(" ","_",$file_name);

			$this->load->library('upload');

			$this->upload->initialize($config);

			if ( $this->upload->do_upload($input_name))
			{
				return $config['file_name'];
			}else{

				$error = array('error' => $this->upload->display_errors());

				print_r($error);	
			}

		}

		return false;

	}

	public function record_payment($advert_obj){

		$this->db->where('advert_id', $advert_obj->advert_id);
		$this->db->set('status', 2);
		$this->db->update('advertisements');

		$price_imp = $this->settings_model->get_value("price_per_impression");

		$unpaid_impressions = $advert_obj->impressions-$advert_obj->paid_impressions;

		$price = $unpaid_impressions*$price_imp;

		$payment = $this->quick_books->payment($advert_obj->card_id,round($price, 2));

		if (isset($payment->status) && @$payment->status == "CAPTURED") {

			$data['status'] = "success";
			$data['advert_id'] = $advert_obj->advert_id;
			$data['payment_qb_id'] = $payment->id;
			$data['amount'] = $payment->amount;
			$data['impressions'] = $unpaid_impressions;

			$this->add_data("payments",$data);

			$this->db->where('advert_id', $advert_obj->advert_id);
			$this->db->set("paid_impressions","paid_impressions + ".$unpaid_impressions , false);
			$this->db->update('advertisements');

			return true;

		}else{

			$this->db->where('advert_id', $advert_obj->advert_id);
			$this->db->set('status', 3);
			$this->db->update('advertisements');

			if (isset($payment->errors)) {
				$payment_error = $payment->errors;
				$msg = current($payment_error)->moreInfo;
			}else{

				$msg = $payment->code;
			}

			

			$this->session->set_flashdata("error_msg", "<b>Payment Error: </b>".$msg);
		}


	}


	public function get_user_data1($user_id){
		$query = $this->db->query("SELECT * FROM card_info	 WHERE user_id='$user_id'");
		$row = $query->result();
		return $row;
	}
	public function get_user_info($user_id){
		$query = $this->db->query("SELECT * FROM users	 WHERE user_id='$user_id'");
		$row = $query->result();
		return $row;
	}
	public function update_card_info($user_id,$data){
			$insertres = $this->get_user_data1($user_id);

			//print_r($insertres);
			//die;
			if(empty($insertres)){
				$result = $this->db->insert('card_info', $data);
			}else{
				$this->db->where('user_id', $user_id);
    			$result = $this->db->update('card_info', $data);
			}

		
		if($result){
			return true;
		}else{
			return false;
		}
	}

	

}



?>