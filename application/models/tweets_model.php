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

            $query_tweets=$this->db->query("
            select t.tweets,u.namesurname,u.photo,(SELECT DAY(t.added_datetime)) as day_number , 
            (SELECT CASE MONTHNAME(t.added_datetime) 
            WHEN 'January' THEN 'Ocak'
            WHEN 'February' THEN 'Şubat'
            WHEN 'March' THEN 'Mart'
            WHEN 'April' THEN 'Nisan'
            WHEN 'May' THEN 'Mayıs'
            WHEN 'June' THEN 'Haziran'
            WHEN 'July' THEN 'Temmuz'
            WHEN 'August' THEN 'Ağustos'
            WHEN 'September' THEN 'Eylül'
            WHEN 'October' THEN 'Ekim'
            WHEN 'November' THEN 'Kasım'
            WHEN 'December' THEN 'Aralık'
             END) as day_name
            from tweets t
            join users u ON t.user_id=u.id and t.user_id IN (".implode(',',$row).") 
            ORDER BY t.added_datetime DESC");
            
            return $query_tweets->result();
	}
        
        public function my_tweets($user_id)
        {
            $query_tweets=$this->db->query("
            select t.tweets,u.namesurname,u.photo,(SELECT DAY(t.added_datetime)) as day_number , 
            (SELECT CASE MONTHNAME(t.added_datetime) 
            WHEN 'January' THEN 'Ocak'
            WHEN 'February' THEN 'Şubat'
            WHEN 'March' THEN 'Mart'
            WHEN 'April' THEN 'Nisan'
            WHEN 'May' THEN 'Mayıs'
            WHEN 'June' THEN 'Haziran'
            WHEN 'July' THEN 'Temmuz'
            WHEN 'August' THEN 'Ağustos'
            WHEN 'September' THEN 'Eylül'
            WHEN 'October' THEN 'Ekim'
            WHEN 'November' THEN 'Kasım'
            WHEN 'December' THEN 'Aralık'
             END) as day_name
            from tweets t
            join users u ON t.user_id=u.id and t.user_id='".$user_id."' 
            ORDER BY t.added_datetime DESC");
            
            return $query_tweets->result();
        }
        
        public function get_photo($user_id)
        {
            $this->db->select('photo');
            $query=$this->db->get_where('users',array('id' => $user_id));
            $row=$query->result();
            
            return $row[0]->photo;
        }
}

?>