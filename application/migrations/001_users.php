<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_users extends CI_Migration {

	public function up()
	{
		$this->dbforge->add_field(array(
			'id' => array(
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE,
				'auto_increment' => TRUE,
				'null' => FALSE
			),
			'user_mail' => array(
				'type' => 'VARCHAR',
				'constraint' => 100
			),
			'password' => array(
				'type' => 'VARCHAR',
				'constraint' => 120
			),
			'namesurname' => array(
				'type' => 'VARCHAR',
				'constraint' => 120
			),
			'city' => array(
				'type' => 'VARCHAR',
				'constraint' => 50
			),
			'photo' => array(
				'type' => 'VARCHAR',
				'constraint' => 255
			),
			'added_datetime' => array(
				'type' => 'DATETIME',
				'null' => TRUE
			),
			'update_datetime' => array(
				'type' => 'DATETIME',
				'null' => TRUE
			),
			'delete_datetime' => array(
				'type' => 'DATETIME',
				'null' => TRUE
			),
		));

		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table('users');
	}

	public function down()
	{
		$this->dbforge->drop_table('users');
	}
}