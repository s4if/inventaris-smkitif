<?php

namespace App\Controllers;

class Peminjaman extends BaseController
{
	public function index()
	{
		return view('peminjaman/index', [
			'notice' => $this->session->getFlashdata('notice'),
			'username' => $this->session->username,
		]);
	}

	public function coba(){
		$builder = $this->db->table('peminjaman');
		$builder->select("peminjaman.id as 'id_pinjam'");
		$builder->select("siswa.nama as 'nama_peminjam'");
		$builder->select("siswa.kelas as 'kelas'");
		$builder->select("barang.kode as 'kode_barang'");
		$builder->select("barang.nama as 'nama_barang'");
		$builder->select("peminjaman.waktu_pinjam as 'waktu_pinjam'");
		$builder->select("peminjaman.waktu_kembali as 'waktu_kembali'");
		$builder->select("peminjaman.status_pinjam as 'status_pinjam'");
		$builder->select("user.nama as 'nama_pengawas'");
		$builder->join('barang', 'barang.kode=kode_barang', 'left');
		$builder->join('siswa', 'siswa.nis=nis_siswa', 'left');
		$builder->join('user', 'user.username=pengawas', 'left');
		$query = $builder->get();
		$res = $query->getResult();

		$json = json_encode([
			'data' => $res
		]);
		var_dump($json);
	}

	public function loadData($tanggal = 'all'){ // load_data berdasarkan tanggal?
		$builder = $this->db->table('peminjaman');
		$builder->select("peminjaman.id as 'id_pinjam'");
		$builder->select("siswa.nama as 'nama_peminjam'");
		$builder->select("siswa.kelas as 'kelas'");
		$builder->select("barang.kode as 'kode_barang'");
		$builder->select("barang.nama as 'nama_barang'");
		$builder->select("peminjaman.waktu_pinjam as 'waktu_pinjam'");
		$builder->select("peminjaman.waktu_kembali as 'waktu_kembali'");
		$builder->select("peminjaman.status_pinjam as 'status_pinjam'");
		$builder->select("user.nama as 'nama_pengawas'");
		$builder->join('barang', 'barang.kode=kode_barang', 'left');
		$builder->join('siswa', 'siswa.nis=nis_siswa', 'left');
		$builder->join('user', 'user.username=pengawas', 'left');
		$query = $builder->get();
		$raw = $query->getResult();
		$res = [];
		foreach($raw as $row){
			$row->aksi = "<button class='btn btn-sm btn-primary'>Edit</button>";
			// Hapus dimasukkan dalam panel Edit
			$res[] = $row;
		}
		return json_encode([
			'data' => $res
		]);
	}

	public function beranda(){
		$username = $this->session->username;
		return 'selamat datang' . $username . ', ini halaman beranda';
	}
}
