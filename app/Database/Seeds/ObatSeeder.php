<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ObatSeeder extends Seeder
{
    public function run()
    {
        $data = [
        	[
                'nama_obat' 	=> 'Panadol',
                'harga_jual'    => 6000,
                'harga_beli'    => 5000,
                'qty'    		=> 100
        	],
	        [
                'nama_obat' 	=> 'Parasetamol',
                'harga_jual'    => 6000,
                'harga_beli'    => 5000,
                'qty'    		=> 100
	        ]
	    ];

        $this->db->table('obat')->insertBatch($data);
    }
}
