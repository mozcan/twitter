<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Dashboard Controller
 */
class Profil_cnt extends CI_Controller
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
                
                // load helper
		$this->load->helper(array('language', 'form'));
	}

	public function index()
	{
		$data=array(
			'username' => $this->session->userdata('username'),
			'tweets_details' => $this->tweets_model->details($this->session->userdata('user_id')),
			'tweets' => $this->tweets_model->my_tweets($this->session->userdata('user_id')),
                        'user_photo' => $this->tweets_model->get_photo($this->session->userdata('user_id'))
			);

		$this->load->view('user_tweets',$data);
	}


	public function new_tweet()
	{
		$data=array('new_tweet' => $this->input->post('new_tweet'));
                
		if($this->tweets_model->insert_new_tweet($data)):
                    redirect('home_cnt');
                endif;
	}

}
/* End of file dashboard.php */
/* Location: ./application/controllers/dashboard.php */