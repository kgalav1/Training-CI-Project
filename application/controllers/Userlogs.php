<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Userlogs extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Logs_Model');
	}

    public function index()
    {
        $this->load->view('userlogs/userlogs_view');
    }

    public function pagination()
    {
        $data = $this->input->post();
        $get = $this->Logs_Model->pagination($data);
        $row = array($get)[0];
        $table_data = $this->load->view('userlogs/logtable_view', array('result' => $row), true);
        $pagination = $this->load->view('layout/pagination_view', array('result' => $row), true);
       echo json_encode(array('table_data' => $table_data, 'pagination' => $pagination));
    }

    
}