<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('session');
	}
	
	/* 
	// Practical 2
	public function show($id = null, $name = null)
	{
		if($id == null)
			echo "Show ID not specified";
		else if($name == null)
			echo "Show Name not specified";
		else
			echo "You asked for show $id, $name";
		
		$this->load->model('User_model');
		$data = $this->User_model->getUsers();
		
		$this->load->view('view_user', $data);
	}
	
	// Practical Week 3
	public function view($id = null)
	{
		$this->load->model('User_model');
		
		if($id == null) $data = $this->User_model->getMessages();
		else $data = $this->User_model->getMessages($id);
		
		if(count($data) == 0) {echo "No rows found"; return;}
		
		$viewData = array("results" => $data);
		$this->load->view('view_user', $viewData); 
	}
	*/
	
	public function view($name = null)
	{
		$this->load->model('Users_model');
		$username = $this->session->userdata('username');	
		$data['isFollowing'] =  $this->Users_model->isFollowing($username, $name);
		$data['view']        = TRUE;
		$data['name']        = $name;

		// Load Messages_model
		$this->load->model('Messages_model');
		
		// Run getMessagesByPoster() passing the specified name
		if($name == null)
		{
			echo "Please specify the name of the person";
			return;
		}
		else 
		{
			$data['query'] = $this->Messages_model->getMessagesByPoster($name);
		}

		if(count($data) == 0) 
		{
			echo "This person doesn't exist!"; 
			return;
		}
		
		// Display the output in the ViewMessages view
		$this->load->view('ViewMessages', $data); 
	}

	public function login()
	{
		// Display the Login view
		$data['title'] = 'Login Page for Micro-blogging Site';
		$this->load->view('Login', $data); 
	}

	public function doLogin()
	{
		// Load Users_model
		$this->load->model('Users_model');

		$this->load->library('form_validation');
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		// Check if the form textbox have some value or not
		if($this->form_validation->run() == FALSE)
		{
			// Re-displays Login view with error message if login is unsuccessful.
			$this->load->view('Login');
		} 
		else
		{
			// Retrieves username and password from POST parameters
			$username = $this->input->post('username');
			$password = $this->input->post('password');

			// Calls checkLogin() passing POSTed user/pass
			$this->load->model('Users_model');

			// Check if login is successful
			if($this->Users_model->checkLogin($username, $password))
			{
				// Set a session variable containing the username
				$session_data = array(
					'username' => $username
				);
				$this->session->set_userdata($session_data);

				// Redirects to the user/view/{username} controller to view their messages.
				redirect(base_url().'index.php/user/view/'.$username);
			}
			else
			{
				$this->session->set_flashdata('error', 'Wrong username and password');
				redirect(base_url().'index.php/user/login');		
			}
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('username');
		redirect(base_url().'index.php/user/login');
	}

	public function follow($followed)
	{
		$follower = $this->input->post("follower");
		$followed = $this->input->post("followed");
		
		$this->load->model('Users_model');
		
		$this->Users_model->follow($follower, $followed);
		redirect(base_url().'index.php/user/view/'.$followed);		
	}

	public function feed($name)
	{
		$this->load->model('Messages_model');
		$data['query'] = $this->Messages_model->getFollowedMessages($name);
		$this->load->view('ViewMessages', $data); 
	}

}
