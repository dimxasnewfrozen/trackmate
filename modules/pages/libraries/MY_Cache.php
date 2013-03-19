<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Provides a driver-based interface for finding, creating, and deleting cached
 * resources. Caches are identified by a unique string. Tagging of caches is
 * also supported, and caches can be found and deleted by id or tag.
 *
 * $Id: Cache.php 3263 2008-08-05 17:57:50Z PugFish $
 *
 * @package    Cache
 * @author     Kohana Team
 * @copyright  (c) 2007-2008 Kohana Team
 * @license    http://kohanaphp.com/license.html
 */
class Cache extends Cache_Core {

	/**
	 * Fetches a cache by id. Non-string cache items are automatically
	 * unserialized before the cache is returned. NULL is returned when
	 * a cache item is not found.
	 *
	 * @param   string  cache id
	 * @return  mixed   cached data or NULL
	 */
	public function get($id)
	{
		// Change slashes to colons
		$id = str_replace(array('/', '\\'), '=', $id);

		return $this->driver->get($id);
	}
}
