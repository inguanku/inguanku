<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DbInguanku extends Migration
{
	public function up()
	{
		/*
		* START:User Table
		*/
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
				'constraint' => '255',
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
			'city' => [
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
		/*
		* END:User Table
		*/

		/*
		* START:Post Table
		*/
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
			],
			'picture_id' => [
				'type' => 'INT',
				'constaint' => '11'
			]

		]);
		$this->forge->addKey('post_id', true);
		$this->forge->createTable('tbl_post');
		/*
		* END:Post Table
		*/

		/*
		* START:Picture Table
		*/
		$this->forge->addField([
			'picture_id' => [
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => true,
				'auto_increment' => true,
			],
			'post_id' => [
				'type' => 'INT',
				'constraint' => '11',
			],
			'file_name' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
			]
		]);
		$this->forge->addKey('picture_id', true);
		$this->forge->createTable('tbl_picture');
		/*
		* END:Picture Table
		*/
		/*
		* START:Disscuss Table
		*/
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
		/*
		* END:Disscuss Table
		*/

		/*
		* START:Reply Table
		*/
		$this->forge->addField([
			'reply_id' => [
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
		$this->forge->addKey('reply_id', true);
		$this->forge->createTable('tbl_reply');
		/*
		* END:Reply Table
		*/

		/*
		* START:Request Table
		*/
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
		/*
		* END:Request Table
		*/

		/*
		* START:Transaction Table
		*/
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
		/*
		* END:Transaction Table
		*/
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('tbl_user');
		$this->forge->dropTable('tbl_post');
		$this->forge->dropTable('tbl_picture');
		$this->forge->dropTable('tbl_discuss');
		$this->forge->dropTable('tbl_reply');
		$this->forge->dropTable('tbl_request');
		$this->forge->dropTable('tbl_transaction');
	}
}
