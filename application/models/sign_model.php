<?php

 class sign_model extends CI_Model
 {
   
    public function __construct()
	{
	   parent::__construct();
	}
	
	public function sign_up($data)
	{
	   $this->db->insert("users",$data);

	   return true;
	}
	
	public function sign_in($arr)
	{
	  $this->db->select("*")->from("users");
	  $this->db->where("user_mail",$arr[0]);
	  $this->db->where("password",$arr[1]);
	  $result=$this->db->get();
	  
	  return $result->result();
	}
    
	public function tweets($session_id)
	{
	   $this->db->select("tweets")->from("tweets")->where("user_id",$session_id);
	   $result=$this->db->get();
	   
	   return $result->result();
	}
	
	public function followers($session_id)
	{
	   $this->db->select("followers_id")->from("followers")->where("user_id",$session_id);
	   $result=$this->db->get();
	   
	   return $result->result();
	}
	
	public function followed($session_id)
	{
	   $this->db->select("followed_id")->from("followed")->where("user_id",$session_id);
	   $result=$this->db->get();
	   
	   return $result->result();
	}
 }

?>