<?php 
require __dir__.'/../../vendor/autoload.php';

// require __dir__.'/../../src/datefun/checkdateClass.php';
require __dir__."/../../src/autoload.php";
/**
* checkdate
*/
class CheckdateClassTest extends PHPUnit_Framework_TestCase
{
	
	public function test_check()
	{
		$obj = new \Znddzxx112\datefun\CheckdateClass();
		$res = $obj->check(7,15,2016);
		$this->assertTrue($res);

		$res = $obj->check(6,31,2016);
		$this->assertFalse($res);
	}
}