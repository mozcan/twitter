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
            $arr=array();

            $this->db->select('u.namesurname,u.photo,u.id');
            $this->db->from('users u');
            $this->db->join('followers_followed ff','ff.follow_up_id=u.id and ff.followed_id="'.$user_id.'"');
            $query=$this->db->get();
            
            $row=$query->result();

            foreach($query->result() as $row):
                
                $row->info=$this->_follow_info($row->id,$user_id);
                $arr[]=$row;
            endforeach;

            return $arr;

        }

        private function _follow_info($row_id,$user_id)
        {
            $arr=array();

            $this->db->select('u.namesurname,u.id');
            $this->db->from('users u');
            $this->db->join('followers_followed ff','ff.follow_up_id=rtrim("'.$user_id.'") and ff.followed_id="'.$row_id.'"');
            $query=$this->db->get();

            if(!empty($query->result())):
                foreach($query->result() as $row):
                    if($row->id===''):
                        $str=0;
                    else:
                        $str=1;
                    endif;

                endforeach;
            else:
                $str=0;
            endif;

            return $str;
        }
}

?>