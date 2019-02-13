<?php
class User_model extends CI_Model 
{
	public function __construct() 
	{ 
		$this->load->database(); 
	}
	
	public function getUsers()
	{
		$user['id'] = 1234;
		$user['name'] = "John";
		
		return $user;
	}
	
	public function getMessages($id)
	{
		$sql = 'SELECT id, text FROM Messages WHERE id = ?';
        $query = $this->db->query($sql, array($id));
		return $query->result_array(); 
	}
}