<?php defined('SYSPATH') or die('No direct script access.');

/* ------------------------------------------------------

Helper - twitParse

Author: Josh Shea
Date: 03-12-2009
Description:
	Set of utility functions to parse users and links
	for twitter posts.

------------------------------------------------------ */
class twitParse {

	public static function parse($text) {
	
		// explode the string
		$p = explode(" ", $text);
		
			// PARSE FOR HTTP
			for ($i = 0; $i < count($p); $i++){
				$find   = 'http';
				$pos = strpos($p[$i], $find);
				
				if ($pos !== false) {
				    $p[$i] = '<a href="'.$p[$i].'" target="_blank">'.$p[$i].'</a>';
				}
			}
			
			// PARSE FOR WWW
			for ($i = 0; $i < count($p); $i++){
				$find   = 'www';
				$pos = strpos($p[$i], $find);
				
				if ($pos !== false) {
				    $p[$i] = '<a href="http://'.$p[$i].'" target="_blank">'.$p[$i].'</a>';
				}
			}
			
			// PARSE FOR @USERNAME
			for ($i = 0; $i < count($p); $i++){
				$find   = '@';
				$pos = strpos($p[$i], $find);
				
				if ($pos !== false) {
					// remove the @
					$name = str_replace('@', '', $p[$i]);
				    $p[$i] = '<a href="http://www.twitter.com/'.$name.'" target="_blank">'.$p[$i].'</a>';
				}
			}
			
			
		// Put it all back together
		$text = implode(" ", $p);
		return $text;
	}
	
	public static function date($date) {
		$ttime = strtotime($date);
		$est_time = $ttime+10800;
		$d = date('g:i A M j, Y', $est_time);
		
		return $d;
	}
}
