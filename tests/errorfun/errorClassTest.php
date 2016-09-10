<?php 
require __dir__.'/../../vendor/autoload.php';

// require __dir__.'/../../src/errorfun/errorClass.php';
require __dir__."/../../src/autoload.php";

/**
* error
*/
class ErrorClassTest extends PHPUnit_Framework_TestCase
{
	
	public function test_debug_back_trace()
	{
		$obj = new \Znddzxx112\errorfun\ErrorClass();
		$backtrace_arr = $obj->debug_back_trace();
		$this->assertTrue(is_array($backtrace_arr));
	}

	public function test_get_error_get_last()
	{
		$obj = new \Znddzxx112\errorfun\ErrorClass();
		$error_get_last_arr = $obj->get_error_get_last();
		if(!is_null($error_get_last_arr)){
			$this->assertTrue(is_array($error_get_last_arr));
		}
	}

}