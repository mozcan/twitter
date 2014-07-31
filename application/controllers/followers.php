<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Followers extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('auth');

		if (! $this->auth->is_logged()) {
			redirect('login');
		}

		$this->load->model('follow_info_model');
        $this->load->model('tweets_model');
		$this->load->library('form_validation');

	}
        
	public function index()
	{
		$data=array(
                    'username' => $this->session->userdata('username'),
                    'user_id' => $this->session->userdata("user_id"),
                    'list' => $this->follow_info_model->followers_list($this->session->userdata("user_id")),
                    'tweets_details' => $this->tweets_model->details($this->session->userdata('user_id')),
                    'tweets' => $this->tweets_model->tweets($this->session->userdata('user_id')),
                    'user_photo' => $this->tweets_model->get_photo($this->session->userdata('user_id'))
		);

		$this->load->view("followers_view",$data);

	}
}