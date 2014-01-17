<?php

class message_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();

		$this->load->database();
	}


	public function getList($data)
	{
		$this->db->select("ud.user_id,ud.username,ud.lastname");
		$this->db->from("users_details ud");
		$this->db->join("followed f","ud.user_id=f.followed_id and f.user_id=".$data['user_id']);

		$query=$this->db->get();

		return $query->result();

	}

}

?>