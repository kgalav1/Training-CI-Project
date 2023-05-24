<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Logout extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Login_Model');
    }


    public function index()
    {
        $this->session->sess_destroy();
        $this->fx->generateUserLogs(6, '', '', '');
        // $this->load->view('login_view');
        redirect("http://localhost/ciproject/welcome/index");
    }

    public function logoutbyid()
    {
        $data = $this->input->post();
        $sno = $data['sno'];

        $responce = $this->Login_Model->logoutbyid($sno);
        if ($responce) {
            echo "2";
        }
    }

    public function logoutOther(){
        $sno = $this->session->userdata['loginSession']['sno'];
        $responce = $this->Login_Model->is_login($sno);
        
        if ($responce['users'][0]['is_login'] == 0) {
            echo "10";
        }
    }
}
