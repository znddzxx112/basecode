<?php 
namespace Znddzxx112\Calendarfun;

/**
* CalendarClass
*/
class CalendarClass
{
	
	public function calDaysInMonth($month,$year)
	{
		return cal_days_in_month(CAL_GREGORIAN, $month, $year);
	}
}