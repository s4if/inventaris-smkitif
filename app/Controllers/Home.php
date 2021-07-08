<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		return view('welcome_message');
	}

	public function beranda(){
		$username = $this->session->username;
		return 'selamat datang' . $username . ', ini halaman beranda';
	}
}
