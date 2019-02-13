<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller 
{ 
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
	}
	
	public function index()
	{
		$this->load->view('Search');
	}
	
	public function dosearch()
	{
        // Load Messages_model
		$this->load->model('Messages_model');
        
        // Retrieves search string from GET parameters
        $search_term = $this->input->get('search_term');

        // Run searchMessages()
		if($search_term != null) 
		{   

			$data['query'] = $this->Messages_model->searchMessages($search_term);

			// Display the output in the ViewMessages view
			$this->load->view('ViewMessages', $data);
		}
		else 
		{
			echo "No results"; 
			return;
		}
	}

}
