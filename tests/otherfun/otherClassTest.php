<?php 

require __dir__ . '/../../vendor/autoload.php';

require __dir__ . '/../../src/otherfun/otherClass.php';

class OtherClassTest extends PHPUnit_Framework_TestCase
{

	public function test_to_fuhao()
	{
		$obj = new Znddzxx112\Otherfun\OtherClass();
		$num = 100;
		echo number_format(round($num / 100, 2, PHP_ROUND_HALF_EVEN), 2, '.', '');
	}



}