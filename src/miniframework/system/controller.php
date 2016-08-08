<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
* controller
*/
class Controller
{
	private static $instance;

	public function __construct()
	{
		self::$instance =& $this;
	}

	public static function get_instance()
	{
		return self::$instance;
	}
}