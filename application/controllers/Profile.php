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
        $data = $this->Profile_Model->profile_data();
        $this->load->view('Profile/show_profile', array('data' => $data));
    }

    public function addUpdate()
    {
        $data = $this->input->post();
        // print_r($data);die;
        $rules = array(
            array(
                'field' => 'phone',
                'rules' => 'required|min_length[10]|max_length[10]'
            ),
            array(
                'field' => 'address',
                'rules' => 'trim'
            ),
            array(
                'field' => 'designation',
                'rules' => 'trim'
            ),
            array(
                'field' => 'country',
                'rules' => 'trim'
            ),
            array(
                'field' => 'state',
                'rules' => 'trim'
            ),
            array(
                'field' => 'twitter',
                'rules' => 'trim'
            ),
            array(
                'field' => 'insta',
                'rules' => 'trim'
            ),
            array(
                'field' => 'facebook',
                'rules' => 'trim'
            )
        );
        $this->form_validation->set_rules($rules);
        if ($this->form_validation->run() == TRUE) {
            $result = $this->Profile_Model->addUpdate($data);
            if ($result['code'] == '3') {
                $sdata = $this->session->userdata;
                $sno = $sdata['sno'];
                $this->fx->generateUserLogs(2, 'Profile', $sno, '');
                echo "3";
            }
        } else {
            echo json_encode(array('statusCode' => 400, 'error' => strip_tags(validation_errors())));
            return;
        }
    }
}
