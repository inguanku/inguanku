<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DbInguanku extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'post_id' => [
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => true,
				'auto_increment' => true
			],
			'user_id' => [
				'type' => 'INT',
				'constraint' => '11'
			],
			'pet_name' => [
				'type' => 'VARCHAR',
				'constraint' => '50'
			],
			'date' => [
				'type' => 'DATETIME',
				'null' => true
			],
			'description' => [
				'type' => 'TEXT'
			],
			'sex' => [
				'type' => 'ENUM',
				'constraint' => ['Male', 'Female']
			],
			'category' => [
				'type' => 'ENUM',
				'constraint' => ['Adopt', 'Breed']
			],
			'status' => [
				'type' => 'ENUM',
				'constraint' => ['Available', 'Unavailable'],
				'default' => 'Available'
			],
			'type' => [
				'type' => 'ENUM',
				'constraint' => ['Cat', 'Dog']
			],
			'breed' => [
				'type' => 'VARCHAR',
				'constraint' => '50'
			]
		]);
		$this->forge->addKey('post_id', true);
		$this->forge->createTable('tbl_post');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('tbl_post');
	}
}
