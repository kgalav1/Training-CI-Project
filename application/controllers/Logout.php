<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Logout extends CI_Controller
{
	public function index(){
        $this->session->sess_destroy(); 
        $this->fx->generateUserLogs(6, '', '', '');
        // $this->load->view('login_view');
        redirect("http://localhost/ciproject/welcome/index");
    }
    
}

?>