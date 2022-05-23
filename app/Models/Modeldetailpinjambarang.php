<?php

namespace App\Models;

use CodeIgniter\Model;

class Modeldetailpinjambarang extends Model
{
    protected $table            = 'detailpinjambarang';
    protected $primaryKey       = 'iddetail';
    protected $allowedFields    = ['detkodeinv','detbrgkode','detjml'];

    public function dataDetail($faktur){
        return $this->table('detailpinjambarang')
        ->join('barang','brgkode=detbrgkode')
        ->where('detkodeinv',$faktur)->get();
    }

    public function ambilTotalBarang($faktur){
        $query = $this->table('detailpinjambarang')->where('detkodeinv',$faktur)->countAllResults();
        return $query;
    }

    public function ambilDetailBerdasarkanID($id){
        return $this->table('detailpinjambarang')
        ->join('barang','brgkode=detbrgkode')
        ->where('iddetail',$id)->get();
    }

    public function hapusInv($faktur){
        return $this->table('detailpinjambarang')->delete('detkodeinv',$faktur);
    }
}