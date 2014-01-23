<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_followers_followed extends CI_Migration {

	public function up()
	{
		$this->dbforge->add_field(array(
				'id' => array(
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			'follow_up_id' => array(
				'type' => 'INT',
				'constraint' => '11',
			),
			'followed_id' => array(
				'type' => 'INT',
				'constraint' => '11',
			),
			'date_time' => array(
				'type' => 'DATETIME',
				'null' => TRUE
			),
		));
		
		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table('followers_followed');
	}

	public function down()
	{
		$this->dbforge->drop_table('followers_followed');
	}
}
