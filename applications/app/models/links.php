<?php defined('SYSPATH') or die('No direct script access.');
/**
 * CMS model for public site
 *
 * $Id: Cms.php 2009-03-06 02:35:38Z joshshea $
 *
 */
class Links_Model extends Model {

	public function __construct()
	{
		parent::__construct();
		
		$this->db = new Database();

	}


	public function get_links()
	{
		$sql = "SELECT l.link_url, l.link_name, l.id, l.cid, c.company_name
				FROM links l 
				LEFT JOIN companies c
				on l.cid = c.cid
				order by c.cid";
		
		$result = $this->db->query($sql);
		if ($result->count() > 0)
		{
			return  $this->db->query($sql);
		}
		else {
			return false;
		}
	}
	
	public function get_links_with_id($cid)
	{
		$sql = "SELECT link_url, link_name, id from links where cid = $cid  order by ID";
		
		$result = $this->db->query($sql);
		if ($result->count() > 0)
		{
			return  $this->db->query($sql);
		}
		else {
			return false;
		}
	}
	
	public function insert_link($link_url, $link_name, $cid){
		
		$link_url  = $this->db->escape($link_url);		
		$link_name = $this->db->escape($link_name);
		$cid  	   = str_replace("'", "", $this->db->escape($cid));
		$uid 	   = $this->get_uid();
		
		$sql = "INSERT INTO links (link_url, uid, link_name, cid) VALUES ($link_url, $uid, $link_name, $cid)";

		return $this->db->query($sql);

	}
	
	public function delete_link($id){
		
		$id  = $this->db->escape($id);
		$sql = "DELETE FROM links where id = $id";
		return $this->db->query($sql);

	}
	
	
	public function get_uid(){
		
		$username = $_COOKIE["username"];
		$sql = "SELECT uid FROM users where email_address = " .$this->db->escape($username);
		$res = $this->db->query($sql);
		$row = $res[0];
		return $row->uid;
		
	}
	
}

?>