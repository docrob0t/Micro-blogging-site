<?php
class Users_model extends CI_Model 
{
	public function __construct() 
	{ 
		$this->load->database(); 
	}
	
	// Returns TRUE if a user exists in the database with the specified username and password, and FALSE if not.
	public function checkLogin($username, $password)
	{
		/*
		$this->db->where('username', $username);
		$this->db->where('password', sha1($password));
		$query = $this->db->get('Users');
		*/

		$sql = 'SELECT * FROM Users 
	            WHERE username = ? AND password = ?';
		$query = $this->db->query($sql, array($username, sha1($password)));

		if($query->num_rows() > 0)
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
	
	// Returns TRUE if $follower is following $followed, FALSE otherwise
	public function isFollowing($follower, $followed)
	{
		$sql = 'SELECT * FROM User_Follows
				WHERE follower_username = ? AND followed_username =?';
		$query = $this->db->query($sql, array($follower, $followed));
		
		if ($query->num_rows() == 1) 
		{
			return TRUE;
		} 
		else 
		{
			return FALSE;
		}
	}

	public function follow($follower, $followed)
	{
		$sql = 'SELECT * FROM User_Follows
				WHERE follower_username = ? AND followed_username =?';
		$query = $this->db->query($sql, array($follower, $followed));
		
		if ($query->num_rows() == 0) 
		{
			$sql = 'INSERT INTO User_Follows
					VALUES (?, ?)';
			$query = $this->db->query($sql, array($follower, $followed));
		} 
	}
}