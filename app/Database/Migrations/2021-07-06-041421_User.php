<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class User extends Migration
{
	public function up()
	{
		$this->db->disableForeignKeyChecks();

		$this->forge->addField([
            'username'       => [
                'type'       => 'VARCHAR',
                'constraint' => 25,
            ],
            'nama'       => [
                'type'       => 'VARCHAR',
                'constraint' => 45,
                'null'       => false,
            ],
            'password'       => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => false,
            ],
            'email'          => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => false,
            ],
            'role'           => [
                'type'       => 'VARCHAR',
                'constraint' => 14,
                'null'       => true,
            ],
        ]);


        $this->forge->addPrimaryKey('username');

        $this->forge->createTable('user');
        
        $this->db->enableForeignKeyChecks();
	}

	public function down()
	{
		$this->forge->dropTable('user');
	}
}
