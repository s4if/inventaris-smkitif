<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class BarangSeeder extends Seeder
{
	public function run()
	{
		$data = [
            'kode' => 1001,
            'nama'     => 'LCD Projector',
            'kondisi' => 'baik',
            'jml_barang' => 1,
            'tempat_penyimpanan' => 'Kantor',
        ];
        $this->db->table('barang')->insert($data);

        $data = [
            'kode' => 1002,
            'nama'     => 'Stand Mic',
            'kondisi' => 'rusak ringan',
            'jml_barang' => 1,
            'tempat_penyimpanan' => 'Gudang',
        ];
        $this->db->table('barang')->insert($data);
	}
}
