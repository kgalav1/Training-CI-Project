<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Clientmaster extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Client_Model');
    }

    public function index()
    {
        $country = $this->Client_Model->getCountry();
        $this->load->view('clientmaster/clientmaster_view', array('country' => $country));
    }

    public function getState()
    {
        $state_data = $this->input->post();
        $state = $this->Client_Model->getState($state_data);
        echo json_encode(array('state' => $state));
    }

    public function getCity()
    {
        $city_data = $this->input->post();
        $city = $this->Client_Model->getCity($city_data);
        echo json_encode(array('city' => $city));
    }

    public function pagination()
    {
        $data = $this->input->post();
        $get = $this->Client_Model->pagination($data);
        $row = array($get)[0];
        $table_data = $this->load->view('clientmaster/clienttable_view', array('result' => $row), true);
        $pagination = $this->load->view('layout/pagination_view', array('result' => $row), true);
        // $this->fx->generateUserLogs(4, 'Client List', '', '');
       echo json_encode(array('table_data' => $table_data, 'pagination' => $pagination));
    }

    public function editDetailsFill()
    {
        $data = $this->input->post();
        $details = $this->Client_Model->editDetailsFill($data);
        echo json_encode($details);
    }

    public function deleteClient()
    {
        $data = $this->input->post();
        $this->fx->generateUserLogs(3, 'Client', $data['delete_id'], '');
        $this->Client_Model->deleteClient($data);
    }

    public function addUpdate()
    {
        $data = $this->input->post();
        if($data['form_action'] == 'insert'){
        $rules = array(
            array(
                'field' => 'name',
                'rules' => 'required|min_length[3]'
            ),
            array(
                'field' => 'phone',
                'rules' => 'required|min_length[10]|max_length[10]'
            ),
            array(
                'field' => 'email',
                'rules' => 'required|valid_emails|valid_email'
            ),
            array(
                'field' => 'password',
                'rules' => 'required'
            ),
            array(
                'field' => 'address',
                'rules' => 'required'
            ),
            array(
                'field' => 'country',
                'rules' => 'required'
            ),
            array(
                'field' => 'state',
                'rules' => 'required'
            ),
            array(
                'field' => 'city',
                'rules' => 'required'
            )
        );
    }else{
        $rules = array(
            array(
                'field' => 'name',
                'rules' => 'required|min_length[3]'
            ),
            array(
                'field' => 'phone',
                'rules' => 'required|min_length[10]|max_length[10]'
            ),
            array(
                'field' => 'email',
                'rules' => 'required|valid_emails|valid_email'
            ),
            array(
                'field' => 'password',
                'rules' => 'required'
            ),
            array(
                'field' => 'address',
                'rules' => 'required'
            )
            );
    }

        $this->form_validation->set_rules($rules);
        if ($this->form_validation->run() == TRUE) {
            $result = $this->Client_Model->addUpdate($data);
            // print_r($result);die;
            if($result['code'] == '3'){
                $this->fx->generateUserLogs(2, 'Client', $data['sno'], '');
                echo "3";
            }
            if($result['code'] == '2'){
                $this->fx->generateUserLogs(1, 'Client', '', '');
                echo "2";
            }
        } else {
            echo json_encode(array('statusCode' => 400, 'error' => strip_tags(validation_errors())));
            return;
        }
    }

    
}
