<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class message_cnt extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		$this->load->library('auth');

		if (! $this->auth->is_logged()) {
			redirect('login_cnt');
		}

		$this->load->model("message_model");
		$this->load->library("form_validation");
	}


	public function new_message()
	{
		$data=array(
			'user_id'  => $this->session->userdata("user_id")
		);

		$list=array(
			'username' => $this->session->userdata("username"),
			'lastname' => $this->session->userdata("lastname"),
			'list'  => $this->message_model->getList($data)
		);

		$this->load->view("new_message_view",$list);
	}

}

?>