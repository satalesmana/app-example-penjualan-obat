<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class RegisterController extends BaseController
{
    var $UserModel;

	public function __construct(){
		$this->UserModel = new \App\Models\Users();
	}

    public function index()
    {
        return view('users/register');
    }

    public function create(){
        $request=[
            'emil' => $this->request->getPost('email'),
            'namaPengguna' => $this->request->getPost('nama_pengguna'),
            'userType' => 'Admin',
            'userAlias' => '',
            'Password' => $this->request->getPost('password'),
            'Status' => 0
        ];

        if($this->UserModel->save($request)){
            return $this->response->setJSON([
                "pesan"=>"Data berhasil disimpan"
            ]);
        }else{
            return $this->response->setJSON([
                "pesan"=>"Data gagal disimpan"
            ]);
        }
    }

    public function list(){
        $data =  $this->UserModel->findAll();
        return $this->response->setJSON([
            "data"=>$data
        ]);
    }
}
