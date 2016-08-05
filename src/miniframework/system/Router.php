<?php if(defined(BASEPATH)) exit('no scripts');

/**
* Route
*/
class Router
{

	private $class = '';

	private $method = 'index';

	function __construct()
	{
		$this->_fetch_class_method();
	}

	public function getClass()
	{
		return $this->class;
	}

	public function getMethod()
	{
		return $this->method;
	}

	public function _fetch_class_method()
	{
		$query_string = $_SERVER['QUERY_STRING'];
		echo $query_string;
	}

}