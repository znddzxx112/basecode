<?php 
require __dir__.'/../../vendor/autoload.php';

require __dir__.'/../../src/stringfun/stringClass.php';


/**
* string
*/
class StringClassTest extends PHPUnit_Framework_TestCase	
{
	
	public function test_add_cslashes()
	{
		$obj = new \Znddzxx112\Stringfun\StringClass();
		$cs_string = $obj->add_cslashes("my name is' znddzxx112",'mi\'');
		$this->assertEquals("\my na\me \is\' znddzxx112", $cs_string);
	}

	public function test_add_slashes()
	{
		$obj = new \Znddzxx112\Stringfun\StringClass();
		$s_string = $obj->add_slashes("my name is' znddzxx112");
		$this->assertEquals("my name is\' znddzxx112", $s_string);
	}

	public function test_to_hex()
	{
		$obj = new \Znddzxx112\Stringfun\StringClass();
		$str = 'Hello';
		$hex_str = $obj->to_hex($str);
		$this->assertEquals($str,pack("H*",$hex_str));
	}

	public function test_to_chop()
	{
		$obj = new \Znddzxx112\Stringfun\StringClass();
		$string = "Hello world!\r\n";
		$chop_string = $obj->to_chop($string);
		$this->assertEquals("Hello world!",$chop_string);

		$chop_string = $obj->to_chop($string,"\r\n!");
		$this->assertEquals("Hello world",$chop_string);
	}
}