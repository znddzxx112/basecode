<?php 
require __dir__.'/../../vendor/autoload.php';

require __dir__.'/../../src/datefun/dateClass.php';

/**
* date
*/
class DateClassTest extends PHPUnit_Framework_TestCase
{
	
	public function test_sunrise()
	{
		date_default_timezone_set("Asia/shanghai");
		$obj = new \Znddzxx112\Datefun\DateClass();
		$timestamp = mktime(0,0,0,7,18,2016);//2016-7-18 0:0:0
		//杭州30.26,120.19 日出时间 05:09:39
		$rise_time = $obj->sunrise($timestamp,SUNFUNCS_RET_STRING);
		$this->assertEquals('05:09',$rise_time);

		//时间戳
		$rise_timestamp = mktime(5,9,39,7,18,2016);//2016-7-18 5:9:29
		$rise_time_timestamp = $obj->sunrise($timestamp, SUNFUNCS_RET_TIMESTAMP);
		$this->assertEquals($rise_timestamp,$rise_time_timestamp);
	}

	public function test_sunset()
	{
		date_default_timezone_set("Asia/Shanghai");
		$obj = new \Znddzxx112\Datefun\DateClass();
		$timestamp = mktime(0,0,0,7,18,2016);//2016-7-18 0:0:0
		$set_time = $obj->sunset($timestamp,SUNFUNCS_RET_STRING);
		//杭州30.26,120.19 日落时间 19:01
		$this->assertEquals('19:01',$set_time);

		//时间戳
		$set_timestamp = mktime(19,1,22,7,18,2016);//2016-7-18 19:01:22;
		$set_time_timestamp = $obj->sunset($timestamp, SUNFUNCS_RET_TIMESTAMP);
		$this->assertEquals($set_timestamp,$set_time_timestamp);
	}

	public function test_get_date()
	{
		$timestamp = mktime(17,56,03,7,18,2016);
		$obj = new \Znddzxx112\Datefun\DateClass();
		$details_arr = $obj->get_date($timestamp);
		$this->assertEquals(array('to_string'=>'2016-07-18 17:56:03','detail'=>array('seconds'=>3,'minutes'=>56,'hours'=>17,'mday'=>18,'wday'=>1,'mon'=>7,'yday'=>199,'year'=>2016,'weekday'=>'Monday','month'=>'July',0=>1468835763)),$details_arr);
	}

	public function test_get_timeofday()
	{
		$obj = new \Znddzxx112\Datefun\DateClass();
		$timedetail = $obj->get_timeofday();
		list($usec,$sec) = $obj->get_microtime();
		$this->assertEquals($sec,$timedetail['sec']);
	}

}