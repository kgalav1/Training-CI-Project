<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Invoicemaster extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Invoice_Model');
    }

    public function index()
    {
        $invoice_count = $this->Invoice_Model->getInvoiceCount();
        $this->load->view('invoicemaster/invoicemaster_view', array('count' => $invoice_count));
    }

    public function pagination()
    {
        $data = $this->input->post();
        $get = $this->Invoice_Model->pagination($data);
        $row = array($get)[0];
        $table_data = $this->load->view('invoicemaster/invoicetable_view', array('result' => $row), true);
        $pagination = $this->load->view('layout/pagination_view', array('result' => $row), true);
        echo json_encode(array('table_data' => $table_data, 'pagination' => $pagination));
    }

    public function editDetailsFill()
    {
        $data = $this->input->post();
        $details = $this->Invoice_Model->editDetailsFill($data);
        echo json_encode($details);
    }

    public function clientAutofill()
    {
        $data = $this->input->post();
        $details = $this->Invoice_Model->clientAutofill($data);
        echo json_encode(array('data' => $details));
    }

    public function itemAutofill()
    {
        $data = $this->input->post();
        $details = $this->Invoice_Model->itemAutofill($data);
        echo json_encode(array('data' => $details));
    }

    public function deleteInvoice()
    {
        $data = $this->input->post();
        $this->Invoice_Model->deleteInvoice($data);
    }

    public function addUpdate()
    {
        $data = $this->input->post();

        $rules = array(
            array(
                'field' => 'name',
                'rules' => 'required'
            ),
            array(
                'field' => 'phone',
                'rules' => 'required'
            ),
            array(
                'field' => 'itemname[]',
                'rules' => 'required'
            )
           
        );
        $this->form_validation->set_rules($rules);
        if ($this->form_validation->run() == TRUE) {

            $result = $this->Invoice_Model->addUpdate($data);
        } else {
            echo json_encode(array('statusCode' => 400, 'error' => strip_tags(validation_errors())));
            return;
        }

        // print_r($result);die;
    }

    public function sendMail()
    {
        $data = $this->input->post();
        $this->mailer->sendEmail($data['to'], $data['subject'], $data['emailbody']);
        echo "202";
    }

    public function invoicepdf()
    {
        $this->load->view('PDF/pdfset');
    }

    public function payment()
    {
        // $data = $this->input->post();
        $this->load->view('invoicemaster/payment_view');
    }
}
