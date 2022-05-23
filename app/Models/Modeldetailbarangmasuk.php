<?php

namespace App\Models;

use CodeIgniter\Model;

class Modeldetailbarangmasuk extends Model
{
    protected $table            = 'detailbarangmasuk';
    protected $primaryKey       = 'iddetail';
    protected $allowedFields    = ['detfaktur','detbrgkode','detjml'];

    public function dataDetail($faktur){
        return $this->table('detailbarangmasuk')
        ->join('barang','brgkode=detbrgkode')
        ->where('detfaktur',$faktur)->get();
    }

    public function ambilTotalBarang($faktur){
        $query = $this->table('detailbarangmasuk')->where('detfaktur',$faktur)->countAllResults();
        return $query;
    }

    public function ambilDetailBerdasarkanID($id){
        return $this->table('detailbarangmasuk')
        ->join('barang','brgkode=detbrgkode')
        ->where('iddetail',$id)->get();
    }

    public function hapusFaktur($faktur){
        return $this->table('detailbarangmasuk')->delete('detfaktur',$faktur);
    }
    
}