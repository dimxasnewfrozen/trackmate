<?php defined('SYSPATH') or die('No direct script access.');

// $Id: main.php 19 2009-03-06 02:35:38Z joshshea $

class Login_Controller extends Controller {

	const ALLOW_PRODUCTION = true;

	// ------------------------------------------------------------------
	//	__construct()
	// ------------------------------------------------------------------
	public function __construct()
	{
		parent::__construct();
		$this->model = new Login_Model;
	}

	// ------------------------------------------------------------------
	//	index()
	// ------------------------------------------------------------------
	public function index()
	{	
		// $data is array of data passed into the view.
        // Load the view as an object
		
        // Adding variables to the object that will be displayed in the view
		
		$this->page->template = '_templates/login';
		
        $data = array();
		
		$post = $this->input->post();
		
		if ($post)
		{
		
			// Super simple error correction :)
			
			$errors = FALSE;
			foreach ($_POST as $key => $val) {
				if ($val == '') {
					$errors = TRUE;
				}
				
			}   
			
			if ($errors)
			{
				$data['errors'] = 'Errors logging in.';
				$data['post'] = $_POST;
				
			} else {
				
				$data['username'] = $_POST['username'];
				$data['password'] = $this->generateHash($_POST['password']);

				
				$login = $this->model->login($post['username'], $data['password']);
				
				if ($login)
				{
					cookie::set('username',$data['username'], '15000');
					cookie::set('session_id',session_id(), '15000');
					
					header("Location: /");
					
				} else {
					$data['errors'] = 'Your login is incorrect';
				}
			}
		}
		
		if (Session::instance()->get('session_status')) {
			$data['errors'] = Session::instance()->get('session_status');
			Session::instance()->delete('session_status');
		}
		
		$this->page->display('login', $data);
	}
	
	/************************************************************************/
	# LOGOUT - DESTROY COOKIE											     #
	/************************************************************************/
	public function logout() {
		
		$this->page->template = '_templates/login';
		
		cookie::delete('username');
		
		$data['errors'] = 'You have been logged out.';
		
		$this->page->display('login', $data);

	}
	
	
	
	/************************************************************************/
	# PASSWORD RECOVERY														 #
	/************************************************************************/
	public function reset_password() {
		
		$this->page->template = '_templates/login';
		
		$data = array();

		$post = $this->input->post();
		
		if ($post){
			
			$email = $_POST['username'];
			
			if (!$email) 
			{
				$data['errors'] = "Error - you did not provide an e-mail!";
			}
			else {
				if ($this->model->validate_email($email)) {
					
					$new_pass = $this->rand_string(8);
					
					$new_pass_hash = $this->generateHash($new_pass);
					$this->model->temp_reset($email, $new_pass_hash);
					
					$to = $email;
					
					// To send HTML mail, the Content-type header must be set
					$headers  = 'MIME-Version: 1.0' . "\r\n";
					$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
					$headers .= 'From: Password Reset@easternheatingandcooling.com' . "\r\n" .
								'Reply-To: no-reply@easternheatingandcooling.com' . "\r\n" .
								'X-Mailer: PHP/' . phpversion();
					$subject = 'Eastern Heating and Cooling Password Reset';
					
					
					
					$message = 'Your temporary password is: ' . $new_pass . "<br/><br/><br/>";
					$message .= '<a href=' . MAINPATH . '/login/confirm_new_password/' . urlencode($email) . ' >Click here to reset your password </a>';
					$message .= '<br/><br/><br/>';
			
			
					mail($to, $subject, $message, $headers);
					
					
					header("Location: /login/confirm_new_password/".urlencode($email));
					
				}
				else {
					$data['errors'] = "Error - no e-mail address found on file!";
				}
			}
		}
		
		$this->page->display('reset', $data);

	}
	
	/************************************************************************/
	# SAVE NEW PASSWORD														 #
	/************************************************************************/
	public function confirm_new_password($email = "") {
		
		$this->page->template = '_templates/login';
		
		$data = array();
		
		$post = $this->input->post();
		
		if ($post){
			
			$email_address = $_POST['username'];
			
			$temp_pass 	   = $this->generateHash($_POST['temp_password']);

			// Check password and if they match and hash them
			$password = $_POST['password1'];
			$password = $this->generateHash($password);
			
			$password2 = $_POST['password2'];
			$password2 = $this->generateHash($password2);
			
			if ($password != $password2) {
				$data['errors'] = 'Error - Your passwords did not match';
			}
			else {

				if ($this->model->reset_password($email_address, $temp_pass, $password)) {
					Session::instance()->set('session_status', 'Your password has been reset!');
					header("Location: /login");
				}
				else {
					$data['errors'] = 'Error - Your temp password did not match.';
				}
			}

		}
		
		$data['email'] = @$email;

		$this->page->display('password_update', $data);

	}


	


	/************************************************************************/
	# GENERATE SALT FOR PASSWORD											 #
	/************************************************************************/
	public function generateSalt($password){
		
		// the salt is the first 5 chars of the password
		// this way we don't need to store the salt and the salt will be unique
		$salt = sha1(md5(substr($password, 0, 5)));
		
		return $salt;
	}
	
	
	
	
	/************************************************************************/
	# GENERATE THE HASH FOR THE PASSWORD WITH THE SALT						 #
	/************************************************************************/
	public function generateHash($password){
		
		// generate a hash using the generateSalt function
		// prepend the salt to the hash. 
		$salt = $this->generateSalt($password);
		$hash = sha1(md5($salt.$password));
		return $hash;
		
	}
	
	
	
	/************************************************************************/
	# VALIDATE THE EMAIL ADDRESS						 					 #
	/************************************************************************/
	public function check_email_address($email) {
		  // First, we check that there's one @ symbol, 
		  // and that the lengths are right.
		  if (!ereg("^[^@]{1,64}@[^@]{1,255}$", $email)) {
			// Email invalid because wrong number of characters 
			// in one section or wrong number of @ symbols.
			return false;
		  }
		  // Split it into sections to make life easier
		  $email_array = explode("@", $email);
		  $local_array = explode(".", $email_array[0]);
		  for ($i = 0; $i < sizeof($local_array); $i++) {
			if(!ereg("^(([A-Za-z0-9!#$%&'*+/=?^_`{|}~-][A-Za-z0-9!#$%&
				'*+/=?^_`{|}~\.-]{0,63})|(\"[^(\\|\")]{0,62}\"))$",
				$local_array[$i])) {
			  return false;
			}
		  }
		  // Check if domain is IP. If not, 
		  // it should be valid domain name
		  if (!ereg("^\[?[0-9\.]+\]?$", $email_array[1])) {
			$domain_array = explode(".", $email_array[1]);
			if (sizeof($domain_array) < 2) {
				return false; // Not enough parts to domain
			}
			for ($i = 0; $i < sizeof($domain_array); $i++) {
			  if(!ereg("^(([A-Za-z0-9][A-Za-z0-9-]{0,61}[A-Za-z0-9])|
				([A-Za-z0-9]+))$",
				$domain_array[$i])) {
				return false;
			  }
			}
		  }
		  return true;
	}
	
	
	
	
	
	/************************************************************************/
	# CREATE RANDOM STRING FOR TEMP PASWORD						 			 #
	/************************************************************************/
	function rand_string( $length ) {
	
	$str = "";
	
	$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";	

	$size = strlen( $chars );
	for( $i = 0; $i < $length; $i++ ) {
		$str .= $chars[ rand( 0, $size - 1 ) ];
	}

	return $str;
}

}
?>
