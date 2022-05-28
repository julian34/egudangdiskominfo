<?php

namespace App\Models;

use CodeIgniter\Model;

class Modelpinjambarang extends Model
{
    protected $table            = 'pinjambarang';
    protected $primaryKey       = 'kodeinv';
    protected $allowedFields    = ['kodeinv','stakeholder','	jnsstakholder','kegiatan','lokasi','tglpinjam','filependukung','created_at','updated_at'];
    protected $useTimestamps    = true; 

    public function tampildata_cari($cari){
        return $this->table('pinjambarang')->like('kodeinv',$cari);
    }


    public function renderKdinv($tglPin){
            if($tglPin == null){
                $urutan = 0;    
                $this->db = \Config\Database::connect();
                $query  = "SELECT max(kodeinv) as kodeinvoice, SUBSTRING(kodeinv,4,6) AS tglin FROM pinjambarang";
                $urutan = $this->db->query($query)->getResultArray(); 
                foreach ($urutan as $key) {
                    $data        = $key['kodeinvoice'];
                    $tanggal     = $key['tglin'];
                }
                
                $urutan = (int) substr($data,9,4);
    
                if($tanggal == date('ymd')){
                    $urutan++;
                }else{
                    $urutan = 1;
                }
                $huruf = 'INV';
                $kodeBarang = $huruf . date('ymd') .sprintf("%04s",$urutan);
            }else{  
                $jmldata    = $this->table('pinjambarang')->where('tglpinjam', $tglPin)->countAllResults();
                $huruf      = 'INV'; 
                $kodeBarang = $huruf.date('ymd',strtotime($tglPin)).sprintf("%04s",($jmldata + 1));
            }
            return $kodeBarang;
    }

    public function cekFaktur($faktur){
        return $this->table('pinjambarang')->getWhere([
            'sha1(kodeinv)' => $faktur
        ]);
    }
    

}