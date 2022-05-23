<?php

namespace App\Models;

use CodeIgniter\Model;

class Modeltembarangmasuk extends Model
{
    protected $table            = 'tmp_barangmasuk';
    protected $primaryKey       = 'iddetail';
    protected $allowedFields    = ['detfaktur','detbrgkode','detjml'];

    public function tampilDataTemp($faktur){
        return $this->table('tem_barangmasuk')->join('barang','brgkode = detbrgkode')->where(['detfaktur' => $faktur])->get();
    }
}