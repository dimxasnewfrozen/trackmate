<?php defined('SYSPATH') or die('No direct script access.');
/**
 * CMS model for public site
 *
 * $Id: Cms.php 2009-03-06 02:35:38Z joshshea $
 *
 */
class Company_Model extends Model {

	public function __construct()
	{
		parent::__construct();
		
		$this->db = new Database();

	}

/********************************************************************************************************************************************************/
# 	GET COMPANIES																																	     #
/********************************************************************************************************************************************************/
	public function get_companies($filter_char = "", $limit)
	{

		if ($filter_char == "") {
			// get all companies
			$sql = "SELECT * FROM companies order by company_name";
		}
		
		if ($filter_char != "") {
			if ($filter_char == "NUM") {
				// get companies that start with a number
				$c = $this->db->escape($filter_char);
				$sql = "SELECT * FROM companies WHERE UPPER(SUBSTRING(company_name, 1, 1)) REGEXP '[0-9]'";
			}
			else {
				// get companies that start with the letter $filter_char
				$c = strtoupper($this->db->escape($filter_char));
				$sql = "SELECT * FROM companies WHERE UPPER(SUBSTRING(company_name, 1, 1)) = $c";
			}

		}

		if ($limit != 0) {
			$sql .= " LIMIT 0, 50";
		}
		
		return $this->db->query($sql);
	}
	
	
	
	
	
	
/********************************************************************************************************************************************************/
# 	GET MAIN COMPANY INFO																															    #
/********************************************************************************************************************************************************/
	public function get_main_company_info($cid)
	{
		// get all main company info
		$sql = "SELECT * FROM companies where cid = " . $this->db->escape($cid);
		return $this->db->query($sql);
	}




/********************************************************************************************************************************************************/
# 	GET FILE_UPLOADS																															    #
/********************************************************************************************************************************************************/
	public function get_file_uploads($cid){
		$sql = "SELECT * FROM uploads where cid = " .$this->db->escape($cid) . " ORDER BY audit_date DESC";
		return $this->db->query($sql);
	}




/********************************************************************************************************************************************************/
# 	SAVE FILE_UPLOADS																															    #
/********************************************************************************************************************************************************/
	public function save_file_upload($cid, $name, $file_name ){
		
		$userid 	= $this->get_uid();
		$name 		= $this->db->escape($name);
		$file_path  = $this->db->escape($file_name);
		
		$sql = "INSERT INTO uploads (cid, name, file_name, audit_userid) VALUES ($cid, $name, $file_path, $userid)";
		return $this->db->query($sql);
	}



/********************************************************************************************************************************************************/
# 	DELETE FILE_UPLOADS																															    #
/********************************************************************************************************************************************************/
	public function remove_document($fid){	
		$sql = "DELETE FROM uploads where fid = " . $this->db->escape($fid);;
		return $this->db->query($sql);
	}


/********************************************************************************************************************************************************/
# 	CREATE COMPANY	 																																	 #
/********************************************************************************************************************************************************/
	public function create_company($post)
	{
		
		$phone_chars 			= array("'","(", ")", "-", " ");
		
		$company_name 			=  $this->db->escape($post['company_name']);
		$customer_name 			=  $this->db->escape($post['customer_name']);
		$it_contact 			=  $this->db->escape($post['it_contact']);
		$it_contact_phone  		=  str_replace($phone_chars, "", $this->db->escape($post['it_contact_phone']));
		$hvac_contact 			=  $this->db->escape($post['hvac_contact']);
		$hvac_contact_phone 	=  str_replace($phone_chars, "", $this->db->escape($post['hvac_contact_phone']));
		$uid 					=  $this->get_uid();
		
		$customer_name 			=  ($customer_name == "") ? "''" : $customer_name;
		$it_contact 			=  ($it_contact == "") ? "''" : $it_contact;
		$it_contact_phone  		=  ($it_contact_phone == "") ? "''" : $it_contact_phone;
		$hvac_contact 			=  ($hvac_contact == "") ? "''" : $hvac_contact;
		$hvac_contact_phone 	=  ($hvac_contact_phone == "") ? "''" : $hvac_contact_phone;

		$sql = "INSERT INTO companies (company_name, customer_name, it_contact, it_contact_phone, hvac_contact, hvac_contact_phone, audit_uid) VALUES
									($company_name, $customer_name, $it_contact, $it_contact_phone, $hvac_contact, $hvac_contact_phone, '$uid')";
		return $this->db->query($sql);
	}

/********************************************************************************************************************************************************/
# 	UPDATE COMPANY	 																																	 #
/********************************************************************************************************************************************************/
	public function update_company($post)
	{
		
		$phone_chars 			= array("'","(", ")", "-", " ");
		$cid 		 			=  $this->db->escape($post['cid']);
		$company_name 			=  $this->db->escape($post['company_name']);
		$customer_name 			=  $this->db->escape($post['customer_name']);
		$it_contact 			=  $this->db->escape($post['it_contact']);
		$it_contact_phone  		=  str_replace($phone_chars, "", $this->db->escape($post['it_contact_phone']));
		$hvac_contact 			=  $this->db->escape($post['hvac_contact']);
		$hvac_contact_phone 	=  str_replace($phone_chars, "", $this->db->escape($post['hvac_contact_phone']));
		$uid 					=  $this->get_uid();
		

		$customer_name 			=  ($customer_name == "") ? "''" : $customer_name;
		$it_contact 			=  ($it_contact == "") ? "''" : $it_contact;
		$it_contact_phone  		=  ($it_contact_phone == "") ? "''" : $it_contact_phone;
		$hvac_contact 			=  ($hvac_contact == "") ? "''" : $hvac_contact;
		$hvac_contact_phone 	=  ($hvac_contact_phone == "") ? "''" : $hvac_contact_phone;
		

		$sql = "UPDATE companies set company_name = $company_name, customer_name = $customer_name, 
		it_contact = $it_contact, it_contact_phone = $it_contact_phone, hvac_contact = $hvac_contact,
		hvac_contact_phone = $hvac_contact_phone, audit_uid = '$uid' WHERE cid = $cid";

		return $this->db->query($sql);
	}
	
	
	
/********************************************************************************************************************************************************/
# 	SAVE COMPANY DATA 	 																																	 #
/********************************************************************************************************************************************************/
	public function save_company_data($cid, $post)
	{

		$uid 					=  $this->get_uid();
		
		foreach ($post as $key => $value) {
			
				$key 			=  $this->db->escape($key);
				$value 			=  $this->db->escape($value);
				
				
				$sql = "UPDATE field_vals set hist = '1' WHERE company_id = $cid and field_id = '$key'";
				$this->db->query($sql);	
				
				$sql = "INSERT INTO field_vals (company_id, field_id, user_id, altered, field_value, hist) 
						values ('$cid', $key, $uid, NOW(), $value, 0)";
				$this->db->query($sql);	
				
				
		}
		
		return true;
		
	}
	
	
	
	
	
	
	
	
	

	public function get_uid(){
		$username = $_COOKIE["username"];
		$sql = "SELECT uid FROM users where email_address = " .$this->db->escape($username);
		$res = $this->db->query($sql);
		$row = $res[0];
		return $row->uid;
	}
	
	public function get_company_name($cid){
		$sql = "SELECT company_name FROM companies where cid = " .$this->db->escape($cid);
		$res = $this->db->query($sql);
		$row = $res[0];
		return $row->company_name;
	}
	
	public function get_cid_from_fid($fid){

		$sql = "SELECT cid FROM uploads where fid = " . $this->db->escape($fid);
		$res = $this->db->query($sql);
		$row = $res[0];
		return $row->cid;
	}

}

?>