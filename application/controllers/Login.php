<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Login_Model');
	}

	public function login()
	{
		$data = $this->input->post();
		$dats = $this->Login_Model->loginform($data);
	}
}
