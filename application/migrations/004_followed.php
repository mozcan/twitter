<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_followed extends CI_Migration {

	public function up()
	{
		$this->dbforge->add_field(array(
				'id' => array(
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			'user_id' => array(
				'type' => 'INT',
				'constraint' => '11',
			),
			'followed_id' => array(
				'type' => 'INT',
				'constraint' => '11',
			),
		));
		
		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->add_key('user_id');
		$this->dbforge->add_key('followed_id');
		$this->dbforge->create_table('followed');
	}

	public function down()
	{
		$this->dbforge->drop_table('followed');
	}
}