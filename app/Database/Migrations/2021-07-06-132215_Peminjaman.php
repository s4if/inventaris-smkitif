<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Peminjaman extends Migration
{
	public function up()
	{
		$this->db->disableForeignKeyChecks();
		
		$this->forge->addField('id');

		$this->forge->addField([
            'waktu_pinjam'       => [
                'type'       => 'DATETIME',
                'null'       => false,
            ],
            'waktu_kembali'       => [
                'type'       => 'DATETIME',
                'null'       => true,
            ],
            'status_pinjam'      => [
                'type'       => 'ENUM',
                'constraint' => ['selesai', 'masih dipinjam', 'hilang'],
                'default'    => 'masih dipinjam',
        	],
            'catatan'       => [
                'type'       => 'TEXT',
                'null'       => true,
            ],
            'nis_siswa'      => [
            	'type'       => 'INT',
                'constraint' => 9,
            ],
            'pengawas'       => [
                'type'       => 'VARCHAR',
                'constraint' => 25,
            ],
            'kode_barang'      => [
            	'type'       => 'VARCHAR',
                'constraint' => 60,
            ],
        ]);

        $this->forge->addForeignKey('nis_siswa','siswa','nis','NULL','CASCADE');
        $this->forge->addForeignKey('pengawas','user','username','NULL','CASCADE');
        $this->forge->addForeignKey('kode_barang','barang','kode','NULL','CASCADE');

        $this->forge->createTable('peminjaman');

        $this->db->enableForeignKeyChecks();
	}

	public function down()
	{
		$this->forge->dropTable('peminjaman');
	}
}
