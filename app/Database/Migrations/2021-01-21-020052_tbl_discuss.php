<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DbInguanku extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'discuss_id' => [
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => true,
				'auto_increment' => true,
			],
			'post_id' => [
				'type' => 'INT',
				'constraint' => '11',
			],
			'user_id' => [
				'type' => 'int',
				'constraint' => '11',
			],
			'content' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
			]
		]);
		$this->forge->addKey('discuss_id', true);
		$this->forge->createTable('tbl_discuss');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('tbl_discuss');
	}
}
