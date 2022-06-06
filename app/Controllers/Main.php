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
        
        foreach ($datagarfikpai as $key  => $value) {
            $pai[$key]   = $value['jns'];
            $jml[$key]   = $value['jumlah'];
        }
        
        $json = [
            'label' => $pai,
            'dtg'   => $jml
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
    
}