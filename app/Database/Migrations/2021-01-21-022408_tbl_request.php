<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DbInguanku extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'request_id' => [
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => true,
				'auto_increment' => true
			],
			'user_id' => [
				'type' => 'INT',
				'constraint' => '11'
			],
			'post_id' => [
				'type' => 'int',
				'constraint' => '11'
			],
			'status' => [
				'type' => 'ENUM',
				'constraint' => ['Pending', 'Accepted', 'Declined'],
				'default' => 'Pending'
			]
		]);
		$this->forge->addKey('request_id', true);
		$this->forge->createTable('tbl_request');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('tbl_request');
	}
}
