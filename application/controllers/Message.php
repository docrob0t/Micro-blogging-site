<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Message extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');		
		$this->load->helper('url');
		$this->load->helper('form');
	}
	
	public function index()
	{
		// Check if the user is logged in 
		if ($this->session->userdata('username')) 
		{
			// Displays the Post view
			$this->load->view('Post');
		} 
		else 
		{
			redirect(base_url().'index.php/user/login');
		}
	}

	public function doPost()
	{
		if ($this->session->userdata('username')) 
		{
			// Loads the Messages_model
			$this->load->model('Messages_model');
			$poster = $this->session->userdata('username');
			$string = $this->input->post('postText');
			
			$this->Messages_model->insertMessage($poster, $string);
			redirect('/user/view/'.$poster);
		} 
		else 
		{
			redirect(base_url().'index.php/user/login');
		}
	}
}
