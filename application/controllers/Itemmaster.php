<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Itemmaster extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Item_Model');
        $this->load->helper(array('form', 'url'));
    }

    public function index()
    {
        $this->load->view('itemmaster/itemmaster_view');
    }

    public function pagination()
    {
        $data = $this->input->post();
        $get = $this->Item_Model->pagination($data);
        $row = array($get)[0];
        $table_data = $this->load->view('itemmaster/itemtable_view', array('result' => $row), true);
        $pagination = $this->load->view('layout/pagination_view', array('result' => $row), true);
        echo json_encode(array('table_data' => $table_data, 'pagination' => $pagination));
    }

    public function editDetailsFill()
    {
        $data = $this->input->post();
        $details = $this->Item_Model->editDetailsFill($data);
        echo json_encode($details);
    }

    public function deleteItem()
    {
        $data = $this->input->post();
        $this->Item_Model->deleteItem($data);
    }

    public function addUpdate()
    {
        $data = $this->input->post();

        $rules = array(
            array(
                'field' => 'name',
                'rules' => 'required|min_length[3]|trim'
            ),
            array(
                'field' => 'desc',
                'rules' => 'required|trim'
            ),
            array(
                'field' => 'price',
                'rules' => 'required|trim'
            )
        );
        $this->form_validation->set_rules($rules);
        if ($this->form_validation->run() == TRUE) {
            if ($data['form_action'] == "insert") {

                if ($_FILES['file']['name']) {

                    $config['upload_path']          = './upload/';
                    $config['allowed_types']        = 'gif|jpg|png|jpeg';

                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload('file')) {
                        $error = array('error' => $this->upload->display_errors());
                        echo json_encode(array('statusCode' => 400, 'error' => strip_tags($error['error'])));
                        return;
                    } else {

                        $image = array('upload_data' => $this->upload->data());
                        $this->Item_Model->addUpdate($data, $image);
                    }
                } else {
                    echo "800";
                }
            } else {
                $sno = $data['snoEdit'];
                $name = $data['name'];
                $desc = $data['desc'];
                $price = $data['price'];
                $path = $data['path'];

                if ($_FILES['file']['name']) {

                    $config['upload_path']          = './upload/';
                    $config['allowed_types']        = 'gif|jpg|png|jpeg';

                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload('file')) {
                        $error = array('error' => $this->upload->display_errors());
                        echo json_encode(array('statusCode' => 400, 'error' => strip_tags($error['error'])));
                        return;
                    } else {
                        $image = array('upload_data' => $this->upload->data());
                        $destination = $image['upload_data']['file_name'];
                        // print_r($destination);die;

                        $data = array(
                            'name' => $name,
                            'desc' => $desc,
                            'price' => $price,
                            'image' => $destination
                        );
                        $this->db->update('itemmaster', $data, "sno = $sno");
                        echo "3";
                    }
                } else {

                    $data = array(
                        'name' => $name,
                        'desc' => $desc,
                        'price' => $price,
                        'image' => $path
                    );
                    $this->db->update('itemmaster', $data, "sno = $sno");
                    echo "3";
                }
            }
        } else {
            // echo "hii";
            echo json_encode(array('statusCode' => 400, 'error' => strip_tags(validation_errors())));
            return;
        }
    }
}
