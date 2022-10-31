<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Theme extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Theme_Model');
    }
    public function index()
    {
        $details = $this->Theme_Model->fetch();
        $this->load->view('theme/theme', array('color' => $details));
    }

    public function update()
    {
        $data = $this->input->post();
        $responce = $this->Theme_Model->update($data);
        if($responce){
            echo "11";
        }
    }
}
