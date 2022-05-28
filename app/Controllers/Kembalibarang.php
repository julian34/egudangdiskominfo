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



class Kembalibarang extends BaseController
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

        return view('kembalibarang/viewdata',$data);
    }

    public function add(){
        return view('kembalibarang/forminput');
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
                'dataTemp' => $this->mDetPinjam->dataDetail($kodeinv)
            ];
            
            $json = [
                'data'     => view('kembalibarang/datatemp',$data) 
            ];
            
            echo json_encode($json);
        
        }else{
            exit('maaf tidak bisa dipanggil');
        }
    }

    //
    public function cariDataInv(){
        if($this->request->isAJAX()){

            $json = [
                'data'     => view('kembalibarang/modalcariinv')
            ];

            echo json_encode($json);
        } else {
            exit('maaf tidak bisa dipanggil');
        }
    }

    public function detailCariInv(){
         if($this->request->isAJAX()){
            $cari = $this->request->getPost('cari');
            
            $data = $this->mPinjam->tampildata_cari_modal($cari)->get();

            if($data != null){
                $json = [
                        'data' => view('kembalibarang/detaildatapinjam',[
                            'tampildata' => $data
                        ])
                    ];
                
                echo json_encode($json); 
            }

        } else {
            exit('maaf tidak bisa dipanggil');
        }
    }

    public function ambilDataInv(){
        if($this->request->isAJAX()){
            $kodeinv        = $this->request->getPost('kodeinv');
            $ambildata      = $this->mPinjam->find($kodeinv);

            if($ambildata == NULL){
                $json = [
                    'error' => 'Data Inv tidak ditemukan'
                ];
            }else{
                $data       = [
                    'stakeholder'   => $ambildata['stakeholder'],
                    'jnsstakholder' => $ambildata['jnsstakholder'],
                    'kegiatan'      => $ambildata['kegiatan'],
                    'lokasi'        => $ambildata['lokasi'],
                    'tglpinjam'     => $ambildata['tglpinjam']
                ];
    
                $json = [
                    'sukses' => $data
                    // 'sukses' => 'data ada ada'
                ];
            }

            echo json_encode($json);
            
        }else{
            exit('maaf tidak bisa dipanggil');
        }
    }

    //Prosess

    function selesaiTransaksi(){
        if($this->request->isAJAX()){
            $kodeinv         = $this->request->getPost('kodeinv');
            $tglkembali      = strtotime($this->request->getPost('tglkembali'));

            $dataTemp = $this->mDetPinjam->getWhere([
                'detkodeinv' => $kodeinv
            ]);

            if($dataTemp->getNumRows() == 0){
                $json = [
                    'error' => 'Maaf,  belum ada item untuk No. Invoice '.$kodeinv.' !'
                ];
            }else{
                // Simpan Ke Tabel Barang Masuk 
                $this->mKembali->insert([
                'kodeinv'           => $kodeinv,
                'tglkembali'        => date('Y-m-d',$tglkembali),
                'status'            => 'kembali'
                ]);

                // simpan ke Tabel detail Barang Masuk
                foreach($dataTemp->getResultArray() as $row):
                    $this->mDetKembali->insert([
                        'detkodeinv'     => $row['detkodeinv'],
                        'detbrgkode'     => $row['detbrgkode'],
                        'detjml'         => $row['detjml']   
                    ]);
                endforeach;

                //hapus data dari tabel temp berdasarkan
                // $this->mdtembarang->emptyTable();


                $json = [
                    'sukses' => 'Transaksi No. Invoice '.$kodeinv.' | '.date('Y-m-d',$tglkembali).' Berhasil Disimpan'
                ];
            }

            echo json_encode($json);

        }else {
            exit('maaf tidak bisa dipanggil');
        }
    }


}