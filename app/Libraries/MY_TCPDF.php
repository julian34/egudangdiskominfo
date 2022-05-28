<?php

namespace App\Libraries;

use TCPDF;

class MY_TCPDF extends TCPDF {

    //Page header
    public function Header() {
        // Logo
        $image_file = ROOTPATH.'public/assets/logo-pemprov.png';
        /**
         * width : 50
         */
        $this->Image($image_file, '', '', 50);
        // Set font
        $this->SetFont('helvetica', 'B', 11);
        $this->SetX(70);
        $this->Cell(0, 2, 'DINAS KOMUNIKASI DAN INFORMATIKA', 0, 1, '', 0, '', 0);
        $this->SetFont('helvetica', 'B', 11);
        $this->SetX(70);
        $this->Cell(0, 2, 'PROVINSI PAPUA', 0, 1, '', 0, '', 0);
        // Title
        $this->SetFont('helvetica', '', 9);
        $this->SetX(70);
        $this->Cell(0, 2, 'Jln. Soa Siu Dok 2 Bawah Jayapura Papua', 0, 1, '', 0, '', 0);
        $this->SetX(70);
        $this->Cell(0, 2, '0967 524140-537324-537378', 0, 1, '', 0, '', 0);
        $this->SetX(70);
        $this->Cell(0, 2, 'https://diskominfo.papua.go.id', 0, 1, '', 0, '', 0);
        
        // QRCODE,H : QR-CODE Best error correction
        $this->write2DBarcode('https://diskominfo.papua.go.id/', 'QRCODE,H', 0, 3, 20, 20, ['position' => 'R'], 'N');

        $style = array('width' => 0.25, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0));
        $this->Line(20, 30, 195, 30, $style);

    }

    // Page footer
    public function Footer() {
        // Position at 15 mm from bottom
        $this->SetY(-15);
        // Set font
        $this->SetFont('helvetica', 'I', 8);
        // Page number
        $this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }
}