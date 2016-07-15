<?php 
require "../../vendor/autoload.php";


require __dir__."/../../src/arrayfun/arrayClass.php";

class ArrayClassTest extends PHPUnit_Framework_TestCase
{
	public function test_create_array()
	{
		$array_class = new \Znddzxx112\ArrayFun\ArrayClass();
		$arr = $array_class->create_array();
		$this->assertEquals('dog',$arr['a']);
		$this->assertEquals('cat',$arr['b']);
	}

}