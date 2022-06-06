<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use Config\Services;
use App\Models\UserModel;

use CodeIgniter\Files\File;
use Myth\Auth\Authorization\GroupModel;
use Myth\Auth\Entities\User;
use \Hermawan\DataTables\DataTable;

use CodeIgniter\API\ResponseTrait;

class Usermag extends BaseController
{
    use ResponseTrait;
    
    public function __construct(){   
        $this->db = \Config\Database::connect();
        $this->config = config('Auth');

        $this->md = new UserModel;

        $this->builder = $this->db->table('users');
        $this->groups  = $this->db->table('auth_groups');

        $this->session = service('session');
		$this->config = config('Auth');
		$this->auth = service('authentication');
        // $this->authorize = $auth = service('authorization');
    }

    public function index(){
        $data['groups'] = $this->groups->get();
        return view('users/index',$data);
    }

    public function listdata(){
        if($this->request->isAJAX()){
            // $data = $this->qlist_data();
            $data = $this->md->select('fullname,username,email,groups.name as role, users.id as idUsers')
                            ->join('auth_groups_users as roles', 'roles.user_id = users.id','left')
                            ->join('auth_groups as groups', 'groups.id = roles.group_id','left')
                            ->where('users.id !=',user_id());
            return DataTable::of($data)
            ->add('aksi', function($row){
                return 
                "<a href='".site_url('usermag/showdetail/'.$row->idUsers)."' class='btn btn-info btn-circle btn-sm'><i class='fas fa-eye'></i></a>
                &nbsp;
                <button type='button' class='btn btn-sm btn-info' title='Edit Data'
                onclick='eddata(\"$row->idUsers\")'><i class='fa fa-edit'></i>
                </button>
                &nbsp;
                <button type='button' class='btn btn-sm btn-danger' title='Hapus Data'
                onclick='hapus_data(\"$row->idUsers\")'><i class='fa fa-trash-alt'></i>
                </button>";
            }, 'last')->postQuery(function($builder){

                $builder->orderBy('username', 'asc');
        
            })->addNumbering()->toJson(TRUE);
        }else{
            exit('maaf tidak bisa dipanggil');
        }
    }

    function qlist_data($id = null){   

        if(empty($id)){
            $this->builder->select('users.id as userid, username, email, groups.name as role');
        }else{
            $this->builder->select('users.id as userid, username, email, groups.name as role, user_image as picture, fullname');
        }
            //jointabel          
            $this->builder->join('auth_groups_users as roles', 'roles.user_id = users.id','left')
                          ->join('auth_groups as groups', 'groups.id = roles.group_id','left');                   
            // $this->builder->where('users.id !=','1');
            // $this->builder->where('users.id !=',user_id());

        if($id && $id!=1){
            $this->builder->where('users.id',$id);
        }

        return $this->builder;
    }

    public function store(){  
        if($this->request->isAJAX()){
            $data['error']      = "";
            $data['success']    = ""; 
            $data['token']      = csrf_hash();  
            $validation = \Config\Services::validation();
            $validation = \Config\Services::validation();
            
            $datainput = [
                'username'      => $this->request->getPost('username'),
                'email'         => $this->request->getPost('email'),
                'password'      => $this->request->getPost('password'),
                'fullname'      => $this->request->getPost('fullname'),
                'user_image'    => 'default.svg',
                'active'        => 1,
                'role'          => $this->request->getPost('role')
            ]; 

            if($_FILES['picture']['name']){
                $validated = $this->validate([
                    'picture' => [
                        'uploaded[picture]',
                        'mime_in[picture,image/jpg,image/jpeg,image/gif,image/png]',
                        'max_size[picture,1096]',
                    ],
                ]);
                $data['error'] = array('picture' => 'Please select a valid picture');
            }

            $input = $validation->setRules([ 
                'username'        => ['label' => 'Username', 'rules'  => 'required|min_length[6]|alpha_numeric|is_unique[users.username]'],
                'email'           => ['label' => 'Email', 'rules'     => 'required|valid_email|is_unique[users.email]'],
                'password'        => ['label' => 'Password', 'rules'  => 'required|min_length[6]'],
                'repeatpassword'  => ['label' => 'Repeat Password', 'rules' => 'required|matches[password]'],
                'role'            => ['label' => 'Role', 'rules'      => 'required'],
              ]);

            if ($validation->withRequest($this->request)->run() == FALSE){
                $data['success'] = 0;
                $data['error'] = $validation->getErrors();// Error response
                $data['token'] = csrf_hash(); 
             }else{
                   //data to db
                 if($_FILES['picture']['name']){
                     $img        = $this->request->getFile('picture');
                     $ext        = $img->getClientExtension();
                     $newName    = strtolower($this->request->getPost('username')).".".$ext;
                     // $img->move(WRITEPATH . 'img/user_picture', $newName);
                     $img->move(ROOTPATH . 'public/img/users_image', $newName);
                     if ($img->isValid() && ! $img->hasMoved()){   
                         $data['success'] = 0;
                         $data['token']   = csrf_hash(); 
                         $data['error']   = "";
                     } else {
                         $data['success'] = 1;
                         $data['token'] = csrf_hash(); 
                         $data['error'] = "The picture has already been moved";
                         $datainput['user_image'] = $newName; 
                     }
                 }else{
                     $data['success'] = 1;
                     $data['token']   = csrf_hash(); 
                     $data['error']   = "";
                 }
             
                 $users = model(UserModel::class);
                 $user = new User($datainput);
                 if (!$users->withGroup($datainput['role'])->save($user))
                 {
                         $data['success'] = 0;
                         $data['token'] = csrf_hash(); 
                         $data['error'] = "Error input to database";
                 }
             }
            
            $json = [
                'sukses' => 'User berhasil ditambahkan | '.$datainput['fullname']
            ];

            $response = [
                'success'   => $data['success'],
                'msg'       => $data['error'],
                'token'     => $data['token'],
            ];
            
            return $this->response->setJSON($response);
            
        }else{
            exit('maaf tidak bisa dipanggil');
        }
    }

    public function update($id = null){  
        if($this->request->isAJAX()){
        $data['error']      = "";
        $data['success']    = ""; 
        $data['token'] = csrf_hash();  
        $validation = \Config\Services::validation();

        $datainput = [
            'fullname'      => $this->request->getPost('fullname'),
            'role'          => $this->request->getPost('role'),
        ]; 

        //gambar
        $valisdasi = ['role'            => ['label' => 'Role', 'rules' => 'required']];
        //password
        if($this->request->getPost('password') != NULL){
                $valisdasi['password']          = ['label' => 'Password', 'rules' => 'min_length[6]'];
                $valisdasi['repeatpassword']    = ['label' => 'Repeat Password', 'rules' => 'matches[password]'];
                $datainput['password']          = $this->request->getPost('password');
        }
        //username&email
        $useredit = $this->qlist_data($id)->get()->getrow();
        //username
        if($useredit->username != $this->request->getPost('username')){
            $valisdasi['username']   = ['label' => 'Username', 'rules' => 'required|min_length[6]|alpha_numeric|is_unique[users.username]'];
            $datainput['username']   = $this->request->getPost('username');
        }else{
            $valisdasi['username']   = ['label' => 'Username', 'rules' => 'required|min_length[6]|alpha_numeric|'];
        }
        //email
        if($useredit->email != $this->request->getPost('email')){
            $valisdasi['email'] = ['label' => 'Email', 'rules' => 'required|valid_email|is_unique[users.email]'];
            $datainput['email'] = $this->request->getPost('email');
        }else{
            $valisdasi['email'] = ['label' => 'Email', 'rules' => 'required|valid_email'];
        }
        
        $file = $this->request->getFile('userfile');

        // $request->getFiles();
        $request = \Config\Services::request();
        $files = $request->getFiles();
        if ($_FILES['picture']['name']) {
                $validated = $this->validate([
                    'picture' => [
                        'uploaded[picture]',
                        'mime_in[picture,image/jpg,image/jpeg,image/gif,image/png]',
                        'max_size[picture,1096]',
                    ],
                ]);
                $data['error'] = array('picture' => 'Please select a valid picture');
        }
    

        $input = $validation->setRules($valisdasi);

       

        if ($validation->withRequest($this->request)->run() == FALSE){
            $data['success']    = 0;
            $data['error']      = $validation->getErrors();// Error response
            $data['token']      = csrf_hash(); 
         }else{
            if($_FILES['picture']['name']){
                $img        = $this->request->getFile('picture');
                $ext        = $img->getClientExtension();
                $newName    = strtolower($this->request->getPost('username')).".".$ext;
                // $img->move(WRITEPATH . 'img/user_picture', $newName);
                $img->move(ROOTPATH . 'public/img/users_image', $newName);
                if ($img->isValid() && ! $img->hasMoved()){   
                    $data['success'] = 0;
                    $data['token']   = csrf_hash(); 
                    $data['error']   = "";
                } else {
                    $data['success']    = 1;
                    $data['token']      = csrf_hash(); 
                    $data['error']      = "The picture has already been moved";
                    $datainput['user_image'] = $newName; 
                }
            }

            $users = model(UserModel::class);
            if(!$users->update($id, $datainput)){
                $data['success'] = 0;
                $data['token']   = csrf_hash(); 
                $data['error']   = "Error update to database";;
            }else{
                $groupModel = model(GroupModel::class);
                
                $usgrp = $groupModel->getGroupsForUser($id);
                
                foreach ($usgrp as $row)
                {
                        $nmgroup = $row['name'];
                        $idgroup = $row['group_id'];
                }
                
                if($nmgroup !==  $this->request->getPost('role')){
                    if($groupModel->removeUserFromGroup($id,$idgroup)){
                        $newgroup   = $this->groups->select()->where('name',$datainput['role'])->get()->getRow();
                        $groupModel->addUserToGroup($id,$newgroup->id);   
                    }
                }        
                
                $data['success']    = 1;
                $data['token']      = csrf_hash(); 
            }
         }

         $response = [
            'success'   => $data['success'],
            'msg'       => $data['error'],
            'token'     => $data['token'],
        ];      

        return $this->response->setJSON($response);
        }else{
            exit('maaf tidak bisa dipanggil');
        }
    }

    public function delete($id = null){
        if (!empty($id)) {
            $users          = model(UserModel::class);
            $groupModel     = model(GroupModel::class);
            

            $query = $this->qlist_data($id)->get()->getRow();  
            $pic = 'img/users_image/'.$query->picture; 
            if($query->picture !== 'default.svg'){
                if(file_exists(FCPATH.'img/users_image/'.$query->picture)){ 
                    unlink(FCPATH."img/users_image/".$query->picture);
                }
            }

            $groupModel->removeUserFromAllGroups($id);
                $this->db->table('users')->where(["id" => $id])->delete();
            $response = [
                'success' => true,
                'msg' => "User Berhasil Dihapus",
            ];
        } else {
            $response = [
                'success' => true,
                'msg' => "Data tidak terhapus silakan kontak admin anda",
            ];
        }
        return $this->response->setJSON($response);
    }

    public function getdata($id = null){
        if($this->request->isAJAX()){
            if(!empty($id)){
                $query          = $this->qlist_data($id)->get();
                $data['user']   = $query->getRow();
                $response = [
                    'success'   => true,
                    'msg'       => "Data Berhasil",
                    'user'      => $data
                ];      
            }else{
                $response = [
                    'success'   => false,
                    'msg'       => "Data Gagal",
                ];
            }
            return $this->response->setJSON($response);
        }else{
            exit('maaf tidak bisa dipanggil');
        }
    }

    public function showdetail($id = null){
        $query = $this->qlist_data($id)->get();
        $data['user'] = $query->getRow();
        
        //  dd($data['user']);
        $data['groups'] = $this->groups->get();
        if(empty($data['user'])){
            return redirect()->to('usermag/index');
        }
        return view('users/detail_user',$data);
    }

    public function getdataprofile(){
        if($this->request->isAJAX()){
            $iduser     = $this->request->getPost('user');
            $userdata['user']   = $this->_getdataprofile($iduser)->get()->getRowArray();
            $data       = [
                'success'   => true,
                'msg'       => "Data Berhasil",
                'user'      => $userdata
            ];
            return $this->response->setJSON($data);
        }else{
            exit('maaf tidak bisa dipanggil');
        } 
    }

    private function _getdataprofile($id){
        $this->builder->select('users.id as userid, username, email, user_image as picture, fullname')
                      ->Where([
            'sha1(users.id)' => $id
        ]);
            
        return $this->builder;
    }

    public function updateprofile($id = null){
        if($this->request->isAJAX()){
            $data['error']      = "";
            $data['success']    = ""; 
            $data['token'] = csrf_hash();  
            $validation = \Config\Services::validation();
    
            $datainput = [
                'fullname'      => $this->request->getPost('fullname'),
            ]; 
    
            //gambar
            //password
            if($this->request->getPost('password') != NULL){
                    $valisdasi['password']          = ['label' => 'Password', 'rules' => 'min_length[6]'];
                    $valisdasi['repeatpassword']    = ['label' => 'Repeat Password', 'rules' => 'matches[password]'];
                    $datainput['password']          = $this->request->getPost('password');
            }
            //username&email
            $useredit = $this->qlist_data($id)->get()->getrow();
            //username
            if($useredit->username != $this->request->getPost('username')){
                $valisdasi['username']   = ['label' => 'Username', 'rules' => 'required|min_length[6]|alpha_numeric|is_unique[users.username]'];
                $datainput['username']   = $this->request->getPost('username');
            }else{
                $valisdasi['username']   = ['label' => 'Username', 'rules' => 'required|min_length[6]|alpha_numeric|'];
            }
            //email
            if($useredit->email != $this->request->getPost('email')){
                $valisdasi['email'] = ['label' => 'Email', 'rules' => 'required|valid_email|is_unique[users.email]'];
                $datainput['email'] = $this->request->getPost('email');
            }else{
                $valisdasi['email'] = ['label' => 'Email', 'rules' => 'required|valid_email'];
            }
            
            $file = $this->request->getFile('userfile');
    
            // $request->getFiles();
            $request = \Config\Services::request();
            $files = $request->getFiles();
            if ($_FILES['picture']['name']) {
                    $validated = $this->validate([
                        'picture' => [
                            'uploaded[picture]',
                            'mime_in[picture,image/jpg,image/jpeg,image/gif,image/png]',
                            'max_size[picture,1096]',
                        ],
                    ]);
                    $data['error'] = array('picture' => 'Please select a valid picture');
            }
        
    
            $input = $validation->setRules($valisdasi);
    
           
    
            if ($validation->withRequest($this->request)->run() == FALSE){
                $data['success']    = 0;
                $data['error']      = $validation->getErrors();// Error response
                $data['token']      = csrf_hash(); 
             }else{
                if($_FILES['picture']['name']){
                    $img        = $this->request->getFile('picture');
                    $ext        = $img->getClientExtension();
                    $newName    = strtolower($this->request->getPost('username')).".".$ext;
                    // $img->move(WRITEPATH . 'img/user_picture', $newName);
                    $img->move(ROOTPATH . 'public/img/users_image', $newName);
                    if ($img->isValid() && ! $img->hasMoved()){   
                        $data['success'] = 0;
                        $data['token']   = csrf_hash(); 
                        $data['error']   = "";
                    } else {
                        $data['success']    = 1;
                        $data['token']      = csrf_hash(); 
                        $data['error']      = "The picture has already been moved";
                        $datainput['user_image'] = $newName; 
                    }
                }
    
                $users = model(UserModel::class);
                if(!$users->update($id, $datainput)){
                    $data['success'] = 0;
                    $data['token']   = csrf_hash(); 
                    $data['error']   = "Error update to database";;
                }else{
                    $data['success']    = 1;
                    $data['token']      = csrf_hash(); 
                }
             }
    
             $response = [
                'success'   => $data['success'],
                'msg'       => $data['error'],
                'token'     => $data['token'],
            ];      
    
            return $this->response->setJSON($response);
            }else{
                exit('maaf tidak bisa dipanggil');
            }
    }
}