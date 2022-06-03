<?php

namespace App\Models;

use CodeIgniter\Model;

class Modelbarangmasuk extends Model
{
    protected $table            = 'barangmasuk';
    protected $primaryKey       = 'faktur';
    protected $allowedFields    = ['faktur','tglfaktur','kegiatan'];

    public function tampildata_cari($cari){
        return $this->table('barangmasuk')->like('faktur',$cari);
    }

    public function tampildata(){
        return $this->table('barangmasuk')->select('faktur,tglfaktur');
    }

    public function cekFaktur($faktur){
        return $this->table('barangmasuk')->getWhere([
            'sha1(faktur)' => $faktur
        ]);
    }
    

}