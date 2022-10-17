<?php
error_reporting(0);
require_once("plugin/mpdf61/mpdf.php");

$details = $this->Invoice_Model->editDetailsFill($data);



$header="";
$html = $this->fx->requireToVar('invoicemaster/PDF_format.php',$details);
$mpdf=new mPDF('utf-8','A4','','','5','5',$topMargin,'15');
$mpdf->SetTitle('Credit Note-'.$data->masterData->inc_id);
$mpdf->SetDefaultBodyCSS('font-family', 'dejavusans, Geneva, sans-serif');
$mpdf->SetDefaultBodyCSS('color', '#000');
$mpdf->SetDefaultBodyCSS('font-size', '10');
$mpdf->SetWatermarkImage('reportsHtml/images/borderBg.png',1,array('209',$borderHeight),array('0',$borderPositionY));
$mpdf->showWatermarkImage = true;
$mpdf->setHTMLHeader($header);
$mpdf->setHTMLFooter('<p style="text-align:right; font-size:7px; color:#aaa;">'.$this->html->displayPoweredByinPdf().'Page {PAGENO} of {nbpg}</p>');
$mpdf->WriteHTML($html);
$output = (isset($mail) && $mail==1)? 'S':'I';
$content = $mpdf->Output('credit_note-'.$data->masterData->inc_id.'.pdf', $output);   
echo $content;
?>
