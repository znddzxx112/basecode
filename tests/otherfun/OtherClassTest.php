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
}
