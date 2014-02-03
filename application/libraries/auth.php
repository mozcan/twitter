<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

class Auth
{
    private $CI;
    private $data;
	public function __construct()
	{
        $this->CI =& get_instance();
        log_message('debug', 'Authorization class initialized.');
        
        $this->CI->load->database();	
        
        	
	}

    public function try_login($condition = array()) 
    {
        $this->CI->db->select('id,namesurname');
        $query = $this->CI->db->get_where('users', $condition, 1, 0);
        if ($query->num_rows() != 1) {
            return FALSE;
        } else {
            $row = $query->row();
            $this->CI->session->set_userdata(array('user_id'=>$row->id, 'username' => $row->namesurname));            
            return TRUE;
        }
    }
    
    public function is_logged()
    {
          $this->data = $this->get_user($this->CI->session->userdata('user_id')); 
          if ($this->data === FALSE) {
            return false;
          } else {
            return true;
          }
    }
    /**
    * Log Out
    * unset session
    */
    public function logout() {
        $this->CI->session->set_userdata(array('user_id'=>FALSE));
    }
    
    /** 
    * Get a row for spesific user 
    *
    * @usage $this->auth->get_user($this->session->userdata('user_id'))->username  
    * @param integer $id
    * @return boolean
    */
    public function get_user($id) {
        if ($id) {
            $this->CI->db->select('id');
            $query = $this->CI->db->get_where('users', array('id'=>$id), 1, 0);
            if ($query->num_rows() == 1) {
                return $query->row();
            } else {
                return FALSE;
            }
        } else {
            return FALSE;
        }
    }

}
/* End of file auth.php */
/* Location: ./application/library/auth.php */