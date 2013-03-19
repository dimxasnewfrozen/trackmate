<?php defined('SYSPATH') or die('No direct script access.');

// $Id: main.php 19 2009-03-06 02:35:38Z joshshea $

class Record_Controller extends Controller {

	const ALLOW_PRODUCTION = true;

	// ------------------------------------------------------------------
	//	__construct()
	// ------------------------------------------------------------------
	public function __construct()
	{
		parent::__construct();
		$this->runner = new Runners_Model;
		$this->events = new Events_Model;
		$this->record = new Record_Model;
	}

	// ------------------------------------------------------------------
	//	index()
	// ------------------------------------------------------------------
	public function index()
	{
		$this->page->template = '_templates/app';
		
		$data['view'] = 'record';
		View::set_global('selected', $data['view']);
		
		$post = $this->input->post();
		if ($post)
		{
			// start processing the data
			if($this->record->add_recording($post)) {
				Session::instance()->set('record_added', 1);
				url::redirect(MAINPATH.'/record');
			}
		}
		
		if (Session::instance()->get('record_added')) {
			$data['record_added'] = Session::instance()->get('record_added');
			Session::instance()->delete('record_added');
		}
		else {
			$data['record_added'] = 0;
		}
		$data['runners'] = $this->runner->get_runners();
		$data['events']  = $this->events->get_events();
		
		$this->page->display('record', $data);
		
	}

}
?>
