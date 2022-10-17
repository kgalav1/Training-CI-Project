<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Login_Model');
		$this->load->library('fx');
	}

	public function login()
	{
		$data = $this->input->post();
		$responce = $this->Login_Model->loginform($data);
		// print_r($responce);die;
		if($responce['code'] == '104'){
			$this->fx->generateUserLogs(5, '', '', '');
			echo "104";
		}
		if($responce['code'] == '101'){
			echo "101";
		}
	}

}
