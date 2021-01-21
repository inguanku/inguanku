<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DbInguanku extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'trans_id' => [
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => true,
				'auto_increment' => true
			],
			'request_id' => [
				'type' => 'INT',
				'constraint' => '11'
			],
			'date' => [
				'type' => 'DATETIME'
			],
			'status' => [
				'type' => 'ENUM',
				'constraint' => ['Process', 'Success', 'Failed'],
				'default' => 'Process'
			]
		]);
		$this->forge->addKey('trans_id', true);
		$this->forge->createTable('tbl_transaction');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('tbl_transaction');
	}
}
