<?php defined('SYSPATH') or die('No direct script access.');

class Events_Controller extends Controller {

	const ALLOW_PRODUCTION = true;

	// ------------------------------------------------------------------
	//	__construct()
	// ------------------------------------------------------------------
	public function __construct()
	{
		parent::__construct();
		$this->events = new Events_Model;
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
			if($this->events->add_event($post)) {
				url::redirect(MAINPATH.'/events');
			}
		}
		
		$data['events'] = $this->events->get_events();
		
		$this->page->template = '_templates/app';

		$data['view'] = 'events';
		View::set_global('selected', $data['view']);
								  			
		$this->page->display('events', $data);	
	
	}
	
	public function delete() {
	
		$post = $this->input->post();
		
		if ($post)
		{
			// start processing the data
			if($this->events->remove_event($post)) {
			}
		}
		url::redirect(MAINPATH.'/events');
	}


}
?>
