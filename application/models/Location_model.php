<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Location_model extends Crud_model{
	public function __construct() {
		parent::__construct();

	}

	public function get_location_marker($where = ""){


		$query = "SELECT *,location_lat as lat,location_lng as lng FROM locations ";

		if ($where != "") {
			$query .= "WHERE ".$where;
		}

		$res = $this->db->query($query)->result();
		
		return $res;			
	}

}
