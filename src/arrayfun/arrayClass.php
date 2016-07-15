<?php 
namespace Znddzxx112\ArrayFun;

/**
* Array
*/
class ArrayClass
{
	function __construct(){

	}

	public function create_array(){
		$arr = array("a"=>"dog","b"=>"cat");
		return $arr;
	}

	public function create_array_two(){
		$arr = array();
		$arr['a'] = "dog";
		$arr['b'] = "cat";
		return $arr;
	}

	public function create_array_three(){
		$arr = array("dog","cat");
		return $arr;
	}

	public function create_array_four(){
		$arr = array();
		$arr[] = "dog";
		$arr[] = "cat";
		return $arr;
	}
}
