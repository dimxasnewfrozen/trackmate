<?php defined('SYSPATH') or die('No direct script access.');

class Runners_Controller extends Controller {

	const ALLOW_PRODUCTION = true;

	// ------------------------------------------------------------------
	//	__construct()
	// ------------------------------------------------------------------
	public function __construct()
	{
		parent::__construct();
		$this->runner = new Runners_Model;
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
				url::redirect(MAINPATH.'/events');
			}
		}
		
		$data['runners'] = $this->runner->get_runners();
		
		$this->page->template = '_templates/app';

		$data['view'] = 'runners';
		View::set_global('selected', $data['view']);
								  			
		$this->page->display('runners', $data);	
	
	}
	
	public function delete() {
	
		$post = $this->input->post();
		
		if ($post)
		{
			// start processing the data
			if($this->runner->remove_runner($post)) {
			}
		}
		url::redirect(MAINPATH.'/runners');
	}


}
?>
