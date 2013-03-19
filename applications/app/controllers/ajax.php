<?php defined('SYSPATH') or die('No direct script access.');

// $Id: main.php 19 2009-03-06 02:35:38Z joshshea $

class Ajax_Controller extends Controller {

	const ALLOW_PRODUCTION = true;

	// ------------------------------------------------------------------
	//	__construct()
	// ------------------------------------------------------------------
	public function __construct()
	{
		parent::__construct();
	}

	// ------------------------------------------------------------------
	//	subscribe()
	// ------------------------------------------------------------------
	public function subscribe()
	{	
			
		$key = 'dc6281da5ea5b305902d1b6e817ef6a6-us1';
		$list = 'f445aae63a';
		
		    // Validated email
		    $mc = new Mailchimp($key);
		    $email = $_POST['email'];
		    
		    // Send to Mailchimp				
		    if($mc->listSubscribe($list, $email, '') === true) 
		    {
		    	// success	
		    	$response = 'Thanks for subscribing!';
		    }else{
		    	// An error ocurred, return error message	
		    	$response = $mc->errorMessage;
		    }
		
		
		
		echo $response;
	}


	
}
