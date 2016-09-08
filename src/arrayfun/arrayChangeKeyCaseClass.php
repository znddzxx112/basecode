<?php 
namespace Znddzxx112\ArrayFun;

/**
* array_change_key_case
*/
class ArrayChangeKeyCaseClass
{
	/**
	 * 返回字符串键名全为小写或大写的数组
	 * @param  array  $arr
	 * @param  string $case CASE_LOWER CASE_UPPER
	 * @return arr
	 */
	public function change_array_key($arr = array() ,$case = CASE_LOWER){
		// $arr = array('a'=>'dog','b'=>"cat");
		$change_arr = array_change_key_case($arr,$case);
		// $arr = array('A'=>'dog','B'=>"cat"); if case = CASE_UPPER
		return $change_arr;
	}
}
