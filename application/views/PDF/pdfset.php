<?php

use Mpdf\Tag\P;

require_once __DIR__ . '/vendor/autoload.php';

$pdf_id['invoice_id'] = $id;

$data = $this->Invoice_Model->editDetailsFill($pdf_id);
// print_r($data);die;

if (!empty($data)) {
    ob_start();
    foreach ($data as $key => $val) {
        $$key = $val;
    }
    require('assets/pdf/PDF_format.php');
    $html = ob_get_clean();
    ob_end_flush();

    $mpdf = new \Mpdf\Mpdf();
    $mpdf->SetTitle('Invoice PDF');
    $mpdf->WriteHTML($html);
    $content = $mpdf->Output();
    // echo $content;

    $filename ="pdf/invoice-SAN" . $data['responce'][0]->invoice_id . '.pdf';
    downloadPdf($filename, $html, 4, 'F');
} else {
    echo "No details found for invoice ID $id";
}

function downloadPDF($invoice ,$html, $margin = 0, $mode = 'F') {
    $mpdf = new \Mpdf\Mpdf();
    foreach ($html as $key => $content) {
        if ($key > 0) {
            $mpdf->AddPage();
        }
        $mpdf->WriteHTML($content);
    }
        return $mpdf->Output($invoice, $mode);
   
}


?>
