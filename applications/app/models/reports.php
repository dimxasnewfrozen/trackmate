<?php defined('SYSPATH') or die('No direct script access.');
/**
 * CMS model for public site
 *
 * $Id: Cms.php 2009-03-06 02:35:38Z joshshea $
 *
 */
class Reports_Model extends Model {

	public function __construct()
	{
		parent::__construct();
		
		$this->db = new Database();

	}

	public function generate_report($id) {
	
	
	}
	
}

?>