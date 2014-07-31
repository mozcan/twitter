<?php

  class Search_model extends CI_Model
  {
  
    function __construct()
	{
	
	  parent::__construct();
	  $this->load->database();
	}

	public function search_model($data)
	{
		$arr=array();
		$this->db->select("namesurname,id");
		$this->db->from("users");
		$this->db->where('id !=',$data['user_id']);
		$this->db->like("namesurname",$data['search'],'after');

		$query=$this->db->get();

		foreach($query->result() as $row)
		{
			$arr[]=$row;
			$arr[]=$this->_followedControl($row->id,$data['user_id']);
		}

		return $arr;

	}

	private function _followedControl($followed_id,$user_id)
	{
		$this->db->select("*");
		$this->db->from("followers_followed");
		$this->db->where("followed_id",$followed_id);
		$this->db->where("follow_up_id",$user_id);

		$query=$this->db->get();

		$control=$query->num_rows();

		if($control>0)
			return 1;
		else
			return 0;
	}

	public function follow($data)
	{
		$insert_followed=array(
		'user_id' => $data['user_id'],
		'followed_id' => $data['followed_id']
		);

		$insert_followers=array(
		'user_id' => $data['followed_id'],
		'followers_id' => $data['user_id']
		);

		$this->db->insert("followed",$insert_followed);

		$this->db->insert("followers",$insert_followers);
	}

	public function unfollow($data)
	{
		$this->db->delete("followed",array("user_id" => $data['user_id'],"followed_id" => $data['followed_id']));
		$this->db->delete("followers",array("user_id" => $data['followed_id'],"followers_id" => $data['user_id']));
	}
}

?>