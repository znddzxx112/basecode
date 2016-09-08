<?php 
namespace Znddzxx112\Arrayfun;

/**
* ArrayChunk
*/
class ArrayChunk
{
	/**
	 * 将一个数组分割成多个
	 * @param  array   $arr          [description]
	 * @param  [type]  $size         [description]
	 * @param  boolean $preserve_key [description]
	 * @return [type]                [description]
	 */
	public function chunk($arr = array(), $size, $preserve_key = false){
		return array_chunk($arr, $size, $preserve_key);
	}
}