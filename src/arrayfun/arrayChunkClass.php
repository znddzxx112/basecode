<?php 
namespace Znddzxx112\Arrayfun;

/**
* ArrayChunk
*/
class ArrayChunk
{
	
	public function chunk($arr = array(),$size , $preserve_key = false){
		return array_chunk($arr, $size, $preserve_key);
	}
}