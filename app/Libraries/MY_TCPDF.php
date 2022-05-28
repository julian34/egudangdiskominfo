<?php

namespace App\Libraries;

use TCPDF;

class MY_TCPDF extends TCPDF {

    //Page header
    public function Header() {
        // Logo
        $image_file = ROOTPATH.'/public/img/logo-pemprov.png';
        /**
         * width : 50
         */
        $this->Image($image_file, 15, 5, 20);
        // Set font
        $this->SetFont('helvetica', 'B', 16);
        $this->Sety(8);
        $this->SetX(50);
        $this->Cell(0, 2, 'PEMERINTAH DAERAH PROVINSI PAPUA', 0, 1, '', 0, '', 0);

        $this->SetFont('helvetica', 'B', 16);
        $this->Sety(15);
        $this->SetX(51.5);
        $this->Cell(0, 2, 'DINAS KOMUNIKASI DAN INFORMATIKA', 0, 1, '', 0, '', 0);
        // Title
        // Title
        $this->SetFont('helvetica', '', 8);
        $this->Sety(25);
        $this->SetX(40);
        $this->Cell(0, 2, 'Jln. Soa Siu Dok 2 Bawah Jayapura Papua, 0967 524140-537324-537378, https://diskominfo.papua.go.id', 0, 1, '', 0, '', 0);
        // QRCODE,H : QR-CODE Best error correction
        $this->write2DBarcode('https://sobatcdoing.com', 'QRCODE,H', 0, 45, 30, 20, ['position' => 'R'], 'N');
        $style = array('width' => 0.25, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0));
        $this->Line(15, 30, 200, 30, $style);
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