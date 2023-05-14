<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUserDataTable extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id' => [
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => true,
				'auto_increment' => true,
			],
			'name' => [
				'type' => 'VARCHAR',
				'constraint' => '100',
			],
			'address' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
			],
			'file' => [
				'type' => 'VARCHAR',
				'constraint' => '100',
			],
			'position' => [
				'type' => 'VARCHAR',
				'constraint' => '100',
			],
			'created_at' => [
				'type' => 'DATETIME',
				'null' => true,
			],
			'updated_at' => [
				'type' => 'DATETIME',
				'null' => true,
			]
		]);
		$this->forge->addPrimaryKey('id');
		$this->forge->createTable('userdata');
	}

	public function down()
	{
		$this->forge->dropTable('userdata');
	}
}