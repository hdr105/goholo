<?php

function get_role_byid($id)
{
	switch ($id) {
		case '1':
		return "Super Admin";
		break;
		case '2':
		return "Location Owner";
		break;
		case '3':
		return "Marketing Team";
		break;
		case '4':
		return "Designer";
		break;
		case '5':
		return "Location Manager";
		break;
		default:
		return "";
		break;
	}
}

function get_user_fullname(){

	$ci = &get_instance();

	$user=$ci->session->userdata("user_session");

	return $user->first_name." ". $user->last_name;
}

function get_user_id(){


	$ci = &get_instance();

	$user=$ci->session->userdata("user_session");

	return $user->user_id;

}

function get_user_role($user_id = ""){


	$ci = &get_instance();

	if ($user_id == "") {

		$user = $ci->session->userdata("user_session");

	}else{

		$user = $ci->crud_model->get_data("users",array("user_id"=>$user_id),true);

	}

	return $user->user_role;

}

function get_user_commission($user_id = ""){


	$ci = &get_instance();

	if ($user_id == "") {

		$user_id = get_user_id();

	}

	$user = $ci->crud_model->get_data("users",array("user_id"=>$user_id),true);

	return $user->user_commission;

}

function is_admin($user_id = ""){

	$ci = &get_instance();

	if ($user_id == "") {

		$user = $ci->session->userdata("user_session");

	}else{

		$user = $ci->crud_model->get_data("users",array("user_id"=>$user_id),true);

	}

	if ($user->user_role == 1) {

			return true;
	}

	return false;

}


function has_permission($permission, $roleid = ""){

	$ci = &get_instance();


	$roleid = ($roleid == '' ? get_user_role() : $roleid);

	if ($roleid == 1) {
		return true;
	}

	$join['permissions p'] = "p.permissionid=r.permissionid";
	$where['r.roleid'] = $roleid;
	$where['p.shortname'] = $permission;

	$permet = $ci->crud_model->get_data("rolepermissions r",$where,true,$join,'','permission');

	if ($permet->permission == 1) {

		return true;
	}

	return false;

}

function get_resouce_type($type){
	if ($type == 1) {

		$resource_type = "Location Contract";

	}else if ($type == 2) {

		$resource_type = "Advertisers Contract";
	}else if ($type == 3){

		$resource_type = "Marketing/Promo";

	}else if ($type == 4){

		$resource_type = "Location Criteria";

	}else if ($type == 5){

		$resource_type = "Advertising Tips";
	}


	return $resource_type;
}


function get_status($status){

	if ($status == 1) {
		
		return "Active";
	}else{

		return "Dective";
	}
}

function detect_status_change($status){
	if ($status == 1) {
		
		return "approved";
	}else{

		return "disapproved";
	}
}