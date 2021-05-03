<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Persons extends Migration
{
	public function up()
	{
		//
		$this->forge->addField([
			'id'          => [
					'type'           => 'INT',
					'constraint'     => 5,
					'unsigned'       => true,
					'auto_increment' => true,
			],
			'name'       => [
					'type'       => 'VARCHAR',
					'constraint' => '100',
					'null' => false,
			],
			'last_name'       => [
				'type'       => 'VARCHAR',
				'constraint' => '100',
				'null' => false,
			],
			'dni'       => [
				'type'       => 'INT',
				'constraint' => '15',
				'null' => false,
			],
			'created_at' => [
					'type' => 'DATETIME',
					'null' => true,
			],
			'updated_at' => [
				'type' => 'DATETIME',
				'null' => true,
			],
			'deleted_at' => [
				'type' => 'DATETIME',
				'null' => true,
			],
	]);
	$this->forge->addKey('id', true);
	$this->forge->createTable('person');
	}

	public function down()
	{
		//
		$this->forge->dropTable('person');
	}
}
