<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class AuthController extends BaseController
{
    var $session;

	public function __construct(){
		$this->session = \Config\Services::session();
	}

    public function index()
    {
        //
    }

    public function login(){
        $request = $this->request->getPost();

        var_dump($request);
        if($request['username']=='admin@mail.com'
            && $request['password']=='admin123'){

            $data = [
                'username'  => $request['username'],
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
