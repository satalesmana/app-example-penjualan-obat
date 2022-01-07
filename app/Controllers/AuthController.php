<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class AuthController extends BaseController
{
    var $session;
    var $users;

	public function __construct(){
		$this->session = \Config\Services::session();
        $this->users = new \App\Models\Users();
	}

    public function index()
    {
        //
    }

    public function login(){
        $request = $this->request->getPost();

        if($request['username']=='admin@mail.com'
            && $request['password']=='admin123'){

            $data = [
                'username'  => $request['username'],
                'level' => 'Admin',
                'namaPengguna' => 'Administrator',
                'logged_in' => true,
            ];
            
            $this->session->set($data);
            return redirect()->to('/admin/dashboard');
        }

        $cekUser = $this->users->where('Status', '1')
            ->where('emil',$request['username'])
            ->where('Password', $request['password'])
            ->findAll();

        
        if(count($cekUser) > 0){
            $data = [
                'username'  => $request['username'],
                'level' => $cekUser[0]['userType'],
                'namaPengguna' => $cekUser[0]['namaPengguna'],
                'logged_in' => true,
            ];
            
            $this->session->set($data);
            return redirect()->to('/admin/dashboard');
        }

        $this->session->setFlashdata('message', 'Usrname dan password tidak ditemukan (admin@mail.com /admin123)');
       return redirect()->to('/');        
    }

    public function logout(){
        $this->session->destroy();
        return redirect()->to('/');
    }
}
