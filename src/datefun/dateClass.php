<?php 
namespace Znddzxx112\Datefun;

/**
* date
*/
class DateClass
{
	/**
	 * 日升时间 默认杭州北纬30.26,东经120.19
	 * @param  [type] $timestamp [description]
	 * @param  [type] $format    SUNFUNCS_RET_STRING, SUNFUNCS_RET_TIMESTAMP
	 * @param  float  $latitude  [description]
	 * @param  float  $longitude [description]
	 * @return [type]            [description]
	 */
	public function sunrise($timestamp,$format = SUNFUNCS_RET_STRING,$latitude=30.26,$longitude=120.19)
	{
		return date_sunrise($timestamp ,$format ,$latitude ,$longitude);
	}

	/**
	 * 日落时间 默认杭州北纬30.26,东经120.19
	 * @param  [type] $timestamp [description]
	 * @param  [type] $format    [description]
	 * @param  float  $latitude  [description]
	 * @param  float  $longitude [description]
	 * @return [type]            [description]
	 */
	public function sunset($timestamp,$format = SUNFUNCS_RET_STRING, $latitude = 30.26, $longitude =120.19)
	{
		return date_sunset($timestamp ,$format ,$latitude ,$longitude);
	}

	/**
	 * date getdate 
	 * @param  [type] $timestamp [description]
	 * @return [type]            [description]
	 */
	public function get_date($timestamp)
	{
		return array('to_string'=>date('Y-m-d H:i:s',$timestamp),'detail'=>getdate($timestamp));
	}

	/**
	 * gettimeofday
	 * @return [type] [description]
	 */
	public function get_timeofday()
	{
		return gettimeofday();
	}

	public function get_microtime()
	{
		return explode(" ",microtime());
	}

	

}