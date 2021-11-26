<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class UserController extends BaseController
{
    public function index()
    {
        $data['page'] = 'users/index';
        return view('admin', $data);
    }
}
