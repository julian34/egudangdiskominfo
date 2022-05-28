<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Libraries\MY_TCPDF AS TCPDF;

class PdfController extends BaseController
{
    public function index()
    {
        //
        return view('pdf_view');
    }

    function htmlToPDF(){
        $dompdf = new \Dompdf\Dompdf(); 
        $dompdf->loadHtml(view('pdf_view'));
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        $dompdf->stream();
    }

    public function cetak()
    {

        // create new PDF document
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        
        $pdf->AddPage();

        $html = view('invoice');

        // Print text using writeHTMLCell()
        $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

        // ---------------------------------------------------------
        $this->response->setContentType('application/pdf');
        // Close and output PDF document
        // This method has several options, check the source code documentation for more information.
        $pdf->Output('invoice-pos-sobatcoding.pdf', 'I');

    }
}