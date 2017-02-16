<?php 
namespace Znddzxx112\datefun;

/**
* checkdate
*/
class CheckdateClass
{
	
	public function check($month, $day, $year)
	{
		return checkdate($month, $day, $year);
	}
}