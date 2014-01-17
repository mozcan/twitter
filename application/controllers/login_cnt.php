<?php

class login_cnt extends CI_Controller
{
   
   public function __construct()
   {
      parent::__construct();
	  $this->load->database();
	  
	  // Load Model
	  $this->load->model("sign_model");

	  // Load Helper
	  $this->load->helper('url');
	  $this->load->helper(array('language', 'form'));

	  // Load Library
	  $this->load->library('session');
	  $this->load->library('form_validation');
	  $this->load->library("auth");

	  // Load Lang
	  $this->lang->load('users');
   }
   
   public function index()
   {
      $this->load->view("login_view");
   }
   
   public function check()
   {
   	   $data=array(
        'user_mail' => $this->input->post("mail"),
        'password'  => md5($this->input->post("pass"))
   	   	);
	   
	   if($this->auth->try_login($data))
	   {
	   	  redirect("header");
	   }
	   else
	   {
	   	 $this->session->set_flashdata('err_message', "Mail or Password is incorrect. Please confirm your mail and password.");
		redirect("login_cnt","refresh");
	   }

 		//$this->load->view("user_tweets",$value);
   }
   
   public function sign_up()  
   {  
   	  $this->form_validation->set_rules('mail', 'Username', 'required');
	  $this->form_validation->set_rules('pass', 'Password', 'required');
	  
	  if ($this->form_validation->run() == TRUE)
		{
			$data=array(
			  'user_mail' => $this->input->post('mail'),
			  'password' => md5($this->input->post('pass')),
			  'namesurname' => $this->input->post('namesurname'),
			  'added_datetime' => date('Y-m-d H:i:s')
			);

			if($this->sign_model->sign_up($data))
			{
				$this->session->set_flashdata('succ_message', "Sign Up Has been Successfully.");
				 redirect('login_cnt');
			}
			  
		}
		else
		{
			die("Giris Yasak");
		}
   }
   
}