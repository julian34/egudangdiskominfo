<?php

namespace App\Models;

use CodeIgniter\Model;

class Modelkembalibarang extends Model
{
    protected $table            = 'kembalibarang';
    protected $primaryKey       = 'idkembrg';
    protected $allowedFields    = ['kodeinv','tglkembali','created_at','updated_at'];
    protected $useTimestamps    = true; 

    public function tampildata(){
        return $this->table('kembalibarang')->select('pinjambarang.kodeinv as kkdinv, ,idkembrg, kegiatan, tglpinjam, tglkembali,stakeholder,lokasi')
                    ->join('pinjambarang','pinjambarang.kodeinv=kembalibarang.kodeinv');
    }
   
    
    public function tampildata_cari($cari){
        return $this->table('kembalibarang')->select('pinjambarang.kodeinv as kodeinv, ,idkembrg, kegiatan, tglpinjam, tglkembali,stakeholder,lokasi')
                    ->join('pinjambarang','pinjambarang.kodeinv=kembalibarang.kodeinv')
                    ->like('kembalibarang.kodeinv',$cari);
    }


    public function cekFaktur($faktur){
        return $this->table('kembalibarang')
        ->select('pinjambarang.kodeinv as kodeinv,idkembrg,kegiatan, tglpinjam, tglkembali,stakeholder,jnsstakholder,lokasi')
        ->join('pinjambarang','pinjambarang.kodeinv=kembalibarang.kodeinv')
        ->getWhere([
            'sha1(pinjambarang.kodeinv)' => $faktur
        ]);
    }

    public function laporanpb($startDate,$endDate){

        $array = ['tglpinjam >=' => date('Y-m-d',strtotime($startDate)), 'tglpinjam <=' => date('Y-m-d',strtotime($endDate))];
        
        return $this->table('kembalibarang')
        ->select('pinjambarang.kodeinv as kkdinv, ,idkembrg, kegiatan, tglpinjam, tglkembali,stakeholder,lokasi')
        ->join('pinjambarang','pinjambarang.kodeinv=kembalibarang.kodeinv')
        ->where($array)
        ->orderBy('pinjambarang.tglpinjam', 'DESC')
        ->groupBy('pinjambarang.tglpinjam');
    }
    
}