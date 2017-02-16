<?php 
require "../../vendor/autoload.php";

// require __dir__."/../../src/arrayfun/arrayChunkClass.php";
require __dir__."/../../src/autoload.php";

/**
* array_chunk
*/
class ArrayChunkClassTest extends PHPUnit_Framework_Testcase
{
	
	public function test_chunk()
	{
		$arr = array("a"=>"dog","b"=>"cat","c"=>"apple","2"=>"banana");
		$obj = new \Znddzxx112\Arrayfun\ArrayChunk();
		$chunked = $obj->chunk($arr,3,false);
		$this->assertEquals($chunked[0],array("dog","cat","apple"));
		$this->assertEquals($chunked[1],array("banana"));

		$chunked_2 = $obj->chunk($arr,2,false);
		$this->assertEquals($chunked_2[0],array("dog","cat"));
		$this->assertEquals($chunked_2[1],array("apple","banana"));

		$chunked = $obj->chunk($arr,3,true);
		$this->assertEquals($chunked[0],array("a"=>"dog","b"=>"cat","c"=>"apple"));
		$this->assertEquals($chunked[1],array("2"=>"banana"));

		$chunked_2 = $obj->chunk($arr,2,true);
		$this->assertEquals($chunked_2[0],array("a"=>"dog","b"=>"cat"));
		$this->assertEquals($chunked_2[1],array("c"=>"apple","2"=>"banana"));
	}
}