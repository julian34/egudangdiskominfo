<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Modelsatuan;

class Satuan extends BaseController
{
    protected $vd;
    
    public function __construct()
    {
        $this->md = new Modelsatuan();

        $this->vd =  \Config\Services::validation();
    }
    
    public function index()
    {
        //

        $tombolcari = $this->request->getPost('tombolcari');

        if(isset($tombolcari)){
            $cari = $this->request->getPost('cari');
            session()->set('cari_satuan',$cari);
            redirect()->to('/satuan/index');
        }else{
            $cari = session()->get('cari_satuan');
        }

         $dataSatuan = $cari ? $this->md->cariData($cari)->paginate(5, 'satuan') : $this->md->paginate(5, 'satuan');

        $nohal = $this->request->getVar('page_satuan') ? $this->request->getVar('page_satuan') : 1;
        $data = [
            // 'tampildata' => $this->md->findAll()
            'tampildata' => $dataSatuan,
            'pager'      => $this->md->pager,
            'nohal'      => $nohal,
            'cari'       => $cari 
        ];

        return view('satuan/index', $data);
    }

    public function addform(){
        return view('satuan/addform');
    }

    public function addprosess(){
        $data = [
            'satnama' => $this->request->getVar('namasatuan')
        ];
        
        $valid = [
            'namasatuan' => [
                'label' => 'Satuan',
                'rules'  => 'required|is_unique[satuan.satnama]',
                'errors' => [
                    'required'  => '{field} Tidak Boleh Kosong',
                    'is_unique' => '{field} Sudah Terdata'
                ]
            ]
        ];

        $input = $this->vd->setRules($valid);

        if($this->vd->withRequest($this->request)->run() == FALSE){
            $pesan = [
                'errornamasatuan' => '<br> <div class="alert alert-danger">'.$this->vd->getError().'</div>' 
            ];
            session()->setFlashdata($pesan);
            return redirect()->to('/satuan/addform');
        }else{
            $this->md->insert($data);
    
            $pesan = [
                'sukses' => '<div class="alert alert-success">Save Data Success</div>' 
            ];

            session()->setFlashdata($pesan);
            return redirect()->to('/satuan/index');

        }
        
    }

    public function editform($id){
        $rwd = $this->md->find($id);
        if($rwd){
            $data = [
                'id'    => $id,
                'nama'  => $rwd['katnama']
            ];

            return view('satuan/editform',$data);
        }else{
            exit('Data Tidak Ditemukan');
        }
    }

    public function editprosess(){
        
        $id = $this->request->getVar('idsatuan');
        
        $data = [
            'katnama' => $this->request->getVar('namasatuan')
        ];
        
        $valid = [
            'namasatuan' => [
                'label' => 'satuan',
                'rules'  => 'required|is_unique[satuan.katnama]',
                'errors' => [
                    'required'  => '{field} Tidak Boleh Kosong',
                    'is_unique' => '{field} Sudah Terdata'
                ]
            ]
        ];

        $input = $this->vd->setRules($valid);

        if($this->vd->withRequest($this->request)->run() == FALSE){
            $pesan = [
                'errorNamasatuan' => '<br> <div class="alert alert-danger">'.$this->vd->getError().'</div>' 
            ];
            session()->setFlashdata($pesan);
            return redirect()->to('/satuan/editform/'.$id);
        }else{
            $this->md->update($id,$data);
    
            $pesan = [
                'sukses' => '<div class="alert alert-success">Update Data Success</div>' 
            ];

            session()->setFlashdata($pesan);
            return redirect()->to('/satuan/index');

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
            return redirect()->to('/satuan/index');
        }else{
            exit('Data Tidak Ditemukan');
        }
    }
}