<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Barang extends Migration
{
	public function up()
	{
		$this->db->disableForeignKeyChecks();

		$this->forge->addField([
            'kode'       => [
                'type'       => 'VARCHAR',
                'constraint' => 60,
                'null'       => false,
            ],
            'nama'       => [
                'type'       => 'VARCHAR',
                'constraint' => 60,
                'null'       => false,
            ],
            'kondisi'      => [
                'type'       => 'ENUM',
                'constraint' => ['baik', 'rusak', 'dalam perbaikan', 'rusak ringan'],
                'default'    => 'baik',
        	],
        	'kategori'          => [
                'type'       => 'VARCHAR',
                'constraint' => 60,
                'null'       => false,
        	],
            'tempat_penyimpanan'       => [
                'type'       => 'TEXT',
                'null'       => true,
            ],
        ]);
        
        $this->forge->addPrimaryKey('kode');

        $this->forge->createTable('barang');
        
        $this->db->enableForeignKeyChecks();
	}

	public function down()
	{
        $this->forge->dropTable('barang');
	}
}
