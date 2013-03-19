<?php defined('SYSPATH') or die('No direct script access.');

// $Id: main.php 19 2009-03-06 02:35:38Z joshshea $

class Reports_Controller extends Controller {

	const ALLOW_PRODUCTION = true;

	// ------------------------------------------------------------------
	//	__construct()
	// ------------------------------------------------------------------
	public function __construct()
	{
		parent::__construct();
		
		$this->reports 	  = new Reports_Model;	
		$this->runner 	  = new Runners_Model;	
		$this->event 	  = new Events_Model;	

		$this->page->template = '_templates/app';
		
				
	}

	// ------------------------------------------------------------------
	//	index()
	// ------------------------------------------------------------------
	public function index()
	{

       $post = $this->input->post();
		
		if ($post)
		{
			// start processing the data
			if($this->runner->add_runner($post)) {
				url::redirect(MAINPATH.'/reports');
			}
		}
		
		$data['runners'] = $this->runner->get_runners();
		$data['events']  = $this->event->get_events();
		
		$this->page->template = '_templates/app';

		$data['view'] = 'reports';
		View::set_global('selected', $data['view']);
								  			
		$this->page->display('reports', $data);	

	}
}
?>
