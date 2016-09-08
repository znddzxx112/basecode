<?php 
namespace Znddzxx112\Arrayfun;

/**
* array_combine
*/
class ArrayCombineClass
{
	/**
	 * 创建一个数组，用一个数组的值作为其键名，另一个数组的值作为其值 
	 * @param  array  $arr_key   [description]
	 * @param  array  $arr_value [description]
	 * @return [type]            [description]
	 */
	public function combine($arr_key = array(),$arr_value = array())
	{
		return array_combine($arr_key,$arr_value);
	}
}