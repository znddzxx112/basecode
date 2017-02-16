<?php 
require __dir__.'/../../vendor/autoload.php';

// require __dir__.'/../../src/filesystemfun/filesystemClass.php';
require __dir__."/../../src/autoload.php";

/**
* filesystemClass
*/
class FilesystemClassTest extends PHPUnit_Framework_TestCase
{
	
	public function test_base_name()
	{
		$obj = new \Znddzxx112\filesystemfun\FilesystemClass();
		$class_file_name = $obj->base_name(__file__,"");
		$this->assertEquals("filesystemClassTest.php",$class_file_name);

		$class_file_name = $obj->base_name(__file__,"php");
		$this->assertEquals("filesystemClassTest.",$class_file_name);

		$class_file_name = $obj->base_name(__file__,".php");
		$this->assertEquals("filesystemClassTest",$class_file_name);
	}

	
}