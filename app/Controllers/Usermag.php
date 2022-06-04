<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\UserModel;

use CodeIgniter\Files\File;
use Myth\Auth\Authorization\GroupModel;
use Myth\Auth\Entities\User;
use \Hermawan\DataTables\DataTable;

class Usermag extends BaseController
{
    public function __construct()
    {   
        $this->db = \Config\Database::connect();
        $this->config = config('Auth');

        $this->md = new UserModel;

        $this->builder = $this->db->table('users');
        $this->groups  = $this->db->table('auth_groups');

        $this->session = service('session');
		$this->config = config('Auth');
		$this->auth = service('authentication');
        $this->authorize = $auth = service('authorization');
    }

    public function index()
    {
        $data['groups'] = $this->groups->get();
        return view('users/index',$data);
    }

    public function listdata(){
        if($this->request->isAJAX()){
            // $data = $this->qlist_data();
            $data = $this->md->select('fullname,username,email,groups.name as role, users.id as idUsers')
                            ->join('auth_groups_users as roles', 'roles.user_id = users.id','left')
                            ->join('auth_groups as groups', 'groups.id = roles.group_id','left');
            return DataTable::of($data)
            ->add('aksi', function($row){
                return 
                "<button type='button' class='btn btn-sm btn-info' title='edit data'
                onclick='edit(\"$row->idUsers\")'><i class='fa fa-edit'></i>
                </button>
                <form method='POST' action='/usermag/hapus/$row->idUsers' style='display:inline;' onsubmit='hapus()'><input type='hidden' value='DELETE' name='_method'>
                    <button type='submit' class='btn btn-sm btn-danger' title='hapus data'>
                    <i class='fa fa-trash-alt'></i>
                    </button>
                </form>";
            }, 'last')->postQuery(function($builder){

                $builder->orderBy('username', 'asc');
        
            })->addNumbering()->toJson(TRUE);
        }else{
            exit('maaf tidak bisa dipanggil');
        }
    }

    protected function qlist_data($id = null){   

        if(empty($id)){
            $this->builder->select('users.id as userid, username, email, groups.name as role');
        }else{
            $this->builder->select('users.id as userid, username, email, groups.name as role, user_image as picture, fullname');
        }
            //jointabel          
            $this->builder->join('auth_groups_users as roles', 'roles.user_id = users.id')
                          ->join('auth_groups as groups', 'groups.id = roles.group_id');                   
            // $this->builder->where('users.id !=','1');
            // $this->builder->where('users.id !=',user_id());

        if($id && $id!=1){
            $this->builder->where('users.id',$id);
        }

        return $this->builder;
    }

    public function showDetail(){
        
    }
}