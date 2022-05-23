<?php

namespace App\Models;

use CodeIgniter\Model;

class Modelkembalibarang extends Model
{
    protected $table            = 'pinjambarang';
    protected $primaryKey       = 'kodeinv';
    protected $allowedFields    = ['kodeinv','stakeholder','jnsstakholder','kegiatan','lokasi','tglpinjam','filependukung','created_at','updated_at'];
    protected $useTimestamps    = true; 

    public function tampildata_cari($cari){
        return $this->table('pinjambarang')->like('kodeinv',$cari);
    }

    public function cekFaktur($faktur){
        return $this->table('pinjambarang')->getWhere([
            'sha1(kodeinv)' => $faktur
        ]);
    }
    
}