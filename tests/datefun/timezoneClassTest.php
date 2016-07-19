<?php 
require __dir__.'/../../vendor/autoload.php';

require __dir__.'/../../src/datefun/timezoneClass.php';

/**
* timezone
*/
class TimezoneClassTest extends PHPUnit_Framework_TestCase
{
	
	public function test_get_timezone()
	{
		$obj = new \Znddzxx112\Datefun\TimezoneClass();
		$obj->set_timezone("Asia/Shanghai");
		$res = $obj->get_timezone();
		
		$this->assertEquals("Asia/Shanghai",$res);
	}
}