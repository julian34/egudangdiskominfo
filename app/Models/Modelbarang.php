<?php

namespace App\Models;

use CodeIgniter\Model;

class Modelbarang extends Model
{
    protected $table            = 'barang';
    protected $primaryKey       = 'brgkode';
    protected $allowedFields    = ['brgkode','brgnama','brgkatid','brgsatid','brgharga','brggambar','brgstok'];

    public function tampildata(){
        return $this->table('barang')
        ->join('kategori','brgkatid=katid')
        ->join('satuan','brgsatid=satid');
    }

    public function tampildata_cari($cari){
        return $this->table('barang')
        ->join('kategori','brgkatid=katid')
        ->join('satuan','brgsatid=satid')
        ->orlike('brgkode',$cari)
        ->orlike('brgnama',$cari)
        ->orlike('katnama',$cari);
    }

    public function renderKode(){
            $this->db = \Config\Database::connect();
            $query  = "SELECT max(brgkode) as kodeTerbesar FROM barang";
            $urutan = $this->db->query($query)->getResultArray();
            foreach ($urutan as $key) {
                $data       = $key['kodeTerbesar'];
            }
            $urutan = (int) substr($data,6,4);
        
            $urutan++;
            

            $huruf = 'TIKMUL';
            $kodeBarang = $huruf . sprintf("%04s",$urutan);
            return $kodeBarang;
    }
}