<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DbInguanku extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'user_id' => [
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => true,
				'auto_increment' => true,
			],
			'name' => [
				'type' => 'VARCHAR',
				'constraint' => '50',
			],
			'email' => [
				'type' => 'VARCHAR',
				'constraint' => '50',
			],
			'passwd' => [
				'type' => 'VARCHAR',
				'constraint' => '50',
			],
			'phone' => [
				'type' => 'VARCHAR',
				'constraint' => '15',
				'null' => true
			],
			'address' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
				'null' => true
			],
			'avatar' => [
				'type' => 'VARCHAR',
				'constraint' => '255'
			]
		]);
		$this->forge->addKey('user_id', true);
		$this->forge->createTable('tbl_user');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('tbl_user');
	}
}
