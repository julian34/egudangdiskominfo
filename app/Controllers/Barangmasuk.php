<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Modelbarangmasuk;
use App\Models\Modeldetailbarangmasuk;
use App\Models\Modeltembarangmasuk;
use App\Models\Modelbarang;

use \Hermawan\DataTables\DataTable;

class Barangmasuk extends BaseController
{
    public function __construct()
    {
        $this->mdtembarang              = new Modeltembarangmasuk();
        $this->mdbarang                 = new Modelbarang();
        $this->mdbarangmasuk            = new Modelbarangmasuk();
        $this->mddetailbarangmasuk      = new Modeldetailbarangmasuk();
        
    }

    public function index()
    {
        //
        return view('barangmasuk/forminput');
    }
    
    function dataTemp(){
        if($this->request->isAJAX()){
            $faktur     = $this->request->getPost('faktur');
            
            $data  = [
                'dataTemp' => $this->mdtembarang->tampilDataTemp($faktur) 
            ];
            
            $json = [
                'data'     => view('barangmasuk/datatemp',$data) 
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
            $faktur     = $this->request->getPost('faktur');
            $kodebarang = $this->request->getPost('kodebarang');
            $jumlah     = $this->request->getPost('jumlah');


            $dataTemp   = [
                'detfaktur'     => $faktur,
                'detbrgkode'    => $kodebarang,
                'detjml'        => $jumlah    
            ];

            $modeTempBarang = $this->mdtembarang->insert($dataTemp);

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
                  
            $this->mdtembarang->delete($id);
            
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
                'data'     => view('barangmasuk/modalcaribarang') 
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
                        'data' => view('barangmasuk/detaildatabarang',[
                            'tampildata' => $data
                        ])
                    ];
                
                echo json_encode($json); 
            }

        } else {
            exit('maaf tidak bisa dipanggil');
        }
    }

    public function selesaiTransaksi(){
        if($this->request->isAJAX()){
            $faktur     = $this->request->getPost('faktur');
            $tglfaktur  = strtotime($this->request->getPost('tglfaktur'));

            $dataTemp = $this->mdtembarang->getWhere([
                'detfaktur' => $faktur
            ]);

            if($dataTemp->getNumRows() == 0){
                $json = [
                    'error' => 'Maaf,  belum ada item untuk No. Faktur '.$faktur.' !'
                ];
            }else{
                // Simpan Ke Tabel Barang Masuk 
                $this->mdbarangmasuk->insert([
                'faktur'    => $faktur,
                'tglfaktur' => date('Y-m-d',$tglfaktur),
                'kegiatan'  => ''
                ]);

                // simpan ke Tabel detail Barang Masuk
                foreach($dataTemp->getResultArray() as $row):
                    $this->mddetailbarangmasuk->insert([
                        'detfaktur'     => $row['detfaktur'],
                        'detbrgkode'    => $row['detbrgkode'],
                        'detjml'        => $row['detjml']   
                    ]);
                endforeach;

                //hapus data dari tabel temp berdasarkan
                $this->mdtembarang->emptyTable();


                $json = [
                    'sukses' => 'Transaksi No. Faktur '.$faktur.' Berhasil Disimpan'
                ];
            }

            echo json_encode($json);

        }else {
            exit('maaf tidak bisa dipanggil');
        }
    }

    public function data(){
        return view('barangmasuk/viewdata');
    }

    public function listtabeldata(){
        if($this->request->isAJAX()){
            $builder    = $this->mdbarangmasuk->tampildata();
            return DataTable::of($builder)->addNumbering()
            ->add('jmlalat', function($row){
                $db       = \Config\Database::connect();
                $jmlItem  = $db->table('detailbarangmasuk')->where('detfaktur',$row->faktur)->countAllResults();
                $kdfaktur = sha1($row->faktur);
                return 
                "<span style='cursor:pointer; font-weight: bold; color:blue'
                onclick='detailItem(\"$row->faktur\")'>".number_format($jmlItem, 0, ',', '.')."</span>";
            })
            ->add('aksi', function($row){
            $kdfaktur = sha1($row->faktur);
            return
                "<button type='button' class='btn btn-sm btn-info' title='edit data' onclick='edit(\"$kdfaktur\")'><i
                    class='fa fa-edit'></i>
            </button>
            <form method='POST' action='/barangmasuk/hapusTransaksi/$row->faktur' style='display:inline;' onsubmit='hapus()'><input type='hidden'
                    value='DELETE' name='_method'>
                <button type='submit' class='btn btn-sm btn-danger' title='hapus data'>
                    <i class='fa fa-trash-alt'></i>
                </button>
            </form>";
            })
            ->postQuery(function($builder){

                $builder->orderBy('tglfaktur', 'desc');
        
            })->toJson(TRUE);
        }else{
            exit('maaf tidak bisa dipanggil');
        }
    }

    public function listdetailitem($faktur){
        if($this->request->isAJAX()){
            $builder    = $this->mddetailbarangmasuk->dataDetail($faktur);
            return DataTable::of($builder)->addNumbering()
            ->toJson(TRUE);
        }else{
            exit('maaf tidak bisa dipanggil');
        }
    }

    public function detailItem(){
        if($this->request->isAJAX()){
            $faktur = $this->request->getPost('faktur');

            $detailBarangMasuk = $this->mddetailbarangmasuk->dataDetail($faktur);

            $data = [
            'tampildatadetail' => $detailBarangMasuk
            ];

            $json = [
            'data' => view('barangmasuk/modaldetailitem',$data)
            ];

            echo json_encode($json);

        } else {
            exit('maaf tidak bisa dipanggil');
        }
    }

    public function edit($faktur){
        $cekFaktur = $this->mdbarangmasuk->cekFaktur($faktur);
        if($cekFaktur->getNumRows() > 0){
            $row = $cekFaktur->getRowArray();
            $data = [
            'nofaktur'  => $row['faktur'],
            'tanggal'   => $row['tglfaktur'],
            ];
            return view('barangmasuk/formedit',$data);
        }else{
            exit('maaf data tidak ditemukan');
        }
    }

    public function dataDetail(){
        if($this->request->isAJAX()){
            $json = [
            'data' => view('barangmasuk/datadetail'),
            ];
            echo json_encode($json);
            } else {
                exit('maaf tidak bisa dipanggil');
            }
    }

    public function dataDetailedit(){
        if($this->request->isAJAX()){
            $faktur     = $this->request->getPost('faktur');
                
            $data  = [
                'dataDetail'    =>  $this->mddetailbarangmasuk->dataDetailEdit($faktur)->get(),
            ];
            
            $totalBarang = number_format($this->mddetailbarangmasuk->ambilTotalBarang($faktur),0, ",",".");

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
            $idDetail  = $this->request->getPost('idDetail');
            $ambildata = $this->mddetailbarangmasuk->ambilDetailBerdasarkanID($idDetail);
            $row = $ambildata->getRowArray();
            $data = [
            'kodebarang' => $row['detbrgkode'],
            'namabarang' => $row['brgnama'],
            'jumlah' => $row['detjml']
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
            $faktur = $this->request->getPost('faktur');
            $kodebarang = $this->request->getPost('kodebarang');
            $jumlah = $this->request->getPost('jumlah');

            $dataDetail = [
            'detfaktur' => $faktur,
            'detbrgkode' => $kodebarang,
            'detjml' => $jumlah
            ];

            $modelDetBarang = $this->mddetailbarangmasuk->insert($dataDetail);

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
            $faktur = $this->request->getPost('faktur');
            $kodebarang = $this->request->getPost('kodebarang');
            $jumlah = $this->request->getPost('jumlah');
            $iddetail = $this->request->getPost('iddetail');
            $dataDetail = [
            'detjml' => $jumlah
            ];
            $modedetailBarang = $this->mddetailbarangmasuk->update($iddetail,$dataDetail);
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

            $this->mddetailbarangmasuk->delete($id);

            $json = [
            'sukses' => 'Item berhasil dihapus'
            ];

            echo json_encode($json);

        }else{
            exit('maaf tidak bisa dipanggil');
        }
    }

    public function hapusTransaksi($faktur){
        $this->mddetailbarangmasuk->hapusFaktur($faktur);
        $this->mdbarangmasuk->delete($faktur);

        $pesan = [
        'sukses' => '<div class="alert alert-success">Delete Data Success</div>'
        ];
        session()->setFlashdata($pesan);
        return redirect()->to('/barangmasuk/data');
    }

}