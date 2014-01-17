<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Dashboard Controller
 */
class profil_cnt extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('auth');

		if (! $this->auth->is_logged()) {
			redirect('login_cnt');
		}

		$this->load->model('profil_model');
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
		$data=array(
			'user_id' => $this->session->userdata("user_id")
			);

		$tweets=array(
		"username" => $this->session->userdata("username"),
		"lastname" => $this->session->userdata("lastname"),
		'my_tweets' => $this->profil_model->getMyTweets($data)
		);

		$this->load->view("profil_view",$tweets);
	}


}
/* End of file dashboard.php */
/* Location: ./application/controllers/dashboard.php */