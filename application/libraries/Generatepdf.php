<?php

// error_reporting(0);
defined('BASEPATH') or exit('No direct script access allowed');
// error_reporting(0);
// ini_set('display_errors', 1);
include "plugin/mpdf/src/Mpdf.php";
// require_once __DIR__ . '/vendor/autoload.php';


class Generatepdf 
{
    public function __construct()
    {
        $this->CI = &get_instance();
    }

    public function DownloadPdf($invoice, $html, $mr = 2, $mode = 'I') 
    {
        echo "hi";
        // $mpdf = new mpdf('utf-8', 'A4','','', $mr, $mr, $mr, $mr);
        $mpdf = new \Mpdf\Mpdf();

        foreach ($html as $key => $content) {
            if ($key > 0) {
                $mpdf->AddPage();
            }
            $mpdf->WriteHTML($content);
        }
        if ($mode == 'F') {
            return $mpdf->Output($invoice, $mode);
        } else {
            return $mpdf->Output($invoice, $mode);
        }
    }
}
