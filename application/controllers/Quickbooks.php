<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//require("quickbooks/auth2/OAuth_2/Client.php");

class Quickbooks extends GH_Controller {

	public $data = array();

	public function __construct() {
		parent::__construct();

		$this->data['menu_class'] = "admin_menu";
		$this->data['title'] = "Admin";
		$this->data['sidebar_file'] = "admin/admin_sidebar";

	}

	public function index()
	{

		$from = $this->input->post();

		if (!empty($from)) {
			
			$this->settings_model->set_value('qb_client_id',$from['qb_client_id']);
			$this->settings_model->set_value('qb_client_secret',$from['qb_client_secret']);
		}

		$this->data['redirect_uri'] = $this->config->item('qb_oauth_redirect_uri');

		$this->data['qb_client_secret'] = $this->settings_model->get_value("qb_client_secret");
		$this->data['qb_client_id'] = $this->settings_model->get_value("qb_client_id");

		$this->load->view('common/header',$this->data);
		$this->load->view('common/sidebar',$this->data);
		$this->load->view('admin/quickbooks_connect');
		$this->load->view('common/footer');
	}

	public function save_token(){

		$client_id = $this->settings_model->get_value('qb_client_id');
		$client_secret = $this->settings_model->get_value('qb_client_secret');
		$authorizationRequestUrl = $this->config->item('qb_authorizationRequestUrl');
		$scope = $this->config->item('qb_oauth_scope');
		$redirect_uri = $this->config->item('qb_oauth_redirect_uri');
		$tokenEndPointUrl = $this->config->item('qb_tokenEndPointUrl');
		$grant_type= 'authorization_code';
		$response_type = 'code';
		$state = 'RandomState';
		
		$certFilePath = '';

		$client = new Client($client_id, $client_secret, $certFilePath);

		if (!isset($_GET["code"]))
		{
			

			$authUrl = $client->getAuthorizationURL($authorizationRequestUrl, $scope, $redirect_uri, $response_type, $state);
			header("Location: ".$authUrl);
			exit();
		}else
		{
			$code = $_GET["code"];
			$responseState = $_GET['state'];
			if(strcmp($state, $responseState) != 0){
				throw new Exception("The state is not correct from Intuit Server. Consider your app is hacked.");
			}


			$result = $client->getAccessToken($tokenEndPointUrl,  $code, $redirect_uri, $grant_type);

   			$this->settings_model->set_value('qb_access_token',$result['access_token']);
   			$this->settings_model->set_value('qb_refresh_token',$result['refresh_token']);
   			$this->settings_model->set_value('qb_realmId',$_GET['realmId']);

   			$this->session->set_flashdata('success_msg',"Quickbooks Connected Successfully");
		
			echo '<script type="text/javascript">
			window.opener.location.href = window.opener.location.href;
			window.close();
			</script>';

		}
	}
}