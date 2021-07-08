<?php

namespace App\Controllers;

class Login extends BaseController
{
	public function index()
	{
		return view('login/index', [
			'title' => 'Halaman Login!',
			'notice' => $this->session->getFlashdata('notice')
		]);
	}

	public function doLogin()
	{
		$username = $this->request->getPost('username');
		$password = $this->request->getPost('password');
		$sql = 'select * from user where username = :username:;';
		$query = $this->db->query($sql, ['username' => $username]);
		$row = $query->getRow();
		if (isset($row)) {
			if (password_verify($password, $row->password)) {
				$this->session->set('logged_in', TRUE);
				$this->session->set('username', $row->username);
				$this->session->set('role', $row->role);
				return redirect()->to('/beranda');
			} else {
				$this->session->setFlashdata('notice','Maaf, password salah!');
				return redirect()->to('/login');
			}
		} else {
			$this->session->setFlashdata('notice','Maaf, username salah!');
			return redirect()->to('/login');
		}
	}

	public function logout()
	{
		session_destroy();
		return redirect()->to('/login');
	}
}
