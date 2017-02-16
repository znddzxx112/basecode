<?php 
namespace Znddzxx112\arrayfun;

/**
* Array
*/
class ArrayClass
{
	function __construct(){

	}

	/**
	 * 函数赋值四种方式
	 * @return [type] [description]
	 */
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

	/**
	 * 统计数组值的次数
	 * @param  array  $input [description]
	 * @return array ['value1'=>counts1, 'value2'=>counts2, ...]
	 */
	public function count_values($input = array())
	{
		return array_count_values($input);
	}

	/**
	 * 返回array1 key=>value 不存在于array2的值
	 * @param  array  $array1 [description]
	 * @param  array  $array2 [description]
	 * @return [type]         [description]
	 */
	public function diff_assoc($array1 = array(), $array2 = array())
	{
		return array_diff_assoc($array1, $array2);
	}

}
