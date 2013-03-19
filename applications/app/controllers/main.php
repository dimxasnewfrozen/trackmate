<?php defined('SYSPATH') or die('No direct script access.');

// $Id: main.php 19 2009-03-06 02:35:38Z joshshea $

class Main_Controller extends Controller {

	const ALLOW_PRODUCTION = true;

	// ------------------------------------------------------------------
	//	__construct()
	// ------------------------------------------------------------------
	public function __construct()
	{
		parent::__construct();
		/*
		$this->model = new Auth_Model;	
		
		$this->company = new Company_Model;	
		
		if (!cookie::get('username')) {
	    	url::redirect(MAINPATH.'/login');
	    }
		if (!$this->model->check_auth(cookie::get('username'))) {
	    	url::redirect(MAINPATH.'/login');
		}
		*/

	}

	// ------------------------------------------------------------------
	//	index()
	// ------------------------------------------------------------------
	public function index()
	{	
		// $data is array of data passed into the view.
        // Load the view as an object
		
        // Adding variables to the object that will be displayed in the view

		$this->page->template = '_templates/app';
		$data['view'] = 'dashboard';
		View::set_global('selected', 'dashboard');
		
		$this->page->display('index', $data);
	}
	
	

}
?>
