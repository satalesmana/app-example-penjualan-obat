<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class PenjualanController extends BaseController
{
    var $obat;
    var $users;
    public function __construct()
    {
        $this->obat = new \App\Models\Obat();
        $this->users = new \App\Models\Users();

    }

    public function index()
    {
        $data['page'] = 'transaksi/penjualan/index';
        $data['obat_list'] = $this->obat->findAll();
        $data['users'] = $this->users->findAll();
        
        return view('admin', $data);
    }

    public function list_penjualan(){
        $data['page'] = 'transaksi/penjualan/daftarpenjualan';
        return view('admin', $data);
    }
}
