<?php 

require __dir__.'/../../vendor/autoload.php';

require __dir__.'/../../src/mathfun/mathClass.php';

/**
* mathClass
*/
class MathClassTest extends PHPUnit_Framework_TestCase
{
	
	public function test_make_abs()
	{
		$obj = new \Znddzxx112\Mathfun\MathClass();

		$num = -1.34;
		$abs_num = $obj->make_abs($num);
		$this->assertEquals(1.34,$abs_num);

	}

	public function test_todec()
	{
		$obj = new \Znddzxx112\Mathfun\MathClass();
		echo $obj->todec('g000', 16);
	}

	public function test_decto()
	{
		$obj = new \Znddzxx112\Mathfun\MathClass();
		echo $obj->decto(100,2);
	}
}