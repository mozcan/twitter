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
            $this->db->select('id');
            $query_tweets=$this->db->get_where('tweets',array('user_id' => $user_id));

            $tweets_counts=$query_tweets->num_rows();

            $this->db->select('id');
            $query_followers=$this->db->get_where('followers_followed',array('followed_id' => $user_id));

            $followers_count=$query_followers->num_rows();

            $this->db->select('id');
            $query_followed=$this->db->get_where('followers_followed',array('follow_up_id' => $user_id));

            $followed_count=$query_followed->num_rows();


            $data=array('tweets_counts' => $tweets_counts,'followers_count' => $followers_count,'followed_count' => $followed_count);

            return $data;
	}

	public function insert_new_tweet($new_tweet)
	{
		$data=array(
			'user_id' => $this->session->userdata('user_id'),
			'tweets' => $new_tweet['new_tweet'],
                        'added_datetime' => date('Y-m-d H:i:s')
			);

		if($this->db->insert('tweets',$data))
			return true;
		else
			return false;
	}

	public function tweets($user_id)
	{
            $row=array();
            
            $this->db->select('followed_id');
            $query=$this->db->get_where('followers_followed',array('follow_up_id' => $user_id));
            
            $row[]=$user_id;
            foreach($query->result() as $values)
            {
                $row[]=$values->followed_id;
            }
            
            
            $this->db->select('t.tweets,u.namesurname,u.photo,t.added_datetime');
            $this->db->from('tweets t');
            $this->db->join('users u','u.id=t.user_id');
            $this->db->where_in('t.user_id',$row);
            $this->db->order_by('t.added_datetime','asc');
            $query_tweets=$this->db->get();
            
            return $query_tweets->result();
	}
}

?>