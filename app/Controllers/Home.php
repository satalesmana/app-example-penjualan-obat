<?php

namespace App\Controllers;

class Home extends BaseController
{
    var $session;

	public function __construct(){
		$this->session = \Config\Services::session();
	}

    public function index()
    {
        $data['message'] = $this->session->getFlashdata('message');
        return view('welcome_message',$data);
    }

    public function dashboard(){

        $data['page'] = 'users/dashboard_view';
        $data['userlog'] = $this->session->get();
        return view('admin', $data);
    }
}
