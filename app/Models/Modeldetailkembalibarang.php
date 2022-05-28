<?php

namespace App\Models;

use CodeIgniter\Model;

class Modeldetailkembalibarang extends Model
{
    protected $table            = 'detailkembalibarang';
    protected $primaryKey       = 'iddetail';
    protected $allowedFields    = ['detkodeinv','detbrgkode','detjml','status'];

    public function dataDetail($faktur){
        return $this->table('detailkembalibarang')
        ->join('barang','brgkode=detbrgkode')
        ->where('detkodeinv',$faktur)->get();
    }

    public function ambilTotalBarang($faktur){
        $query = $this->table('detailkembalibarang')->where('detkodeinv',$faktur)->countAllResults();
        return $query;
    }

    public function ambilDetailBerdasarkanID($id){
        return $this->table('detailkembalibarang')
        ->join('barang','brgkode=detbrgkode')
        ->where('iddetail',$id)->get();
    }
}