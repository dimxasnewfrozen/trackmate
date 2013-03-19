<?php defined('SYSPATH') or die('No direct script access.');
/**
 * @package  Page Module
 *
 * $Id: pages.php 20 2008-05-19 20:37:49Z samsoffes $
 *
 */
 
/**
 * Default title for the each page. This will ususally be your site name.
 */
$config['title'] = 'DEV';

/**
 * Title seperator
 */
$config['title_seperator'] = ' - ';

/**
 * Default template to use. This is a view in your views folder that the module will load
 * by default. You will probably override this later in your controllers. See the docs for
 * how to make a template.
 */
$config['template'] = '_templates/main';

/**
 * Number of seconds to cache the <head> tag. Set to false to disable <head> caching
 */
$config['cache_lifetime'] = false;

/**
 * Allowed Languages. This should not include your default language
 */
$config['additional_languages'] = array();

/**
 * Doctype. Options are html, xhtml, xhtml_strict, xhtml_1.1
 * The content type is set for you if you are using xhtml 1.1 to application/xhtml+xml. If you
 * are not using xhtml 1.1, it is just text/html
 */
$config['doc_type'] = 'xhtml';

/**
 * Character set. utf-8 or iso-8859-1. utf-8 is recommended
 */
$config['charset'] = 'utf-8';

/**
 * Format output. none, compress, indent
 * The indent method uses DOMDocument which required valid XHTML to work. If you have a malformed
 * document, it will give you a PHP error, so beware.
 */
$config['format_output'] = 'none';

/**
 * CSS url as you would normally use it in HTML
 */
$config['css_url'] = '/assets/css';

/**
 * Javascript url as you would normally use it in HTML
 */
$config['js_url'] = '/assets/js/';

/**
 * CSS path relative from your index.php file
 */
$config['css_path'] = '/assets/css/';

/**
 * Javascript path relative from your index.php file
 */
$config['js_path'] = '/assets/js/';


$config['ext'] = '/assets/img/';

/** 
 * Version number to append to end of JS and CSS files to combat caching 
 */ 
$config['version'] = '1.0'; 