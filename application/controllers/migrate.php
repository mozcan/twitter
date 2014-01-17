<?php

class migrate extends CI_Controller
{

  function __construct()
  {
      parent::__construct();
	  $this->load->library('migration');
  }
  
  function index()
  {
	$this->migration->version(4);
  }
}