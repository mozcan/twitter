<?php

	class profil_model extends CI_Model
	{
		function __construct()
		{
			parent::__construct();
			$this->load->database();
		}

		public function getMyTweets($data)
		{
			$arr=array();
			$this->db->select("id,tweets");
			$this->db->from("tweets");
			$this->db->where("user_id",$data['user_id']);
			$this->db->order_by("id","desc");
			$query=$this->db->get();

			foreach($query->result() as $row)
       	    {
       	    	$arr[]=$row;
       	    }


			$this->db->select('*');
	        $query_tweets=$this->db->get_where('tweets',array('user_id' => $data['user_id']));

	        $tweets_counts=$query_tweets->num_rows();

	        $this->db->select('*');
	        $query_followers=$this->db->get_where('followers',array('user_id' => $data['user_id']));

	        $followers_count=$query_followers->num_rows();

	        $this->db->select('*');
	        $query_followed=$this->db->get_where('followed',array('user_id' => $data['user_id']));

	        $followed_count=$query_followed->num_rows();


       	    $data=array('tweets_counts' => $tweets_counts,'followers_count' => $followers_count,'followed_count' => $followed_count,"my_tweets" => $arr);

			return $data;
		}
	}

?>