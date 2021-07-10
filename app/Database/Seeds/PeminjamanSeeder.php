<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class PeminjamanSeeder extends Seeder
{
	public function run()
	{
		$waktu_pinjam = new Time('-2 hour', 'Asia/Jakarta');
		$waktu_kembali = new Time('now', 'Asia/Jakarta');
		$data = [
            'waktu_pinjam' => $waktu_pinjam->toDateTimeString(),
            'waktu_kembali' => $waktu_kembali->toDateTimeString(),
            'status_pinjam' => 'selesai',
            'nis_siswa' => 001,
            'pengawas' => 'ismail',
            'kode_barang' => 1001,
        ];
        $this->db->table('peminjaman')->insert($data);

		$waktu_pinjam = new Time('-1 hour', 'Asia/Jakarta');
		$data = [
            'waktu_pinjam' => $waktu_pinjam->toDateTimeString(),
            'status_pinjam' => 'masih dipinjam',
            'nis_siswa' => 002,
            'pengawas' => 'admin',
            'kode_barang' => 1002,
        ];
        $this->db->table('peminjaman')->insert($data);
	}
}
