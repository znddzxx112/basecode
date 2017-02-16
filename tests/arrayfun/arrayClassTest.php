<?php 
require "../../vendor/autoload.php";


// require __dir__."/../../src/arrayfun/arrayClass.php";
require __dir__."/../../src/autoload.php";

use \Znddzxx112\arrayfun\ArrayClass;

class ArrayClassTest extends PHPUnit_Framework_TestCase
{
	public function test_create_array()
	{
		$array_class = new \Znddzxx112\arrayfun\ArrayClass();
		$arr = $array_class->create_array();
		$this->assertEquals('dog',$arr['a']);
		$this->assertEquals('cat',$arr['b']);
	}

	public function test_count()
	{
		$array_class = new ArrayClass();
		$input = array(1, "hello", 1, "world", "hello");
		$output = $array_class->count_values($input);
		$this->assertEquals(["1"=>2, "hello"=>2, "world"=>1], $output);
	}

	

}