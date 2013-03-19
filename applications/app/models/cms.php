<?php defined('SYSPATH') or die('No direct script access.');
/**
 * CMS model for public site
 *
 * $Id: Cms.php 2009-03-06 02:35:38Z joshshea $
 *
 */
class CMS_Model extends Model {

	public function __construct()
	{
		parent::__construct();
		
		$this->db = new Database();
	}
	






/******	VENDORS	*****/	
	public function get_all_vendors()
	{
		
		$sql = "SELECT * FROM vendors ORDER BY name ASC";
		return $this->db->query($sql)->result_array();	
	}


/******	VENUES	*****/

	public function get_carriers()
	{
		
		$sql = "SELECT * FROM carriers ORDER BY title DESC";
		return $this->db->query($sql)->result_array();	
	}


	
/******	GALLERY	*****/
	
	public function get_gallery_by_cat($cat) 
	{
		$sql = "SELECT * FROM gallery WHERE cat_id = ".$this->db->escape($cat)." ORDER BY id ASC";
		return $this->db->query($sql)->result_array();
	}	
	


/******	STATIC PAGES	*****/


	public function get_static_page($id)
	{
	
		$sql = "SELECT * FROM cms_static_pages WHERE id = ".$this->db->escape($id);
		return $this->db->query($sql)->current();
	}




/******	FEATURE	*****/


	public function get_feature()
	{
	
		$sql = "SELECT * FROM feature";
		return $this->db->query($sql)->current();
	
	}





/*********	PORTFOLIO 	************/
	
	
	
	public function get_portfolio_features()
	{
		$sql = "SELECT * FROM portfolio WHERE feature = 'true'";
		$items =  $this->db->query($sql)->result_array();
		
		// Sort the items 
		foreach ($items as $i)
		{
			$return[$i->cat_name] = $i;
		}
		
		return $return;
	
	}
	
	
	public function get_portfolio_items($cat)
	{
		$sql = "SELECT * FROM portfolio WHERE cat_name = ".$this->db->escape($cat)." ORDER BY id DESC";
		return $this->db->query($sql)->result_array();
	
	}
	


/*********	SUCCESS MESSAGES 	************/


	public function get_success_message($id)
	{
		$sql = "SELECT * FROM cms_success_messages WHERE id = $id";
		return $this->db->query($sql)->current();
	
	}




/*********	HOME PAGE HEADERS 	************/

	public function get_headers()
	{
		$sql = "SELECT * FROM cms_home_headers h ORDER BY slider_order ASC";
		return $this->db->query($sql)->result_array();
	}



/*********	CUSTOM DASHBOARD APPS 	************/

	public function get_custom_ad($type)
	{
		$sql = "SELECT * FROM cms_custom_ads a
					JOIN campaign_types ct ON ct.type_name = a.type
				WHERE ct.id = ".$this->db->escape($type);
		return $this->db->query($sql)->current();	
	}



/*********	DYNAMIC PAGES 	************/

	public function get_dynamic_page($slug)
	{
	
		$sql = "SELECT * FROM cms_dynamic_pages WHERE page_slug = ".$this->db->escape($slug);
		return $this->db->query($sql)->current();
	}


}