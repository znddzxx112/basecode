<?php 
require __dir__.'/../../vendor/autoload.php';

// require __dir__.'/../../src/arrayfun/arrayCombineClass.php';
require __dir__."/../../src/autoload.php";

/**
* array_combine
*/
class ArrayCombineClassTest extends PHPUnit_Framework_TestCase
{
	
	public function test_combine()
	{
		$obj = new \Znddzxx112\Arrayfun\ArrayCombineClass();
		$key = array("a","b","c");
		$value = array("foo","bar","apple");
		$arr = $obj->combine($key,$value);

		$this->assertEquals(array("a"=>"foo","b"=>"bar","c"=>"apple"),$arr);
	}
}