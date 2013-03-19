<?php defined('SYSPATH') or die('No direct script access.');

class Record_Model extends Model {

	public function __construct()
	{
		parent::__construct();
		$this->db = new Database();
	}

	/******	ADD RECORDING *****/	
	public function add_recording($post) {
	
		$event		 	=  $this->db->escape($post['event']);
		$runner 		=  $this->db->escape($post['runner']);
		$hours 			=  ($this->db->escape($post['hours']) == "") ? "00" : $this->db->escape($post['hours']);
		$minutes  		=  ($this->db->escape($post['minutes']) == "") ? "00" : $this->db->escape($post['minutes']);
		$seconds 		=  ($this->db->escape($post['seconds']) == "") ? "00" : $this->db->escape($post['seconds']);
		$miliseconds    =  ($this->db->escape($post['miliseconds']) == "") ? "00" : $this->db->escape($post['miliseconds']);
		$date_recorded  =  explode("/", $this->db->escape($post['date_recorded']));
		$date_recorded  =  $this->db->escape($date_recorded[2] . "-" .  $date_recorded[0] . "-" .  $date_recorded[1]);
		
		
		$sql = "INSERT INTO recordings (event_id, runner_id, hours, minutes, seconds, miliseconds, date_recorded, date_added) VALUES
						($event, $runner, $hours, $minutes, $seconds, $miliseconds, $date_recorded, NOW())";
		return $this->db->query($sql);
		
	}
}

?>