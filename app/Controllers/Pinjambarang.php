<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\Modelpinjambarang;
use App\Models\Modeldetailpinjambarang;
use App\Models\Modeltemdetailpinjambarang;

use App\Models\Modelbarang;

//Paket
use App\Libraries\MY_TCPDF AS TCPDF;
use \Hermawan\DataTables\DataTable;

class Pinjambarang extends BaseController
{

    public function __construct(){
        $this->mPinjam          = new Modelpinjambarang;
        $this->mDetPinjam       = new Modeldetailpinjambarang;
        $this->mTemDetPinjam    = new Modeltemdetailpinjambarang;

        $this->mdbarang         = new Modelbarang();
    }

    public function index(){
        //
        return view('pinjambarang/viewdata');
    }

    public function listtabeldata(){
        if($this->request->isAJAX()){
            $builder    =  $this->mPinjam->tampildata();
            return DataTable::of($builder)->addNumbering()
            ->add('tanggalpemakaian', function($row){
                $hari = $this->hari(date('D', strtotime($row->tglpinjam)));
                return $hari.", ".date('d-m-Y',strtotime($row->tglpinjam));
            })
            ->add('jmlalat', function($row){
                $db       = \Config\Database::connect();
                $jmlItem  = $db->table('detailpinjambarang')->where('detkodeinv',$row->kodeinv)->countAllResults();
                return 
                "<span style='cursor:pointer; font-weight: bold; color:blue'
                onclick='detailItem(\"$row->kodeinv\")'>".number_format($jmlItem, 0, ',', '.')."</span>";
            })
            ->add('aksi', function($row){
            $kdkodeinv = sha1($row->kodeinv);
            return
            "<button type='button' class='btn btn-sm btn-info' title='edit data'
            onclick='print(\"$kdkodeinv\")'>
            <i class='fa fa-print'></i>
            </button>
            &nbsp;
            <button type='button' class='btn btn-sm btn-info' title='edit data' onclick='edit(\"$kdkodeinv\")'><i
                    class='fa fa-edit'></i>
            </button>
            &nbsp;
            <form method='POST' action='/pinjambarang/hapusTransaksi/$row->kodeinv' style='display:inline;' onsubmit='hapus()'><input type='hidden'
                    value='DELETE' name='_method'>
                <button type='submit' class='btn btn-sm btn-danger' title='hapus data'>
                    <i class='fa fa-trash-alt'></i>
                </button>
            </form>";
            })
            ->postQuery(function($builder){

                $builder->orderBy('tglpinjam', 'desc');
        
            })->toJson(TRUE);
        }else{
            exit('maaf tidak bisa dipanggil');
        }
    }

    public function listdetailitem($kodeinv){
        if($this->request->isAJAX()){
            $builder    =  $this->mDetPinjam->dataDetailModal($kodeinv);
            return DataTable::of($builder)->addNumbering()
            ->toJson(TRUE);
        }else{
            exit('maaf tidak bisa dipanggil');
        }
    }

    public function detailItem(){
        if($this->request->isAJAX()){
            $kodeinv         = $this->request->getPost('kodeinv');
            $detaildata      = $this->mDetPinjam->dataDetail($kodeinv);
            $data = [
            'tampildatadetail' => $detaildata
            ];
            $json = [
            'data' => view('pinjambarang/modaldetailitem',$data)
            ];
            echo json_encode($json);
        } else {
            exit('maaf tidak bisa dipanggil');
        }
    }

    public function add(){
        $tglPin = NULL;
        $data = [
            'kodeinv' => $this->mPinjam->renderKdinv($tglPin)
        ];
        return view('pinjambarang/forminput',$data);
    }

    public function edit($kodeinv){

        $cekkodeinv =  $this->mPinjam->cekkodeinv($kodeinv);
        if($cekkodeinv->getNumRows() > 0){
            $row = $cekkodeinv->getRowArray();
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
                    'error' => 'Maaf,  belum ada item untuk No. kodeinv '.$kodeinv.' !'
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
                // $this->mTemDetPinjam->emptyTable();


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
    
    public function printInvPdf($kodeinv){
            // create new PDF document
            $cekFaktur =  $this->mPinjam->cekkodeinv($kodeinv);
            if($cekFaktur->getNumRows() > 0){
                $row = $cekFaktur->getRowArray();
                $data = [ 
                    'kodeinv'           => $row['kodeinv'],
                    'tglpinjam'         => $row['tglpinjam'],
                    'kegiatan'          => $row['kegiatan'],
                    'stakeholder'       => $row['stakeholder'],
                    'jnsstakholder'     => $row['jnsstakholder'],
                    'lokasi'            => $row['lokasi'],
                    'hari'              => $this->hari(date('D',strtotime($row['tglpinjam']))),
                    'dataTemp'          => $this->mDetPinjam->dataDetail($row['kodeinv']) 
                ];
                // set margins
                $sty = [
                    'position' => 'R',
                    // 'border' => 2,
                    // 'padding' => 'auto',
                    // 'fgcolor' => array(0,0,0),
                    // 'bgcolor' => array(255,255,255)
                ];
                $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
                
                $pdf->setHeaderTemplateAutoreset(true);
                
                $pdf->SetMargins(10, 12, 10, true);
                $pdf->SetAutoPageBreak(TRUE, 20);
                $pdf->AddPage();
               
                
                $pdf->SetMargins(10, 35, 10, true);
               
                
                $html = view('invoice',$data);
                // Print text using writeHTMLCell()
                
                $pdf->write2DBarcode($data['kodeinv'], 'QRCODE,H', 0, 45, 30, 20, $sty, 'N');
                $pdf->SetXY(5, 10);
                $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
                
                $pdf->lastPage();
           
                // ---------------------------------------------------------
                $this->response->setContentType('application/pdf');
                // Close and output PDF document
                // This method has several options, check the source code documentation for more information.
                $pdf->Output('diskoinfo-pinjam-'.$data['kodeinv'].'.pdf', 'I');
            }else{
                exit('maaf data tidak ditemukan');
            }
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