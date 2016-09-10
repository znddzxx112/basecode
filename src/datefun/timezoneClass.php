<?php 
namespace Znddzxx112\datefun;

/**
* timezone
*/
class TimezoneClass
{
	
	public function get_timezone(){
		return date_default_timezone_get();
	}

	public function set_timezone($timezone){
		return date_default_timezone_set($timezone);
	}
}