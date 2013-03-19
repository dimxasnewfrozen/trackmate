<?php defined('SYSPATH') or die('No direct script access.');
/**
 * CMS model for public site
 *
 * $Id: Cms.php 2009-03-06 02:35:38Z joshshea $
 *
 */
class Auth_Model extends Model {

	public function __construct()
	{
		parent::__construct();
		
		$this->db = new Database();

	}


/******	CHECK LOGIN	*****/	

	public function check_auth($username)
	{
		$username 	= $_COOKIE["username"];
		$session_id = $_COOKIE["session_id"];

		$uid 	    = $this->get_uid($username);
		
		$authed = $this->db->query("SELECT uid FROM logins where uid = '$uid' and session_id = '$session_id'")->current();
    	if ($authed) {
			return TRUE;
		}
		else {
			return FALSE;
		}
		
	}
	
	public function get_uid($username){
		$sql = "SELECT uid FROM users where email_address = " .$this->db->escape($username);
		$res = $this->db->query($sql);
		$row = $res[0];
		return $row->uid;
	}
	
	
}