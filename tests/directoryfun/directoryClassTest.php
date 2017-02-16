<?php 
require __dir__.'/../../vendor/autoload.php';

// require __dir__.'/../../src/directoryfun/directoryClass.php';
require __dir__."/../../src/autoload.php";

/**
* directoryClass
*/
class DirectoryClass extends PHPUnit_Framework_TestCase
{
	public function test_change_dir_pwd()
	{
		$obj = new \Znddzxx112\directoryfun\DirectoryClass();
		$cwd = $obj->get_pwd();
		$pos = strrpos($cwd, "\\");
		$dirname = ltrim(substr($cwd, $pos),"\\");
		$this->assertEquals("directoryfun",$dirname);
		$obj->change_dir("../datefun/");
		$cwd = $obj->get_pwd();
		$pos = strrpos($cwd, "\\");
		$dirname = ltrim(substr($cwd, $pos),"\\");
		$this->assertEquals("datefun",$dirname);
	}

	public function test_dir_fun()
	{
		$obj = new \Znddzxx112\directoryfun\DirectoryClass(__dir__);
		$dir_files = $obj->read_dir();
		$this->assertTrue(in_array("directoryClassTest.php", $dir_files));
	}

	public function test_dir_obj()
	{
		$obj = new \Znddzxx112\directoryfun\DirectoryClass();
		$odir = $obj->dir_obj(__dir__);
		$dir_files = array();
		while(( $file = $odir->read() ) != false){
			$dir_files[] = $file;
		}
		$odir->rewind();
		$odir->close();
		$this->assertTrue(in_array("directoryClassTest.php", $dir_files));
	}
	
	public function test_scan_dir()
	{
		$obj = new \Znddzxx112\directoryfun\DirectoryClass();
		$dir_files = $obj->scan_dir(__dir__);
		$this->assertTrue(in_array("directoryClassTest.php", $dir_files));
	}

}