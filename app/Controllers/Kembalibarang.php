<?php

namespace App\Controllers;

use App\Controllers\BaseController;


use App\Models\Modelkembalibarang;
use App\Models\Modeldetailkembalibarang;
// use App\Models\Modeltemdetailkembalibarang;

use App\Models\Modelbarang;



class Kembalibarang extends BaseController
{

    public function __construct()
    {
        $this->mKembali          = new Modelkembalibarang;
        $this->mDetKembali       = new Modeldetailkembalibarang;
        // $this->mTemDetKembali    = new Modeltemdetailkembalibarang;
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

        $totaldata = $cari ? $this->mKembali->tampildata_cari($cari)->countAllResults() : $this->mKembali->countAllResults();
        
        $dataBarangmasuk = $cari ? $this->mKembali->tampildata_cari($cari)->paginate(10, 'kembalialat') : $this->mKembali->paginate(10, 'kembalialat');

        $nohal = $this->request->getVar('page_kembalialat') ? $this->request->getVar('page_kembalialat') : 1;

        $data = [
            'tampildata' => $dataBarangmasuk,
            'pager'      => $this->mKembali->pager,
            'nohal'      => $nohal,
            'totaldata'  => $totaldata,
            'cari'       => $cari 
        ];

        return view('kembalibarang/viewdata',$data);
    }

    public function add(){
        return view('kembalibarang/forminput');
    }
    

    Public function adddetail(){
        $data = [
            'kodeinv' => $this->mKembali->renderKdinv()
        ];
        return view('kembalibarang/forminput',$data);
    }


    public function dataTabelList(){
        if($this->request->isAJAX()){
            $kodeinv     = $this->request->getPost('kodeinv');

            $data  = [
                'dataTemp' => $this->mTemDetKembali->tampilDataTemp($kodeinv) 
            ];
            
            $json = [
                'data'     => view('kembalibarang/datatemp',$data) 
            ];
            
            echo json_encode($json);
        
        }else{
            exit('maaf tidak bisa dipanggil');
        }
    }

    public function cariDataBarang(){
        if($this->request->isAJAX()){

            $json = [
                'data'     => view('kembalibarang/modalcariinv') 
            ];
            
            echo json_encode($json);
        } else {
            exit('maaf tidak bisa dipanggil');
        }
    }

    public function edit($kodeinv){

        $cekFaktur =  $this->mKembali->cekFaktur($kodeinv);
        if($cekFaktur->getNumRows() > 0){
            $row = $cekFaktur->getRowArray();
            $data = [ 
                'kodeinv'           => $row['kodeinv'],
                'tglkembali'         => $row['tglkembali'],
                'kegiatan'          => $row['kegiatan'],
                'stakeholder'       => $row['stakeholder'],
                'jnsstakholder'    => $row['jnsstakholder'],
                'lokasi'            => $row['lokasi'],
            ];
            return view('kembalibarang/formedit',$data);
        }else{
            exit('maaf data tidak ditemukan');
        }
    }

    //proses
    function dataTemp(){
        if($this->request->isAJAX()){
            $kodeinv     = $this->request->getPost('kodeinv');
            
            $data  = [
                'dataTemp' => $this->mTemDetKembali->tampilDataTemp($kodeinv) 
            ];
            
            $json = [
                'data'     => view('kembalibarang/datatemp',$data) 
            ];
            echo json_encode($json);
        }else{
            exit('maaf tidak bisa dipanggil');
        }
    }

}