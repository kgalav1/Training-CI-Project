<?php

// require_once __DIR__ . '/vendor/autoload.php';
// print_r(__DIR__);die;
class InvoicePDF extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Invoice_Model', 'invoice');
    }
    public function index()
    {
        include "plugin/mpdf/src/Mpdf.php";
        $mpdf = new \Mpdf\Mpdf();
        $mpdf->WriteHTML('<h1>Hello world!</h1>');
        $mpdf->Output();
    }
}
