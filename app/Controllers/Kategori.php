<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Modelkategori;

use \Hermawan\DataTables\DataTable;

class Kategori extends BaseController
{   
    protected $vd;
    
    public function __construct()
    {
        $this->md = new Modelkategori();

        $this->vd =  \Config\Services::validation();
    }
    
    public function index()
    {
        return view('kategori/index');
    }

    public function listtabeldata(){
        if($this->request->isAJAX()){
            $builder    = $this->md->tampildata();
            return DataTable::of($builder)->addNumbering()
            ->add('aksi', function($row){
                return 
                "<button type='button' class='btn btn-sm btn-info' title='edit data'
                onclick='edit(\"$row->katid\")'><i class='fa fa-edit'></i>
                </button>
                <form method='POST' action='/kategori/hapus/$row->katid' style='display:inline;' onsubmit='hapus()'><input type='hidden' value='DELETE' name='_method'>
                    <button type='submit' class='btn btn-sm btn-danger' title='hapus data'>
                    <i class='fa fa-trash-alt'></i>
                    </button>
                </form>";
            })
            ->toJson(TRUE);
            }else{
            exit('maaf tidak bisa dipanggil');
            }
    }

    public function addform(){
        return view('kategori/addform');
    }

    public function addprosess(){
        $data = [
            'katnama' => $this->request->getVar('namakategori')
        ];
        
        $valid = [
            'namakategori' => [
                'label' => 'Kategori',
                'rules'  => 'required|is_unique[kategori.katnama]',
                'errors' => [
                    'required'  => '{field} Tidak Boleh Kosong',
                    'is_unique' => '{field} Sudah Terdata'
                ]
            ]
        ];

        $input = $this->vd->setRules($valid);

        if($this->vd->withRequest($this->request)->run() == FALSE){
            $pesan = [
                'errorNamaKategori' => '<br> <div class="alert alert-danger">'.$this->vd->getError().'</div>' 
            ];
            session()->setFlashdata($pesan);
            return redirect()->to('/kategori/addform');
        }else{
            $this->md->insert($data);
    
            $pesan = [
                'sukses' => '<div class="alert alert-success">Save Data Success</div>' 
            ];

            session()->setFlashdata($pesan);
            return redirect()->to('/kategori/index');

        }
        
    }

    public function editform($id){
        $rwd = $this->md->find($id);
        if($rwd){
            $data = [
                'id'    => $id,
                'nama'  => $rwd['katnama']
            ];

            return view('kategori/editform',$data);
        }else{
            exit('Data Tidak Ditemukan');
        }
    }

    public function editprosess(){
        
        $id = $this->request->getVar('idkategori');
        
        $data = [
            'katnama' => $this->request->getVar('namakategori')
        ];
        
        $valid = [
            'namakategori' => [
                'label' => 'Kategori',
                'rules'  => 'required|is_unique[kategori.katnama]',
                'errors' => [
                    'required'  => '{field} Tidak Boleh Kosong',
                    'is_unique' => '{field} Sudah Terdata'
                ]
            ]
        ];

        $input = $this->vd->setRules($valid);

        if($this->vd->withRequest($this->request)->run() == FALSE){
            $pesan = [
                'errorNamaKategori' => '<br> <div class="alert alert-danger">'.$this->vd->getError().'</div>' 
            ];
            session()->setFlashdata($pesan);
            return redirect()->to('/kategori/editform/'.$id);
        }else{
            $this->md->update($id,$data);
    
            $pesan = [
                'sukses' => '<div class="alert alert-success">Update Data Success</div>' 
            ];

            session()->setFlashdata($pesan);
            return redirect()->to('/kategori/index');

        }
    }

    public function hapus($id){
        $rwd = $this->md->find($id);
        if($rwd){
            $this->md->delete($id);
            
            $pesan = [
                'sukses' => '<div class="alert alert-success">Delete Data Success</div>' 
            ];

            session()->setFlashdata($pesan);
            return redirect()->to('/kategori/index');
        }else{
            exit('Data Tidak Ditemukan');
        }
    }

}