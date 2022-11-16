<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function index()
    {
        $page = 'layout/dashboard_view';
        $data['title'] = ucfirst($page); // Capitalize the first letter
        $this->load->model('Login_Model');
        $data = $this->Login_Model->logindata();
        $this->load->view($page, $data);
    }
}
