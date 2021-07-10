<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class BarangSeeder extends Seeder
{
	public function run()
	{
		$data = [
            'kode' => 1001,
            'nama'     => 'LCD Projector 1',
            'kondisi' => 'baik',
            'kategori' => 'LCD Projector',
            'tempat_penyimpanan' => 'Kantor',
        ];
        $this->db->table('barang')->insert($data);

        $data = [
            'kode' => 1002,
            'nama'     => 'Stand Mic',
            'kondisi' => 'rusak ringan',
            'kategori' => 'Stand Mic',
            'tempat_penyimpanan' => 'Gudang',
        ];
        $this->db->table('barang')->insert($data);

        $data = [
            'kode' => 1003,
            'nama'     => 'LCD Projector 2',
            'kondisi' => 'baik',
            'kategori' => 'LCD Projector',
            'tempat_penyimpanan' => 'Kantor',
        ];
        $this->db->table('barang')->insert($data);

        $data = [
            'kode' => 1004,
            'nama'     => 'Mimbar',
            'kondisi' => 'baik',
            'kategori' => 'Mimbar',
            'tempat_penyimpanan' => 'Gudang',
        ];
        $this->db->table('barang')->insert($data);
	}
}
