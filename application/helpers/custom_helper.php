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
		case '6':
		return "Advertisor";
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

if (!function_exists('modal_anchor')) {

    function modal_anchor($url, $title = '', $attributes = '') {
        $attributes["data-act"] = "ajax-modal";
        if (get_array_value($attributes, "data-modal-title")) {
            $attributes["data-title"] = get_array_value($attributes, "data-modal-title");
        } else {
            $attributes["data-title"] = get_array_value($attributes, "title");
        }
        $attributes["data-action-url"] = $url;

        return js_anchor($title, $attributes);
    }

}


function generateGalleryID()
{
	$v1=rand(1111,9999);
	$v2=rand(1111,9999);
    $v3=$v1.$v2;
   
    $v3=md5($v3);

    return $v3;
}


function in_array_r($needle, $haystack, $strict = false) {
    foreach ($haystack as $item) {
        if (($strict ? $item === $needle : $item == $needle) || (is_array($item) && in_array_r($needle, $item, $strict))) {
            return true;
        }
    }

    return false;
}


function deleteDir($dirPath) {
    if (! is_dir($dirPath)) {
        throw new InvalidArgumentException("$dirPath must be a directory");
    }
    if (substr($dirPath, strlen($dirPath) - 1, 1) != '/') {
        $dirPath .= '/';
    }
    $files = glob($dirPath . '*', GLOB_MARK);
    foreach ($files as $file) {
        if (is_dir($file)) {
            deleteDir($file);
        } else {
            unlink($file);
        }
    }
    rmdir($dirPath);
}

function getImpressionForAdvertisor(){


		$ci = &get_instance();
		$userid = get_user_id();
		$impressions = 0;

		$advertisements = $ci->crud_model->get_data('advertisements',array("advertiser_id"=>$userid));

		foreach ($advertisements as $key => $value) {
			
			$impressions += $value->impressions;
		}

		return $impressions;


}


function getBase64Image($url){

	$path =  base_url().'/assets/'.$url;
    $type = pathinfo($path, PATHINFO_EXTENSION);
    $data = file_get_contents($path);
    $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);

    return $base64;


}