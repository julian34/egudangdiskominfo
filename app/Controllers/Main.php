<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\Modelkembalibarang;

use \Hermawan\DataTables\DataTable;

class Main extends BaseController
{
    public function __construct()
    {
        $this->mKembali         = new Modelkembalibarang;
        $this->db               = \Config\Database::connect();
    }

    public function index()
    {
        //
        return view('main/dashboard');
    }

    public function datadashboard(){

        $query_grafikpai = "SELECT  jnsstakholder AS jns, COUNT(jnsstakholder) AS 'jumlah'  FROM pinjambarang GROUP BY jnsstakholder";
        $datagarfikpai   = $this->db->query($query_grafikpai)->getResultArray();
        
        $query_grafikbar = "SELECT MONTH(tglpinjam) AS bulan , COUNT(kodeinv) AS datapinjam FROM pinjambarang WHERE YEAR(tglpinjam) = YEAR(NOW()) GROUP BY MONTH(tglpinjam);";
        $datagarfikbar   = $this->db->query($query_grafikbar)->getResultArray();

        foreach ($datagarfikpai as $key  => $value) {
            $pai[$key]   = $value['jns'];
            $jml[$key]   = $value['jumlah'];
        }

        foreach ($datagarfikbar as $key  => $value) {
            $bar[$key]      = $this->bulan($value['bulan']);
            $barjml[$key]   = $value['datapinjam'];
        }

        $json = [
            'label'     => $pai,
            'dtg'       => $jml,
            'labelbar'  => $bar,
            'databar'   => $barjml
        ];
        
        return $this->response->setJSON($json);
    }

    public function listdatatabel(){
        if($this->request->isAJAX()){
            $builder    =  $this->mKembali->tampildata();
            return DataTable::of($builder)->addNumbering()
            ->add('tanggalpemakaian', function($row){
                $hari = $this->hari(date('D', strtotime($row->tglpinjam)));
                return $hari.", ".date('d-m-Y',strtotime($row->tglpinjam));
            })
            ->add('tanggalpengembalian', function($row){
                $hari = $this->hari(date('D', strtotime($row->tglkembali)));
                return $hari.", ".date('d-m-Y',strtotime($row->tglkembali));
            })
            ->add('jmlalat', function($row){
                $db       = \Config\Database::connect();
                $jmlItem  = $db->table('detailpinjambarang')->where('detkodeinv',$row->kkdinv)->countAllResults();
                return number_format($jmlItem, 0, ',', '.');
            })->postQuery(function($builder){

                $builder->orderBy('tglpinjam', 'desc');
        
            })
           ->toJson(TRUE);
            
            // echo json_encode($json);
        }else{
            exit('maaf tidak bisa dipanggil');
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
    
    function bulan($m){
        switch($m){
            case '1':
                $hari_ini = "Januari";
            break;
     
            case '2':			
                $hari_ini = "Februari";
            break;
     
            case '3':
                $hari_ini = "Maret";
            break;
     
            case '4':
                $hari_ini = "April";
            break;
     
            case '5':
                $hari_ini = "Mei";
            break;
     
            case '6':
                $hari_ini = "Juni";
            break;
     
            case '7':
                $hari_ini = "Juli";
            break;

            case '8':
                $hari_ini = "Agustus";
            break;

            case '9':
                $hari_ini = "September";
            break;

            case '10':
                $hari_ini = "Oktober";
            break;

            case '11':
                $hari_ini = "November";
            break;

            case '12':
                $hari_ini = "Desember";
            break;
            
            default:
                $hari_ini = "Tidak di ketahui";		
            break;
        }
        return $hari_ini;
    }
}