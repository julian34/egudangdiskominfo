<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\Modelbarang;

class Kembalibarang extends BaseController
{

    public function __construct()
    {
        // $this->mPinjam          = new Modelpinjambarang;
        // $this->mDetPinjam       = new Modeldetailpinjambarang;
        // $this->mTemDetPinjam    = new Modeltemdetailpinjambarang;

        $this->mdbarang         = new Modelbarang();
    }


    public function index()
    {
        
        $tombolcari = $this->request->getPost('tombolcari');
       
        if(isset($tombolcari)){
            $cari = $this->request->getPost('cari');
            session()->set('cari_kdinv',$cari);
            redirect()->to('/pinjambarang/index');
        }else{
            $cari = session()->get('cari_kdinv');
        }

        $totaldata = $cari ? $this->mPinjam->tampildata_cari($cari)->countAllResults() : $this->mPinjam->countAllResults();
        
        $dataBarangmasuk = $cari ? $this->mPinjam->tampildata_cari($cari)->paginate(10, 'pinjamalat') : $this->mPinjam->paginate(10, 'pinjamalat');

        $nohal = $this->request->getVar('page_pinjamalat') ? $this->request->getVar('page_pinjamalat') : 1;

        $data = [
            'tampildata' => $dataBarangmasuk,
            'pager'      => $this->mPinjam->pager,
            'nohal'      => $nohal,
            'totaldata'  => $totaldata,
            'cari'       => $cari 
        ];

        return view('kembalibarang/viewdata',$data);
    }

    public function add(){
        return view('kembalibarang/forminv');
    }

    Public function adddetail(){
        $data = [
            'kodeinv' => $this->mPinjam->renderKdinv()
        ];
        return view('pinjambarang/forminput',$data);
    }

    public function edit($kodeinv){

        $cekFaktur =  $this->mPinjam->cekFaktur($kodeinv);
        if($cekFaktur->getNumRows() > 0){
            $row = $cekFaktur->getRowArray();
            $data = [ 
                'kodeinv'           => $row['kodeinv'],
                'tglpinjam'         => $row['tglpinjam'],
                'kegiatan'          => $row['kegiatan'],
                'stakeholder'       => $row['stakeholder'],
                'jnsstakholder'    => $row['jnsstakholder'],
                'lokasi'            => $row['lokasi'],
            ];
            return view('pinjambarang/formedit',$data);
        }else{
            exit('maaf data tidak ditemukan');
        }
    }

    //proses
    function dataTemp(){
        if($this->request->isAJAX()){
            $kodeinv     = $this->request->getPost('kodeinv');
            
            $data  = [
                'dataTemp' => $this->mTemDetPinjam->tampilDataTemp($kodeinv) 
            ];
            
            $json = [
                'data'     => view('pinjambarang/datatemp',$data) 
            ];
            echo json_encode($json);
        }else{
            exit('maaf tidak bisa dipanggil');
        }
    }

}