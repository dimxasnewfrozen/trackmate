<?php defined('SYSPATH') or die('No direct script access.');

class Global_Model extends Model {

	public function __construct()
	{
		parent::__construct();
		
		$this->db = new Database();
	}
	


	public function get_recent_news($limit)
	{
		$sql = "SELECT * FROM news ORDER BY publish DESC LIMIT ".$this->db->escape($limit);
		return $this->db->query($sql)->result_array();
	
	
	}



	public function get_news_by_month($month, $year)
	{
		$date = $year.'-'.$month.'-01';
		$next = date('Y-m-01', strtotime('next month', time($date)));
	
		$sql = "SELECT * FROM news WHERE publish BETWEEN ".$this->db->escape($date)." AND ".$this->db->escape($next);
		
		$news = $this->db->query($sql);
		
		if ($news->count() > 1)
		{
			return $news->result_array();
		} else {
			return FALSE;
		
		}
	
	
	}
	
	
	
	public function get_archives($start)
	{
		$sql = "SELECT * FROM news WHERE publish < ".$this->db->escape($start)." ORDER BY publish DESC LIMIT 20";
		return $this->db->query($sql)->result_array();
	
	}
	
	
	public function get_news_by_slug($slug)
	{
		$sql = "SELECT * FROM news WHERE slug = ".$this->db->escape($slug);
		return $this->db->query($sql)->result_array();
	}

	
}