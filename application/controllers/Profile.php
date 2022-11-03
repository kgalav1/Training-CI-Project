<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Profile_Model');
    }

    public function index()
    {
        $data = $this->Profile_Model->profile_data();
        $this->load->view('Profile/edit_profile', array('data' => $data));
    }

    public function View()
    {
        $this->load->view('Profile/show_profile');
    }
}
