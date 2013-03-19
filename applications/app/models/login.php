<?php defined('SYSPATH') or die('No direct script access.');
/**
 * CMS model for public site
 *
 * $Id: Cms.php 2009-03-06 02:35:38Z joshshea $
 *
 */
class Login_Model extends Model {

	public function __construct()
	{
		parent::__construct();
		
		$this->db = new Database();
				
	}


/******	CHECK LOGIN	*****/	

	public function login($username, $password)
	{
		$login = $this->db->query("SELECT * FROM users where email_address = " . $this->db->escape($username) . " and password = '$password'")->current();
    	if ($login) {
			
			$ip_address = $_SERVER['REMOTE_ADDR'];
			
			$privilege = $this->get_privilege($username);
			
			Session::instance()->set('privilege', $privilege);

			$session_id = Session::instance()->get('session_id');

			$uid = $this->get_uid($username);
			
			if ($this->reset_login_session($uid)) {
				return TRUE;
			}
			
			$sql = "INSERT INTO logins (uid, session_id, ip_address) VALUES ('$uid', '$session_id', '$ip_address')";
			$track = $this->db->query($sql);

			if ($track) {
				return TRUE;
			}
		} 
		
	}
	
	public function create_account($first_name, $last_name, $username, $password, $privilege)
	{
	
		$first_name 			= $this->db->escape($first_name);
		$last_name 				= $this->db->escape($last_name);
		$email 					= $username;
		$username 				= $this->db->escape($username);
		$privilege 				= $this->db->escape($privilege);
		
		$check_exists = $this->get_uid($email);
		
		if (($check_exists) || ($check_exists > 0)) {
		echo $email;
			return FALSE;
		}
		else {
			$sql = "INSERT INTO users (first_name, last_name, email_address, password, privilege) VALUES
									  ($first_name, $last_name, $username, '$password', $privilege)";
			return $this->db->query($sql);
		}
		
		
	}
	
	public function get_uid($username){
		$sql = "SELECT uid FROM users where email_address = " .$this->db->escape($username);
		$res = $this->db->query($sql);
		$row = @$res[0];
		return @$row->uid;
	}
	
	public function get_privilege($username){
		$sql = "SELECT privilege FROM users where email_address = " .$this->db->escape($username);
		$res = $this->db->query($sql);
		$row = @$res[0];
		return @$row->privilege;
	}
	
	
	public function reset_login_session($uid){
		$sql = "delete FROM logins where uid = '$uid'";
		$this->db->query($sql);
	}
	
	
	public function validate_email($email){
		$sql = "SELECT uid FROM users where email_address = " .$this->db->escape($email);
		
		$res = $this->db->query("SELECT uid FROM users where email_address = " .$this->db->escape($email))->current();
    	if ($res) {
			return TRUE;
		}
		
	}
	
	public function temp_reset($email, $temp_pass)
	{
		
		$sql = "UPDATE users set password = '$temp_pass', temp = 1 WHERE email_address = " . $this->db->escape($email);
								  
		return $this->db->query($sql);
	}


	
	public function reset_password($email_address, $temp_pass, $password){
		
		$temp_pass =  $this->db->escape($temp_pass);
		$password  =  $this->db->escape($password);
		$email 	   =  $this->db->escape($email_address);
		

    	$sql = "UPDATE users set password = $password, temp = 0 
								WHERE password = $temp_pass AND email_address = $email";

		if ($this->db->query($sql)) {
			return TRUE;
		}
		else {
			return FALSE;
		}
	}
	
}