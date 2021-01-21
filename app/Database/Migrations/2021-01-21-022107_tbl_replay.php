<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DbInguanku extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'replay_id' => [
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => true,
				'auto_increment' => true
			],
			'discuss_id' => [
				'type' => 'INT',
				'constraint' => '11'
			],
			'user_id' => [
				'type' => 'int',
				'constraint' => '11'
			],
			'content' => [
				'type' => 'VARCHAR',
				'constraint' => '255'
			]
		]);
		$this->forge->addKey('replay_id', true);
		$this->forge->createTable('tbl_replay');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('tbl_replay');
	}
}
