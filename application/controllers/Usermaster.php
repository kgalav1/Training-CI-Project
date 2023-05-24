<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Usermaster extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_Model');
    }

    public function index()
    {
        $this->load->view('usermaster/usermaster_view');
    }

    public function pagination()
    {
        $data = $this->input->post();
        $get = $this->User_Model->pagination($data);
        $row = array($get)[0];
        $table_data = $this->load->view('usermaster/usertable_view', array('result' => $row), true);
        $pagination = $this->load->view('layout/pagination_view', array('result' => $row), true);
        echo json_encode(array('table_data' => $table_data, 'pagination' => $pagination));
    }

    public function editDetailsFill()
    {
        $data = $this->input->post();
        $details = $this->User_Model->editDetailsFill($data);
        echo json_encode($details);
    }

    public function deleteuser()
    {
        $data = $this->input->post();
        $result = $this->User_Model->deleteuser($data);
        if ($result['code'] == '4') { //edit
            $this->fx->generateUserLogs(3, 'User', $data['delete_id'], '');
            echo "4";
        }
    }

    public function addupdate()
    {
        $data = $this->input->post();

        $rules = array(
            array(
                'field' => 'name',
                'rules' => 'required|min_length[3]|trim'
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
            )
        );

        $this->form_validation->set_rules($rules);
        if ($this->form_validation->run() == TRUE) {
            $result = $this->User_Model->addupdate($data);
            if ($result['code'] == '3') { //edit
                $this->fx->generateUserLogs(2, 'User', $data['snoEdit'], '');
                echo "3";
            }
            if ($result['code'] == '2') {
                $this->fx->generateUserLogs(1, 'User', '', '');
                echo "2";
            }
        } else {
            echo json_encode(array('statusCode' => 400, 'error' => strip_tags(validation_errors())));
            return;
        }
    }

    public function action()
    {
        $data = $this->input->post();
        $details = $this->User_Model->excel($data);
        // Fx::p($details['rows'][0],1);
        // Fx::p($details['count'], 1);

        $this->load->library('Excel');
        echo "hii";
        die;
        $object = new PHPExcel();

        $this->excel->setActiveSheetIndex(0);

        $table_columns = array("S No.", "Name", "Email", "Phone", "Address");

        $column = 0;

        foreach ($table_columns as $feild) {
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $feild);
            $column++;
        }
        $excel_row = 2;

        foreach ($details as $excel_data) {
            print_r($excel_data->sno);
            die;
            $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $excel_data['rows'][0]->sno);
            $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $excel_data['rows'][0]->name);
            $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $excel_data['rows'][0]->email);
            $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $excel_data['rows'][0]->phone);
            $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $excel_data['rows'][0]->address);
            $excel_row++;
        }

        $this->excel->getActiveSheet()->setTitle('ReceivedMessages');
        header('Content-Type: application/vnd.ms-excel');
        $file_name = "kpi_form_" . date("Y-m-d_H:i:s") . ".xls";
        header("Content-Disposition: attachment; filename='hello'");
        // If you're serving to IE 9, then the following may be needed
        header('Cache-Control: max-age=1');
        $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
        ob_start();
        $objWriter->save("php://output");
        $xlsData = ob_get_contents();
        ob_end_clean();

        $response =  array(
            'op' => 'ok',
            'file' => "data:application/vnd.ms-excel;base64," . base64_encode($xlsData)
        );

        die(json_encode($response));
    }
}
