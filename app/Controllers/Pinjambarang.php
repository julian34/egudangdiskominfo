<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\Modelpinjambarang;
use App\Models\Modeldetailpinjambarang;
use App\Models\Modeltemdetailpinjambarang;

use App\Models\Modelbarang;


class Pinjambarang extends BaseController
{

    public function __construct()
    {
        $this->mPinjam          = new Modelpinjambarang;
        $this->mDetPinjam       = new Modeldetailpinjambarang;
        $this->mTemDetPinjam    = new Modeltemdetailpinjambarang;

        $this->mdbarang         = new Modelbarang();
    }

    public function index()
    {
        //

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


        return view('pinjambarang/viewdata',$data);
    }

    public function add(){
        $tglPin = NULL;
        $data = [
            'kodeinv' => $this->mPinjam->renderKdinv($tglPin)
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

    function ambilDataBarang(){
        if($this->request->isAJAX()){
            $kodebarang     = $this->request->getPost('kodebarang');

            $ambildata      = $this->mdbarang->find($kodebarang);

            if($ambildata == NULL){
                $json = [
                    'error' => 'Data Barang tidak ditemukan'
                ];
            }else{
                $data       = [
                    'kodebarang'    => $ambildata['brgkode'],
                    'namabarang'    => $ambildata['brgnama']
                ];
    
                $json = [
                    'sukses' => $data
                ];
            }

            echo json_encode($json);
            
        }else{
            exit('maaf tidak bisa dipanggil');
        }
    }

    function simpanTemp(){
        if($this->request->isAJAX()){
            $kodeinv     = $this->request->getPost('kodeinv');
            $kodebarang = $this->request->getPost('kodebarang');
            $jumlah     = $this->request->getPost('jumlah');


            $dataTemp   = [
                'detkodeinv'    => $kodeinv,
                'detbrgkode'    => $kodebarang,
                'detjml'        => $jumlah    
            ];

            $modeTempBarang = $this->mTemDetPinjam->insert($dataTemp);

            $json = [
                'sukses' => 'Item berhasil ditambahkan'
            ];

            echo json_encode($json);
            
        }else{
            exit('maaf tidak bisa dipanggil');
        }
    }

    function hapusTempList(){
        if($this->request->isAJAX()){

            $id = $this->request->getPost('id');
                  
            $this->mTemDetPinjam->delete($id);
            
            $json = [
                'sukses' => 'Item berhasil dihapus'
            ];

            echo json_encode($json);
            
        }else{
            exit('maaf tidak bisa dipanggil');
        }
    }

    function cariDataBarang(){
        if($this->request->isAJAX()){

            $json = [
                'data'     => view('pinjambarang/modalcaribarang') 
            ];

            echo json_encode($json);
        } else {
            exit('maaf tidak bisa dipanggil');
        }
    }

    function detailCariBarang(){
        if($this->request->isAJAX()){
            $cari = $this->request->getPost('cari');
            
            $data = $this->mdbarang->tampildata_cari($cari)->get();

            if($data != null){
                $json = [
                        'data' => view('pinjambarang/detaildatapinjam',[
                            'tampildata' => $data
                        ])
                    ];
                
                echo json_encode($json); 
            }

        } else {
            exit('maaf tidak bisa dipanggil');
        }
    }

    function selesaiTransaksi(){
        if($this->request->isAJAX()){
            $kodeinv         = $this->request->getPost('kodeinv');
            $tglpinjam       = strtotime($this->request->getPost('tglpinjam'));
            
            $lokasi          = $this->request->getPost('lokasi');
            $kegiatan        = $this->request->getPost('kegiatan');
            $jnsstakeholder  = $this->request->getPost('jnsstakholder');
            $stakeholder     = $this->request->getPost('stakeholder');



            $dataTemp = $this->mTemDetPinjam->getWhere([
                'detkodeinv' => $kodeinv
            ]);

            if($dataTemp->getNumRows() == 0){
                $json = [
                    'error' => 'Maaf,  belum ada item untuk No. Faktur '.$kodeinv.' !'
                ];
            }else{
                // Simpan Ke Tabel Barang Masuk 
                $this->mPinjam->insert([
                'kodeinv'           => $kodeinv,
                'tglpinjam'         => date('Y-m-d',$tglpinjam),
                'kegiatan'          => $kegiatan,
                'jnsstakeholder'    => $jnsstakeholder,
                'stakeholder'       => $stakeholder,
                'lokasi'            => $lokasi
                ]);

                // simpan ke Tabel detail Barang Masuk
                foreach($dataTemp->getResultArray() as $row):
                    $this->mDetPinjam->insert([
                        'detkodeinv'     => $row['detkodeinv'],
                        'detbrgkode'     => $row['detbrgkode'],
                        'detjml'         => $row['detjml']   
                    ]);
                endforeach;

                //hapus data dari tabel temp berdasarkan
                // $this->mdtembarang->emptyTable();


                $json = [
                    'sukses' => 'Transaksi No. Invoice '.$kodeinv.' Berhasil Disimpan'
                ];
            }

            echo json_encode($json);

        }else {
            exit('maaf tidak bisa dipanggil');
        }
    }

    public function dataDetail(){
        if($this->request->isAJAX()){
            $kodeinv     = $this->request->getPost('kodeinv');
            
            $data  = [
                'dataDetail'    =>  $this->mDetPinjam->dataDetail($kodeinv),
            ];
            
            $totalBarang = number_format($this->mDetPinjam ->ambilTotalBarang($kodeinv),0, ",",".");

            $json = [
                'data'     => view('barangmasuk/datadetail',$data),
                'totalBarang'   => $totalBarang
            ];
            echo json_encode($json);
        
        } else {
            exit('maaf tidak bisa dipanggil');
        }
    }
    
    public function editItem(){
        if($this->request->isAJAX()){
            $idDetail   = $this->request->getPost('idDetail');
            $ambildata  = $this->mDetPinjam->ambilDetailBerdasarkanID($idDetail);

            $row = $ambildata->getRowArray();
            
            $data = [
                'kodebarang' => $row['detbrgkode'],
                'namabarang' => $row['brgnama'],
                'jumlah'     => $row['detjml']
            ];

            $json = [
                'sukses' => $data
            ];
            
            echo json_encode($json);
        } else {
            exit('maaf tidak bisa dipanggil');
        }
    }

    public function simpanDetail(){
        if($this->request->isAJAX()){
            $kodeinv    = $this->request->getPost('kodeinv');
            $kodebarang = $this->request->getPost('kodebarang');
            $jumlah     = $this->request->getPost('jumlah');


            $dataDetail   = [
                'detkodeinv'     => $kodeinv,
                'detbrgkode'     => $kodebarang,
                'detjml'         => $jumlah    
            ];

            $modelDetBarang = $this->mDetPinjam->insert($dataDetail);

            $json = [
                'sukses' => 'Item berhasil ditambahkan'
            ];

            echo json_encode($json);
            
        }else{
            exit('maaf tidak bisa dipanggil');
        }
    }

    public function updateItem(){
        if($this->request->isAJAX()){
            $kodeinv     = $this->request->getPost('kodeinv');
            $kodebarang = $this->request->getPost('kodebarang');
            $jumlah     = $this->request->getPost('jumlah');
            $iddetail   = $this->request->getPost('iddetail');

            $dataDetail   = [
                'detjml'        => $jumlah    
            ];

            $modedetailBarang = $this->mDetPinjam->update($iddetail,$dataDetail);

            $json = [
                'sukses' => 'Item berhasil ditambahkan'
            ];

            echo json_encode($json);
            
        }else{
            exit('maaf tidak bisa dipanggil');
        }
    }

    public function hapusItemDetail(){
        if($this->request->isAJAX()){

            $id = $this->request->getPost('id');
            
            $this->mDetPinjam->delete($id);
            
            $json = [
                'sukses' => 'Item berhasil dihapus'
            ];

            echo json_encode($json);
            
        }else{
            exit('maaf tidak bisa dipanggil');
        }
    }

    public function hapusTransaksi($kodeinv){
        
        $hapusTam = $this->mTemDetPinjam->hapusInv($kodeinv);

        $hapusDet = $this->mDetPinjam->hapusInv($kodeinv);
        
        $dataTemp  = $this->mTemDetPinjam->getWhere(['detkodeinv' => $kodeinv]);

        foreach ($dataTemp->getResultArray() as $key) {
            $this->mTemDetPinjam->delete($key['iddetail']);
        }

        if(($hapusDet == TRUE) && ($hapusTam == TRUE)){
            $pesan = [
                'sukses' => '<div class="alert alert-success">Delete Data Success</div>' 
            ];

            $this->mPinjam->delete($kodeinv);

        }else{
            $pesan = [
                'sukses' => '<div class="alert alert-danger">Delete Data Error</div>' 
            ];
        }

      
        session()->setFlashdata($pesan);
        return redirect()->to('/pinjambarang/index');

    }

    Public function renderKodeInv(){
        if($this->request->isAJAX()){
            // $kodeinv    = $this->request->getPost('kodeinv');
            // $kodebarang = $this->request->getPost('kodebarang');
            // $jumlah     = $this->request->getPost('jumlah');


            // $dataDetail   = [
            //     'detkodeinv'     => $kodeinv,
            //     'detbrgkode'     => $kodebarang,
            //     'detjml'         => $jumlah    
            // ];

            // $modelDetBarang = $this->mDetPinjam->insert($dataDetail);
            $tglPin     = $this->request->getPost('tglpinjam');
            $kodeinv    = $this->mPinjam->renderKdinv($tglPin);

            $json = [
                'sukses'    => 'Item berhasil ditambahkan',
                'tglpinjam' => $tglPin,
                'kodeinv'   => $kodeinv
            ];

            echo json_encode($json);
            
        }else{
            exit('maaf tidak bisa dipanggil');
        }
    }
    

}