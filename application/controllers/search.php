<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Dashboard Controller
 */
class search extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('auth');

		if (! $this->auth->is_logged()) {
			redirect('login_cnt');
		}

		$this->load->model('search_model');
		$this->load->library('form_validation');

	}

	public function index()
	{
		if($this->input->post())
		{
			$data=array(
				'search' => $this->input->post('search'),
				'user_id' => $this->session->userdata('user_id')
			);

			$search=array(
			'username'	=> $this->session->userdata('username'),
			'lastname' 	=> $this->session->userdata('lastname'),
			'user_id'	=> $this->session->userdata('user_id'),
			'post_search' => $this->input->post('search'),
			'search' =>	$this->search_model->search_model($data)
			);


			$this->load->view("search_view",$search);
		}
	}

	

}
