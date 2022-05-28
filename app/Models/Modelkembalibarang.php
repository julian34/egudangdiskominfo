<?php

namespace App\Models;

use CodeIgniter\Model;

class Modelkembalibarang extends Model
{
    protected $table            = 'kembalibarang';
    protected $primaryKey       = 'idkembrg';
    protected $allowedFields    = ['kodeinv','tglkembali','created_at','updated_at'];
    protected $useTimestamps    = true; 

    public function tampildata_cari($cari){
        return $this->table('kembalibarang') 
        ->join('pinjambarang','kodeinv=kodeinv')->like('kembalibarang.kodeinv',$cari);
    }

    public function cekFaktur($faktur){
        return $this->table('kembalibarang')->getWhere([
            'sha1(kodeinv)' => $faktur
        ]);
    }
    
}