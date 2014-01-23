<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_messages extends CI_Migration {

	public function up()
	{
		$this->dbforge->add_field(array(
				'id' => array(
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			'from_id' => array(
				'type' => 'INT',
				'constraint' => '11',
			),
			'to_id' => array(
				'type' => 'INT',
				'constraint' => '11',
			),
			'message' => array(
				'type' => 'text',
				'constraint' => '0'
			),
		));
		
		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table('messages');
	}

	public function down()
	{
		$this->dbforge->drop_table('messages');
	}
}