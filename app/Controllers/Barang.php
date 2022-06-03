<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Modelbarang;
use App\Models\Modelkategori;
use App\Models\Modelsatuan;

use \Hermawan\DataTables\DataTable;

class Barang extends BaseController
{

    public function __construct()
    {
            $this->barang   = new Modelbarang();

            $this->kategori = new Modelkategori();
            $this->satuan   = new Modelsatuan(); 

            $this->vd =  \Config\Services::validation();
    }

    public function index()
    {
        return view('barang/index');
    }

    public function listtabeldata(){
        if($this->request->isAJAX()){
            $builder    = $this->barang->tampildata();
            return DataTable::of($builder)->addNumbering()
            ->format('brgharga', function($value){
                return 'Rp. '.number_format($value, 0,'.',',').',-';
            })
            ->add('aksi', function($row){
                return 
                "<button type='button' class='btn btn-sm btn-info' title='edit data'
                onclick='edit(\"$row->brgkode\")'><i class='fa fa-edit'></i>
                </button>
                <form method='POST' action='/barang/hapus/$row->brgkode' style='display:inline;' onsubmit='hapus()'><input type='hidden' value='DELETE' name='_method'>
                    <button type='submit' class='btn btn-sm btn-danger' title='hapus data'>
                    <i class='fa fa-trash-alt'></i>
                    </button>
                </form>";
            }, 'last')
            ->toJson();
            }else{
            exit('maaf tidak bisa dipanggil');
            }
}

public function addform(){
$selects = [
'slkategori' => $this->kategori->findAll(),
'slsatuan' => $this->satuan->findAll(),
'kdbrg' => $this->barang->renderKode()
];
return view('barang/addform',$selects);
}

public function addprosess(){
$valid = [
'brgkode' => [
'label' => 'Kode Barang',
'rules' => 'required|is_unique[barang.brgkode]',
'errors' => [
'required' => '{field} Tidak Boleh Kosong',
'is_unique' => '{field} Sudah Terdata'
]
],
'brgnama' => [
'label' => 'Nama Barang',
'rules' => 'required',
'errors' => [
'required' => '{field} Tidak Boleh Kosong',
]
],
'brgkatid' => [
'label' => 'Kategori',
'rules' => 'required',
'errors' => [
'required' => '{field} Tidak Boleh Kosong',
]
],
'brgsatid' => [
'label' => 'Satuan',
'rules' => 'required',
'errors' => [
'required' => '{field} Tidak Boleh Kosong',
]
],
'brgharga' => [
'label' => 'Harga Barang',
'rules' => 'required|numeric',
'errors' => [
'required' => '{field} Tidak Boleh Kosong',
'numeric' => '{field} Hanya dalam bentuk Angka'
]
],
'brgstok' => [
'label' => 'Stok Barang',
'rules' => 'required|numeric',
'errors' => [
'required' => '{field} Tidak Boleh Kosong',
'numeric' => '{field} Hanya dalam bentuk Angka'
]
],
'brggambar' => [
'label' => 'Gambar Barang',
// 'rules' => 'mime_in[brggambar, image/png, image/jpg, image/jpeg]|ext_in[brggambar,png,jpg,jpeg]',
'rules' => 'mime_in[brggambar,image/png,image/jpg]|ext_in[brggambar,png,jpg,gif]'
],
];

$input = $this->vd->setRules($valid);

if($this->vd->withRequest($this->request)->run() == FALSE){
$pesan = [
'errors' => '<div class="alert alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h5><i class="icon fas fa-ban"></i> Error!</h5>
    '.$this->vd->listErrors().'
</div>'
];
session()->setFlashdata($pesan);
return redirect()->to('/barang/addform');
}else{

$pathGambar = '';
$gambar = $_FILES['brggambar']['name'];

$data = [
'brgkode' => $this->request->getVar('brgkode'),
'brgnama' => $this->request->getVar('brgnama'),
'brgkatid' => $this->request->getVar('brgkatid'),
'brgsatid' => $this->request->getVar('brgsatid'),
'brgharga' => $this->request->getVar('brgharga'),
'brgstok' => $this->request->getVar('brgstok'),
'brggambar' => $pathGambar,
];


if($gambar != NULL){
$namaFileGambar = $data['brgkode'];
$fileGambar = $this->request->getFile('brggambar');
$fileGambar->move('upload', $namaFileGambar. '.' . $fileGambar->getExtension());
$pathGambar = 'upload/'.$fileGambar->getName();
}


$data = [
'brgkode' => $this->request->getVar('brgkode'),
'brgnama' => $this->request->getVar('brgnama'),
'brgkatid' => $this->request->getVar('brgkatid'),
'brgsatid' => $this->request->getVar('brgsatid'),
'brgharga' => $this->request->getVar('brgharga'),
'brgstok' => $this->request->getVar('brgstok'),
'brggambar' => $pathGambar,
];

$this->barang->insert($data);

$pesan = [
'sukses' => '<div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h5><i class="icon fas fa-check"></i> Berhasil!</h5>
    Data Barang Dengan Kode <strong>'.$data['brgkode'].'</strong> Berhasil Disimpan
</div>'
];

session()->setFlashdata($pesan);
return redirect()->to('/barang/index');

}

}

public function editform($id){
$rwd = $this->barang->find($id);
if($rwd){
$data = [
'kodebarang' => $rwd['brgkode'],
'namabarang' => $rwd['brgnama'],
'kategoribarang' => $rwd['brgkatid'],
'satuanbarang' => $rwd['brgsatid'],
'stokbarang' => $rwd['brgstok'],
'hargabarang' => $rwd['brgharga'],
'gambarbarang' => $rwd['brggambar'],
'slkategori' => $this->kategori->findAll(),
'slsatuan' => $this->satuan->findAll()
];

return view('barang/editform',$data);
}else{
$pesan = [
'sukses' => '<div class="alert alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h5><i class="icon fas fa-ban"></i> Error!</h5>
    Data Barang Dengan Kode <strong>'.$id.'</strong> tidak ditemukan
</div>'
];

session()->setFlashdata($pesan);
return redirect()->to('/barang/index');
}
}

public function editprosess(){

$valid = [
'brgnama' => [
'label' => 'Nama Barang',
'rules' => 'required',
'errors' => [
'required' => '{field} Tidak Boleh Kosong',
]
],
'brgkatid' => [
'label' => 'Kategori',
'rules' => 'required',
'errors' => [
'required' => '{field} Tidak Boleh Kosong',
]
],
'brgsatid' => [
'label' => 'Satuan',
'rules' => 'required',
'errors' => [
'required' => '{field} Tidak Boleh Kosong',
]
],
'brgharga' => [
'label' => 'Harga Barang',
'rules' => 'required|numeric',
'errors' => [
'required' => '{field} Tidak Boleh Kosong',
'numeric' => '{field} Hanya dalam bentuk Angka'
]
],
'brgstok' => [
'label' => 'Stok Barang',
'rules' => 'required|numeric',
'errors' => [
'required' => '{field} Tidak Boleh Kosong',
'numeric' => '{field} Hanya dalam bentuk Angka'
]
],
'brggambar' => [
'label' => 'Gambar Barang',
// 'rules' => 'mime_in[brggambar, image/png, image/jpg, image/jpeg]|ext_in[brggambar,png,jpg,jpeg]',
'rules' => 'mime_in[brggambar,image/png,image/jpg]|ext_in[brggambar,png,jpg,gif]'
],
];

$input = $this->vd->setRules($valid);

if($this->vd->withRequest($this->request)->run() == FALSE){
$pesan = [
'errors' => '<div class="alert alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h5><i class="icon fas fa-ban"></i> Error!</h5>
    '.$this->vd->listErrors().'
</div>'
];
session()->setFlashdata($pesan);
return redirect()->to('/barang/editform/'.$this->request->getVar('brgkode'));
}else{

$cekdata = $this->barang->find($this->request->getVar('brgkode'));
$pathGambarLama = $cekdata['brggambar'];

$pathGambar = $pathGambarLama;
$gambar = $_FILES['brggambar']['name'];

$data = [
'brgkode' => $this->request->getVar('brgkode'),
'brgnama' => $this->request->getVar('brgnama'),
'brgkatid' => $this->request->getVar('brgkatid'),
'brgsatid' => $this->request->getVar('brgsatid'),
'brgharga' => $this->request->getVar('brgharga'),
'brgstok' => $this->request->getVar('brgstok'),
'brggambar' => $pathGambar,
];



if($gambar != NULL){
if($pathGambarLama != null || $pathGambarLama != ''){
unlink($pathGambarLama);
}
$namaFileGambar = $data['brgkode'];
$fileGambar = $this->request->getFile('brggambar');
$fileGambar->move('upload', $namaFileGambar. '.' . $fileGambar->getExtension());
$pathGambar = 'upload/'.$fileGambar->getName();
}


$data = [
'brgnama' => $this->request->getVar('brgnama'),
'brgkatid' => $this->request->getVar('brgkatid'),
'brgsatid' => $this->request->getVar('brgsatid'),
'brgharga' => $this->request->getVar('brgharga'),
'brgstok' => $this->request->getVar('brgstok'),
'brggambar' => $pathGambar,
];

$this->barang->update($this->request->getVar('brgkode'),$data);

$pesan = [
'sukses' => '<div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h5><i class="icon fas fa-check"></i> Berhasil!</h5>
    Data Barang Dengan Kode <strong>'.$this->request->getVar('brgkode').'</strong> Berhasil Ubah
</div>'
];

session()->setFlashdata($pesan);
return redirect()->to('/barang/index');

}
}

public function hapus($id){
$rwd = $this->barang->find($id);

if($rwd){
if($rwd['brggambar'] != null || $rwd['brggambar'] != ''){
unlink($rwd['brggambar']);
}
$this->barang->delete($id);

$pesan = [
'sukses' => '<div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h5><i class="icon fas fa-check"></i> Berhasil!</h5>
    Data Barang Dengan Kode <strong>'.$id.'</strong> Berhasil Dihapus
</div>'
];

session()->setFlashdata($pesan);
return redirect()->to('/barang/index');
}else{
exit('Data Tidak Ditemukan');
}
}



}