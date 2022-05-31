<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\Modelkembalibarang;
use App\Models\Modeldetailkembalibarang;
use App\Models\Modelpinjambarang;
use App\Models\Modeltemdetailpinjambarang;
use App\Models\Modeldetailpinjambarang;
// use App\Models\Modeltemdetailkembalibarang;

use App\Models\Modelbarang;

use App\Libraries\MY_TCPDF AS TCPDF;

class Lpb extends BaseController
{
    public function __construct()
    {
        $this->mKembali          = new Modelkembalibarang;
        $this->mPinjam           = new Modelpinjambarang;
        $this->mDetPinjam        = new Modeldetailpinjambarang;
        $this->mDetKembali       = new Modeldetailkembalibarang;
        $this->mTemDetPinjam    = new Modeltemdetailpinjambarang;
        $this->mdbarang         = new Modelbarang();
    }

    public function index()
    {
        
        $tombolcari = $this->request->getPost('tombolcari');
       
        if(isset($tombolcari)){
            $cari = $this->request->getPost('cari');
            session()->set('cari_kdinv',$cari);
            redirect()->to('/kembalibarang/index');
        }else{
            $cari = session()->get('cari_kdinv');
        }

        $totaldata = $cari ? $this->mKembali->tampildata_cari($cari)->countAllResults() : $this->mKembali->tampildata()->countAllResults();
        
        $dataBarang = $cari ? $this->mKembali->tampildata_cari($cari)->paginate(10, 'kembalialat') : $this->mKembali->tampildata()->paginate(10, 'kembalialat');

        $nohal = $this->request->getVar('page_kembalialat') ? $this->request->getVar('page_kembalialat') : 1;

        $data = [
            'tampildata' => $dataBarang,
            'pager'      => $this->mKembali->pager,
            'nohal'      => $nohal,
            'totaldata'  => $totaldata,
            'cari'       => $cari 
        ];

        return view('laporan/viewdata',$data);
    }

    public function listdata(){
        if($this->request->isAJAX()){
            $tanggal    = $this->request->getPost('tanggal');
            $tglawal    = $this->request->getPost('startDate');
            $tglakhir   = $this->request->getPost('endDate');
            // $data = explode(' - ', $tanggal);
            $data  = [
                'tampildata' => $this->mKembali->laporanpb($tglawal,$tglakhir)->get()
            ];

            $json = [
                'data'     => view('laporan/tabeldata',$data) 
            ];
            
            echo json_encode($json);
        }else{
            exit('maaf tidak bisa dipanggil');
        }
    }

    public function printLap(){
        if($this->request->isAJAX()){
            $tanggal    = $this->request->getPost('tanggal');
            $tglawal    = $this->request->getPost('startDate');
            $tglakhir   = $this->request->getPost('endDate');
            $hasil      = explode("-", $tanggal);
            foreach ($hasil as $key) {
                $data = $key;
            }
            echo json_encode('suskses | ['.$data.'] '.$tglawal.' | '.$tglakhir.' | '.$tanggal);
        }else{
            exit('maaf tidak bisa dipanggil');
        }
    }

    public function printInvPdf(){
        // create new PDF document
    }

    function hari($d){
        switch($d){
            case 'Sun':
                $hari_ini = "Minggu";
            break;
     
            case 'Mon':			
                $hari_ini = "Senin";
            break;
     
            case 'Tue':
                $hari_ini = "Selasa";
            break;
     
            case 'Wed':
                $hari_ini = "Rabu";
            break;
     
            case 'Thu':
                $hari_ini = "Kamis";
            break;
     
            case 'Fri':
                $hari_ini = "Jumat";
            break;
     
            case 'Sat':
                $hari_ini = "Sabtu";
            break;
            
            default:
                $hari_ini = "Tidak di ketahui";		
            break;
        }
        return $hari_ini;
    }
    
}