<?php defined('SYSPATH') or die('No direct script access.');
/**
 * CMS model for public site
 *
 * $Id: Cms.php 2009-03-06 02:35:38Z joshshea $
 *
 */
class History_Model extends Model {

	public function __construct()
	{
		parent::__construct();
		
		$this->db = new Database();

	}

/********************************************************************************************************************************************************/
# 	GET HISTORY																																	     #
/********************************************************************************************************************************************************/
	public function get_history($id)
	{
		
		$ids = explode("-", $id);
		
		$field_id = $ids[0];
		$cid 	  = $ids[1];

		$sql = "SELECT
				v.field_value, DATE_FORMAT(altered, '%m/%d/%Y  %r') as altered, f.field_name, v.user_id, u.email_address
				FROM
				field_vals v
				LEFT JOIN users u ON v.user_id = u.uid
				LEFT JOIN field_names f ON v.field_id = f.id 
				WHERE
				v.field_id = '$field_id' and
				v.company_id = '$cid'
				ORDER BY v.altered DESC";
		
		$result = $this->db->query($sql);
		
		if ($result->count() > 0) {
			return $this->db->query($sql);
		}
		else {
			return false;
		}
		
	}
	
}

?>