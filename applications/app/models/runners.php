<?php defined('SYSPATH') or die('No direct script access.');

class Runners_Model extends Model {

	public function __construct()
	{
		parent::__construct();
		$this->db = new Database();
	}


	/******	GET RUNNERS	*****/	
	public function get_runners()
	{
		$sql = "SELECT id, first_name, last_name, age, gender, type_class FROM runners where status = '1' order by first_name, last_name";
		return $this->db->query($sql)->result_array();
	}
	
	/******	ADD RUNNER	*****/	
	public function add_runner($post) {
	
		$first_name 	=  $this->db->escape($post['first_name']);
		$last_name 		=  $this->db->escape($post['last_name']);
		$age 			=  $this->db->escape($post['age']);
		$gender  		=  $this->db->escape($post['gender']);
		$class 			=  $this->db->escape($post['class']);
		
		if ($this->checkName($first_name, $last_name)) {
			$sql = "INSERT INTO runners (first_name, last_name, age, gender, type_class, status, date) VALUES
									($first_name, $last_name, $age, $gender, $class, 1, NOW())";
			return $this->db->query($sql);
		}
	}
	
	/******	CHECK EXISTING RUNNER BY NAME	*****/	
	public function checkName($first_name, $last_name) {
	
		$sql = "SELECT id FROM runners where first_name = $first_name AND last_name = $last_name";
		$res = $this->db->query($sql);
		$row = $res['id'];
		if ($row) {
			return false;
		}
		else {
			return true;
		}
	}
	
	/******	REMOVE RUNNER	*****/	
	public function remove_runner($post) {
	
		$id =  $this->db->escape($post['id']);
		
		$sql = "DELETE FROM runners WHERE id = $id";
		return $this->db->query($sql);
	
	}	
	

	
}

?>