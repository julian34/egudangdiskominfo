<?php

namespace App\Models;

use CodeIgniter\Model;

class Modeltemdetailpinjambarang extends Model
{
    protected $table            = 'tmp_pinjambarang';
    protected $primaryKey       = 'iddetail';
    protected $allowedFields    = ['detkodeinv','detbrgkode','detjml'];

    public function tampilDataTemp($faktur){
        return $this->table('tmp_pinjambarang')->join('barang','brgkode = detbrgkode')->where(['detkodeinv' => $faktur])->get();
    }

    public function hapusInv($kodeinv){
        
        $query = $this->table('tmp_pinjambarang')->join('barang','brgkode = detbrgkode')->where(['detkodeinv' => $kodeinv])->get();

        return $this->table('tmp_pinjambarang')->delete(['detkodeinv' => $kodeinv]);
    }
}