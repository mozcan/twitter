<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Dashboard Controller
 */
class home_cnt extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('auth');

		if (! $this->auth->is_logged()) {
			redirect('login_cnt');
		}

		$this->load->model('tweets_model');
		$this->load->library('form_validation');

		//load language
		/*
		$this->lang->load('dashboard');
		$this->lang->load('dashboard_nav');

		$this->load->helper('language');
		*/
	}

	public function index()
	{
		$user_id=array(
			'user_id' => $this->session->userdata('user_id')

			);

		$data=array(
			'username' => $this->session->userdata('username'),
			'lastname' => $this->session->userdata('lastname'),
			'tweets_details' => $this->tweets_model->details($user_id),
			'tweets' => $this->tweets_model->tweets($user_id)
			);

		$this->load->view('user_tweets',$data);
	}


	public function new_tweet()
	{
		/*
		if($this->input->post('new_tweet')==null)
		{

		}
		*/

		$data=array('new_tweet' => $this->input->post('new_tweet'));
		if($this->tweets_model->insert_new_tweet($data))
			redirect('home_cnt');
	}

}
/* End of file dashboard.php */
/* Location: ./application/controllers/dashboard.php */