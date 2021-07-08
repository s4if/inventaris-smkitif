<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Siswa extends Migration
{
	public function up()
	{
		$this->db->disableForeignKeyChecks();

		$this->forge->addField([
            'nis'       => [
                'type'       => 'INT',
                'constraint' => 9,
            ],
            'nama'       => [
                'type'       => 'VARCHAR',
                'constraint' => 45,
                'null'       => false,
            ],
            'kelas'          => [
                'type'       => 'VARCHAR',
                'constraint' => 60,
                'null'       => false,
            ],
        ]);


        $this->forge->addPrimaryKey('nis');

        $this->forge->createTable('siswa');
        
        $this->db->enableForeignKeyChecks();
	}

	public function down()
	{
		$this->forge->dropTable('siswa');
	}
}
