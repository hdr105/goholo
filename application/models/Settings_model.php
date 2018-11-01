<?php


class Settings_model extends Crud_Model{

	private $table = "settings";

	public function __construct() {
		parent::__construct();

	}

	public function get_value($key,$value = true){

		$where['setting_key'] = $key;

		$res = $this->get_data($this->table,$where,true);

		if ($value) {
			
			return $res->setting_value;

		}else{

			return $res;
		}
	}

	public function set_value($key,$value){

		$res = $this->get_value($key,false);

		if (empty($res)) {
			
			$data['setting_key'] = $key;
			$data['setting_value'] = $value;
			$res = $this->add_data($this->table,$data);
			
		}else{

			$data['setting_key'] = $key;
			$data['setting_value'] = $value;
			$where['setting_key'] = $key;
			$res = $this->update_data($this->table,$where,$data);

		}

		if ($res) {
			return true;
		}
		return false;

	}


}