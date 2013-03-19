<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Kohana Controller class. The controller class must be extended to work
 * properly, so this class is defined as abstract.
 *
 * $Id: main.php 19 2009-03-06 02:35:38Z joshshea $
 *
 */
abstract class Controller extends Controller_Core {

	// Allow all controllers to run in production by default
	const ALLOW_PRODUCTION = TRUE;



	/**
	 * Loads URI, and Input into this controller.
	 *
	 * @return  void
	 */
	public function __construct()
	{
		if (Kohana::$instance == NULL)
		{
			// Set the instance to the first controller loaded
			Kohana::$instance = $this;
		}


		// URI should always be available
		$this->uri = URI::instance();

		// Input should always be available
		$this->input = Input::instance();
		
		// Pages should always be available
		$this->page = new Pages();
		
		// And Profiler to make things happy
		//$profiler = new Profiler;
		
		// Set up global page properties		
		$this->global = new Global_Model;	
		$this->RSS = new Rss;		
		$this->cms = new CMS_Model;
		
		Session::instance()->set('session_id', session_id());
		
		define('CSSPATH', "http://trackmate.kddevworks.com/assets/css/");
		define('JSPATH', "http://trackmate.kddevworks.com/assets/js/");
		define('IMGPATH', "http://trackmate.kddevworks.com/assets/img/");
		define('MAINPATH', "/");
		
	}
	


} // End Controller Class