<?php defined('SYSPATH') or die('No direct script access.');

class Events_Model extends Model {

	public function __construct()
	{
		parent::__construct();
		$this->db = new Database();
	}


	/******	GET EVENTS	*****/	
	public function get_events()
	{
		$sql = "SELECT id, name, num_runners, event_type FROM events order by name";
		return $this->db->query($sql)->result_array();
	}
	
	/******	ADD EVENT	*****/	
	public function add_event($post) {
	
		$name 			=  $this->db->escape($post['name']);
		$num_runners 	=  $this->db->escape($post['num_runners']);
		$event_type 	=  $this->db->escape($post['event_type']);
		
		if ($this->checkName($name)) {
			$sql = "INSERT INTO events (name, num_runners, event_type, date) VALUES ($name, $num_runners, $event_type, now())";
			return $this->db->query($sql);
		}
	}
	
	/******	CHECK EXISTING RUNNER BY NAME	*****/	
	public function checkName($name) {
	
		$sql = "SELECT id FROM events where name = $name";
		$res = $this->db->query($sql);
		$row = $res['id'];
		if ($row) {
			return false;
		}
		else {
			return true;
		}
	}
	
	/******	REMOVE EVENT	*****/	
	public function remove_event($post) {
	
		$id =  $this->db->escape($post['id']);
		
		$sql = "DELETE FROM events WHERE id = $id";
		return $this->db->query($sql);
	
	}	
	

	
}

?>