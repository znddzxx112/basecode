<?php 
require __dir__.'/../../vendor/autoload.php';

require __dir__.'/../../src/calendarfun/calendarClass.php';

/**
* CalendarClassTest
*/
class CalendarClassTest extends PHPUnit_Framework_TestCase
{
	
	public function test_cal_days_in_month()
	{
		$obj = new \Znddzxx112\Calendarfun\CalendarClass();
		//2016 7 有31天
		$days = $obj->calDaysInMonth(7,2016);
		$this->assertEquals(31,$days);
	}

}