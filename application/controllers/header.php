<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Dashboard Controller
 */
class header extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('auth');
		//$this->load->model("sign_model");

		if (! $this->auth->is_logged()) {
			redirect('login_cnt');
		}

		//load language
		/*
		$this->lang->load('dashboard');
		$this->lang->load('dashboard_nav');

		$this->load->helper('language');
		*/
	}

	public function index()
	{

		$this->load->view('header_view', array('username' => $this->session->userdata('username'),'user_id' => $this->session->userdata('user_id')));
	}

	public function logout()
	{
		$this->auth->logout();

		redirect("login_cnt");
	}


	public function home()
	{
		$data = array(
			'username'	=> $this->session->userdata('username'),
			'lastname' 	=> $this->session->userdata('lastname'),
			'user_id'	=> $this->session->userdata('id'),
		);

		$this->load->view("user_tweets",$data);
	}

	
}
/* End of file dashboard.php */
/* Location: ./application/controllers/dashboard.php */