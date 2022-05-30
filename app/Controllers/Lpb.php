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

    public function printInvPdf($kodeinv){
        // create new PDF document
        $cekFaktur =  $this->mPinjam->cekFaktur($kodeinv);
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
           
            
            $html = view('invoice-pengembalian',$data);
            // Print text using writeHTMLCell()
            
            $pdf->write2DBarcode($data['kodeinv'], 'QRCODE,H', 0, 55, 30, 20, $sty, 'N');
            $pdf->SetXY(5, 10);
            $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
            
            $pdf->lastPage();
       
            // ---------------------------------------------------------
            $this->response->setContentType('application/pdf');
            // Close and output PDF document
            // This method has several options, check the source code documentation for more information.
            $pdf->Output('diskoinfo-kembali-'.$data['kodeinv'].'.pdf', 'I');
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