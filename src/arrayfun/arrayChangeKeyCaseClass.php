<?php 
namespace Znddzxx112\ArrayFun;

/**
* array_change_key_case
*/
class ArrayChangeKeyCaseClass
{
	/**
	 * change_array_key
	 * @param  array  $arr
	 * @param  string $case CASE_LOWER CASE_UPPER
	 * @return arr
	 */
	public function change_array_key($arr = array() ,$case = CASE_LOWER){
		// $arr = array('a'=>'dog','b'=>"cat");
		$change_arr = array_change_key_case($arr,$case);
		return $change_arr;
	}
}
