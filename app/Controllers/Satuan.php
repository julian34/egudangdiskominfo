<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Modelsatuan;

use \Hermawan\DataTables\DataTable;

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

    
    public function listtabeldata(){
        if($this->request->isAJAX()){
            $builder    = $this->md->tampildata();
            return DataTable::of($builder)->addNumbering()
            ->add('aksi', function($row){
                return 
                "<button type='button' class='btn btn-sm btn-info' title='edit data'
                onclick='edit(\"$row->satid\")'><i class='fa fa-edit'></i>
                </button>
                <form method='POST' action='/satuan/hapus/$row->satid' style='display:inline;' onsubmit='hapus()'><input type='hidden' value='DELETE' name='_method'>
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
                'nama'  => $rwd['satnama']
            ];

            return view('satuan/editform',$data);
        }else{
            exit('Data Tidak Ditemukan');
        }
    }

    public function editprosess(){
        
        $id = $this->request->getVar('idsatuan');
        
        $data = [
            'satnama' => $this->request->getVar('namasatuan')
        ];
        
        $valid = [
            'namasatuan' => [
                'label' => 'satuan',
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