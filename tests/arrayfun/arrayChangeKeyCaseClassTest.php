<?php 
require "../../vendor/autoload.php";

require __dir__."/../../src/arrayfun/arrayChangeKeyCaseClass.php";

class ArrayChangeKeyCaseClassTest extends PHPUnit_Framework_TestCase
{
	
	public function test_change_array_key()
	{
		$obj = new \Znddzxx112\ArrayFun\ArrayChangeKeyCaseClass();
		
		$arr_lower = $obj->change_array_key(array('aA'=>'dog','b'=>"cat"),CASE_LOWER);
		$this->assertEquals($arr_lower,array('aa'=>'dog','b'=>'cat'));

		$arr_upper = $obj->change_array_key(array('aa'=>'dog','b'=>"cat"),CASE_UPPER);
		$this->assertEquals($arr_upper,array('AA'=>'dog','B'=>'cat'));
	}


}