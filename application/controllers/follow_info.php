<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Dashboard Controller
 */
class follow_info extends CI_Controller
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


	public function unfollow($followed_id,$user_id,$post_search)
	{
		if($this->input->post('search'))
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
		else
		{
			 $delete_data=array(
			 'user_id' => $user_id,
			 'followed_id' => $followed_id
			 );

			 $data=array(
					'search' => $post_search,
					'user_id' => $this->session->userdata('user_id')
				);

				
				$search=array(
				'username'	=> $this->session->userdata('username'),
				'lastname' 	=> $this->session->userdata('lastname'),
				'user_id'	=> $this->session->userdata('user_id'),
				'post_search' => $post_search,
				'delete' => $this->search_model->unfollow($delete_data),
				'search' =>	$this->search_model->search_model($data)
				);

				$this->load->view("search_view",$search);
	    }
    }


	public function follow($followed_id,$user_id,$post_search)
	{
		if($this->input->post('search'))
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
		else
		{
			$data=array(
				'user_id' => $user_id,
				'followed_id' => $followed_id
				);

			 $p_search=array(
					'search' => $post_search,
					'user_id' => $this->session->userdata('user_id')
				);

				
				$search=array(
				'username'	=> $this->session->userdata('username'),
				'lastname' 	=> $this->session->userdata('lastname'),
				'user_id'	=> $this->session->userdata('user_id'),
				'post_search' => $post_search,
				'data' => $this->search_model->follow($data),
				'search' =>	$this->search_model->search_model($p_search)
				);

				$this->load->view("search_view",$search);
		}
	}


	public function followed()
	{
		$this->load->model('followed_info_model');

		$data=array(
			'user_id' => $this->session->userdata("user_id")
		);

		$followed_list=array(
			'username' => $this->session->userdata('username'),
			'lastname' => $this->session->userdata('lastname'),
			'user_id' => $this->session->userdata("user_id"),
			'list' => $this->followed_info_model->followed_list($data)
		);

		$this->load->view("followed_view",$followed_list);

	}

/*
	public function followers()
	{

	}
	*/

}