<?php 

require "../../vendor/autoload.php";


require __dir__."/../../src/otherfun/otherClass.php";

use \Znddzxx112\Otherfun\OtherClass;

/**
* 
*/
class OtherClassTest extends PHPUnit_Framework_TestCase
{
	
	public function test_quote()
	{
		$otherClass = new OtherClass();
		$count = $otherClass->quote();
		$this->assertEquals($count, 1);
		$count = $otherClass->quote();
		$this->assertEquals($count, 2);
		$count = 10;
		$count = $otherClass->quote();
		$this->assertEquals($count, 3);
		$q_count =& $otherClass->quote();
		$q_count = 15;
		$count = $otherClass->quote();
		$this->assertEquals($count, 16);
	}

	public function test_heredoc()
	{
		$otherClass = new OtherClass();
		$html = $otherClass->heredoc();
		var_dump($html);
	}

	public function test_get()
	{
		$otherClass = new OtherClass();
		// var_dump($otherClass->foo);
		$this->assertEquals($otherClass->foo,'bar');
		// echo $otherClass->foo;
	}

	public function test_set()
	{
		$otherClass = new OtherClass();
		$otherClass->foo = 'barset';
		$this->assertEquals($otherClass->foo,'barset');
	}

	public function test_call()
	{
		$otherClass = new OtherClass();
		// var_dump($otherClass->foofun('hello'));
		$this->assertEquals($otherClass->foofun('hello'),'sayhello');
	}

	public function test_clone()
	{
		$otherClass = new OtherClass();
	}

	public function test_autoload()
	{
		OtherClass::autoload();
		$mathobj = new \Znddzxx112\Mathfun\MathClass();
	}

	public function test_aautoload()
	{
		$Otherobj = new OtherClass();
		$Otherobj->aload();
		$mathobj = new \Znddzxx112\Mathfun\MathClass();
	}

}
