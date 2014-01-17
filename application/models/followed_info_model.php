<?php

class followed_info_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();

		$this->load->database();
	}


	public function followed_list($data)
	{
		$this->db->select("ud.username,ud.lastname");
		$this->db->from("followed f");
		$this->db->join("users_details ud","ud.user_id=f.followed_id and f.user_id=".$data['user_id']);

		$query=$this->db->get();

		return $query->result();
	}

}

?>