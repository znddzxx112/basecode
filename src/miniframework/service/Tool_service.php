<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* 工具
*/
class Tool_service extends service
{
	
	function __construct()
	{
		
	}

	public function hello_service($value='')
	{
		echo 'hello service';
	}
}