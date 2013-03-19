<?php defined('SYSPATH') or die('No direct script access.');
/**
 * CMS model for public site
 *
 * $Id: Cms.php 2009-03-06 02:35:38Z joshshea $
 *
 */
class Input_Fields_Model extends Model {

	public function __construct()
	{
		parent::__construct();
		
		$this->db = new Database();

	}

/********************************************************************************************************************************************************/
# 	GET COMPANIES																																	     #
/********************************************************************************************************************************************************/
	public function add_input_field($tab_type, $field_name, $data_type)
	{
		
		$tab_type 	= $this->db->escape($tab_type);
		$field_name = $this->db->escape($field_name);
		$data_type	= $this->db->escape($data_type);
		
		$sql = "INSERT INTO field_names (tab_type, field_name, data_type) 
								VALUES ($tab_type, $field_name, $data_type)";
		return $this->db->query($sql);
	}
	
	
	
/********************************************************************************************************************************************************/
# 	GET FIELD DATA																																     	 #
/********************************************************************************************************************************************************/
	public function get_field_data($cid) {
		
		
		// Get list of all fields 
		$sql = "SELECT * FROM field_names ORDER BY tab_type, id ASC";
		$fields = $this->db->query($sql)->result_array();
		
		// Get the field results
		$sql = "SELECT * FROM field_vals WHERE company_id = ".$this->db->escape($cid)." ORDER BY altered ASC";
		$results = $this->db->query($sql);

		// Sort results
		foreach ($results->result_array() as $a)
		{
		    // Just make field_id the key for easier sorting stuff
		    $r[$a->field_id] = $a;
		    
		}

		// Put them together
		foreach ($fields as $f)
		{
		    $list[$f->tab_type]['fields'][$f->field_name]['field_name'] = $f->field_name;
		    $list[$f->tab_type]['fields'][$f->field_name]['type'] 		= $f->data_type;
		    $list[$f->tab_type]['fields'][$f->field_name]['id'] 		= $f->id;
		
		    // Insert the value if exists
		    if (isset($r[$f->id]))
		    {
		    	$list[$f->tab_type]['fields'][$f->field_name]['value'] 		= $r[$f->id]->field_value;			
		    } else {
		    	$list[$f->tab_type]['fields'][$f->field_name]['value'] 		= FALSE;				
		    	
		    	
		    }
		    
		}

		return $list;
		
			
		
		
		
		
/*
		$sql = "SELECT tab_type, field_name, data_type, field_value, altered, n.id FROM field_names n
		LEFT JOIN field_vals v ON v.field_id = n.id
		LEFT JOIN users u ON v.user_id = u.uid
		WHERE (v.company_id = $cid OR v.company_id is null)
		ORDER BY IF(ISNULL(v.id),1,0),v.id ASC, v.altered DESC";
		$result = $this->db->query($sql);


		if ($result->count() > 0)
		{
		
			// Sort the results into a multidimensional array
			foreach ($result->result_array() as $r)
			{
				$list[$r->tab_type]['fields'][$r->field_name]['field_name'] = $r->field_name;
				$list[$r->tab_type]['fields'][$r->field_name]['value'] 		= $r->field_value;
				$list[$r->tab_type]['fields'][$r->field_name]['type'] 		= $r->data_type;
				$list[$r->tab_type]['fields'][$r->field_name]['id'] 		= $r->id;
			}
			
			print_r($list); die();
			//return $list;
		
		
		} else {	
			return FALSE;
		}
*/
		
	}
	
/********************************************************************************************************************************************************/
# 	GET FIELD NAMES - FOR MANAGEMENT																													 #
/********************************************************************************************************************************************************/
	public function get_data_fields() {
		
		$sql = "SELECT * FROM field_names ORDER BY ID";
		$result = $this->db->query($sql);
		if ($result->count() > 0)
		{
			return $result;
		}
		else {
			return FALSE;	
		}
	}
	
	
	
/********************************************************************************************************************************************************/
# 	UPDATE FIELDS																																	     #
/********************************************************************************************************************************************************/
	public function update_input_field($id, $tab_type, $field_name, $data_type)
	{
		
		$id 		= $this->db->escape($id);
		$tab_type 	= $this->db->escape($tab_type);
		$field_name = $this->db->escape($field_name);
		$data_type	= $this->db->escape($data_type);
		
		$sql = "UPDATE field_names SET tab_type = $tab_type, field_name = $field_name,  data_type = $data_type WHERE id = $id";
		return $this->db->query($sql);
	}
	
/********************************************************************************************************************************************************/
# 	REMOVE FIELDS																																	     #
/********************************************************************************************************************************************************/
	public function remove($id)
	{
		
		$id  = $this->db->escape($id);
		$sql = "DELETE FROM field_names WHERE id = $id";
		return $this->db->query($sql);
	}	
	
}
