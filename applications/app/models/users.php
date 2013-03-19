<?php defined('SYSPATH') or die('No direct script access.');
/**
 * CMS model for public site
 *
 * $Id: Cms.php 2009-03-06 02:35:38Z joshshea $
 *
 */
class Users_Model extends Model {

	public function __construct()
	{
		parent::__construct();
		
		$this->db = new Database();

	}


/******	GET USERS	*****/	
	public function get_users($username = "")
	{
	
		if ($username == "") {
			$sql = "SELECT * FROM users order by first_name";
		}
		else {
			$sql = "SELECT * FROM users WHERE email_address = " . $this->db->escape($username);
			
		}
		return $this->db->query($sql)->result_array();
	}

	// UPDATE USER ACCOUNT
	public function update_account($first_name, $last_name, $username, $password, $privilege, $uid)
	{
	
		$first_name 			= $this->db->escape($first_name);
		$last_name 				= $this->db->escape($last_name);
		$email 					= $username;
		$username 				= $this->db->escape($username);
		$privilege 				= $this->db->escape($privilege);
		$uid 				= $this->db->escape($uid);
		
		$sql = "UPDATE users SET first_name = $first_name, last_name = $last_name, email_address = $username, privilege = privilege WHERE uid = $uid";
		return $this->db->query($sql);

	}
	
		// UPDATE USER ACCOUNT
	public function remove_account($uid)
	{

		$uid = $this->db->escape($uid);
		$sql = "DELETE FROM users WHERE uid = $uid";
		return $this->db->query($sql);

	}



}