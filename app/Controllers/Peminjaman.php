<?php

namespace App\Controllers;

use CodeIgniter\API\ResponseTrait;
use CodeIgniter\I18n\Time;

class Peminjaman extends BaseController
{

	use ResponseTrait;

	public function index()
	{
		return view('peminjaman/index', [
			'notice' => $this->session->getFlashdata('notice'),
			'username' => $this->session->username,
			'list_siswa' => $this->getTable('siswa'),
			'list_barang' => $this->getTable('barang'),
			'hari_ini' => (new Time('now'))->toDateString(),
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
		// TODO: Where untuk setting per hari tapi yang status pinjam belum selesai tetap tampil
		$query = $builder->get();
		$raw = $query->getResult();
		$res = [];
		foreach($raw as $row){
			$row->aksi = "<button class='btn btn-sm btn-primary' onClick='tampilEdit("
				. $row->id_pinjam . ")'>Edit</button>";
			// Hapus dimasukkan dalam panel Edit
			$res[] = $row;
		}
		return $this->respond([
			'data' => $res
		]);
	}

	public function loadSingleData($id){
		$sql = 'select * from peminjaman where id=:id:';
		$query = $this->db->query($sql, ['id' => $id]);
		$row = $query->getRow();
		if (isset($row)) {
			$waktu_pinjam = Time::createFromFormat('Y-m-d H:i:s', $row->waktu_pinjam);
			$row->tanggal_pinjam = $waktu_pinjam->toDateString();
			$row->jam_pinjam = substr($waktu_pinjam->toTimeString(), 0, 5);
			if (is_null($row->waktu_kembali)) {
				$row->tanggal_kembali = (new Time('now'))->toDateString();
				$row->jam_kembali = '00:00';
			} else {
				$waktu_kembali = Time::createFromFormat('Y-m-d H:i:s', $row->waktu_kembali);
				$row->tanggal_kembali = $waktu_kembali->toDateString();
				$row->jam_kembali = substr($waktu_kembali->toTimeString(), 0, 5);
			}
			return $this->respond($row);
		} else {
			return $this->failNotFound('data dengan id : '. $id .' tidak ada!');
		}
	}

	private function getTable($tabel){
		$builder = $this->db->table($tabel);
		$query = $builder->get();
		return $query->getResult();
	}

	public function beranda(){
		$username = $this->session->username;
		return 'selamat datang' . $username . ', ini halaman beranda';
	}
}
