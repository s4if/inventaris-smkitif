<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SiswaSeeder extends Seeder
{
	public function run()
	{
		$data = [
            'nis' => '001',
            'nama'     => 'Hanif',
            'kelas'    => 'X TKJ 1',
        ];
        $this->db->table('siswa')->insert($data);

        $data = [
            'nis' => '002',
            'nama'     => 'Hendro',
            'kelas'    => 'X TKJ 1',
        ];
        $this->db->table('siswa')->insert($data);
	}
}
