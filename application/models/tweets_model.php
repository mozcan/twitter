<?php

class tweets_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();

		$this->load->database();
	}

	public function details($user_id)
	{
            $this->db->select('*');
            $query_tweets=$this->db->get_where('tweets',array('user_id' => $user_id));

            $tweets_counts=$query_tweets->num_rows();

            $this->db->select('*');
            $query_followers=$this->db->get_where('followers_followed',array('followed_id' => $user_id));

            $followers_count=$query_followers->num_rows();

            $this->db->select('*');
            $query_followed=$this->db->get_where('followers_followed',array('follow_up_id' => $user_id));

            $followed_count=$query_followed->num_rows();


            $data=array('tweets_counts' => $tweets_counts,'followers_count' => $followers_count,'followed_count' => $followed_count);

            return $data;
	}

	public function insert_new_tweet($new_tweet)
	{
		$data=array(
			'user_id' => $this->session->userdata('user_id'),
			'tweets' => $new_tweet['new_tweet']
			);

		if($this->db->insert('tweets',$data))
			return true;
		else
			return false;
	}

	public function tweets($user_id)
	{
		$arr=array();
		$t_id=array();
		$this->db->select('t.id,t.user_id');
		$this->db->from('tweets t');
		$this->db->join('followed f','f.followed_id=t.user_id and f.user_id='.$user_id.' or t.user_id='.$user_id.'');
		$this->db->order_by('t.id','desc');

		$this->db->distinct();
		$query=$this->db->get();

		if($query->num_rows()>0)
		{
			foreach($query->result() as $row)
			{
				$t_id[]=$row->id;
			}


			$this->db->select('t.tweets,ud.lastname,ud.username,t.id');
			$this->db->from('tweets t');
			$this->db->join('users_details ud'," t.user_id=ud.user_id");
			$this->db->where_in("t.id",$t_id);

			$this->db->order_by("t.id","desc");
			$tweet=$this->db->get();

			foreach($tweet->result() as $tweets)
			{
				array_push($arr,$tweets->tweets,$tweets->lastname,$tweets->username);
			}

			return $arr;
		}
	}
}

?>