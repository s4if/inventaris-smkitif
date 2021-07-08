<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
	public function run()
	{
		$data = [
            'username' => 'admin',
            'nama'     => 'Musta\'in, S.Pd',
            'email'    => 'admin@administrator.com',
            'password' => password_hash('qwerty', PASSWORD_BCRYPT),
            'role'     => 'admin'
        ];
        $this->db->table('user')->insert($data);

        $data = [
            'username' => 'ismail',
            'nama'     => 'Ismail, S.Pd',
            'email'    => 'ismail@administrator.com',
            'password' => password_hash('qwerty', PASSWORD_BCRYPT),
            'role'     => 'user'
        ];
        $this->db->table('user')->insert($data);
	}
}
