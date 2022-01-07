<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class PenjualanController extends BaseController
{
    public function index()
    {
        $data['page'] = 'transaksi/penjualan/index';
        return view('admin', $data);
    }

    public function list_penjualan(){
        $data['page'] = 'transaksi/penjualan/daftarpenjualan';
        return view('admin', $data);
    }
}
