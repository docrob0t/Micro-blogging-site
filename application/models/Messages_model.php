<?php
class Messages_model extends CI_Model 
{
	public function __construct() 
	{ 
		parent::__construct();
		$this->load->database(); 
	}
	
	public function getMessagesByPoster($name)
	{
		$sql = 'SELECT user_username, text, posted_at 
				FROM Messages
                WHERE user_username = ?
                ORDER BY posted_at DESC';
        $query = $this->db->query($sql, array($name));
		return $query->result_array(); 
	}
	
	public function searchMessages($search_term)
	{
		
		$sql = 'SELECT user_username, text, posted_at 
				FROM Messages
				WHERE text
				LIKE "%"?"%"
				ORDER BY posted_at DESC';
		$query = $this->db->query($sql, array($search_term));
		return $query->result_array(); 
	}
	
    public function insertMessage($poster, $string)
	{
		$sql = 'INSERT INTO Messages (user_username, text, posted_at)
				VALUES (?, ?, NOW())';
		$query = $this->db->query($sql, array($poster, $string));
	}

	public function getFollowedMessages($name)
	{
		$sql = 'SELECT user_username, text, posted_at 
				FROM Messages, User_Follows
				WHERE user_username = followed_username
				AND follower_username = ?
				ORDER BY posted_at DESC';
		$query = $this->db->query($sql, array($name));
		return $query->result_array(); 
	}
}
