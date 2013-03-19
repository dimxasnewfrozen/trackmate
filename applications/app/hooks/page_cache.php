<?php defined('SYSPATH') or die('No direct script access.');

class hook_page_cache {

	private $cache;

	public function __construct()
	{
		$this->cache = new Cache;
		
		Event::add_before('system.routing', array('router', 'setup'), array($this, 'load_cache'));
	}
	
	public function load_cache()
	{
		if ($cache = $this->cache->get('page_'.Router::$current_uri))
		{
			Kohana::render($cache);
			exit;
		}
		else
		{
			Event::add('system.display', array($this, 'save_cache'));
		}
	}

	public function save_cache()
	{
		$this->cache->set('page_'.Router::$current_uri, Event::$data);	
	}
	
}


$hook = new hook_page_cache;
unset($hook);



?>