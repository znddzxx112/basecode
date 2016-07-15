<?php 
namespace Znddzxx112\Datefun;

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