<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_tweets extends CI_Migration {

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
			'tweets' => array(
				'type' => 'VARCHAR',
				'constraint' => '140',
			),
		));
		
		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->add_key('user_id');
		$this->dbforge->create_table('tweets');
	}

	public function down()
	{
		$this->dbforge->drop_table('tweets');
	}
}