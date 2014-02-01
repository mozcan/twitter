<?php

class follow_info_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();

		$this->load->database();
	}


	public function following_list($user_id)
	{
            $this->db->select('u.namesurname,u.photo,u.id');
            $this->db->from('users u');
            $this->db->join('followers_followed ff','ff.followed_id=u.id and ff.follow_up_id="'.$user_id.'"');
            $query=$this->db->get();
            
            return $query->result();
	}
        
        public function followers_list($user_id)
        {
            $this->db->select('u.namesurname,u.photo,u.id');
            $this->db->from('users u');
            $this->db->join('followers_followed ff','ff.follow_up_id=u.id and ff.followed_id="'.$user_id.'"');
            $query=$this->db->get();
            
            return $query->result();
        }

}

?>