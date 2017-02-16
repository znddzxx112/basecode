<?php 

require __dir__.'/../../vendor/autoload.php';
// require __dir__.'/../../src/simplexmlfun/simpleXmlClass.php';
require __dir__."/../../src/autoload.php";

/**
* SimplexmlClass
*/
class SimpleXmlClassTest extends PHPUnit_Framework_TestCase
{
	
	function __construct()
	{
		# code...
	}

	public function test_asxml()
	{
		$obj = new \Znddzxx112\simplexmlfun\SimpleXmlClass();
		$str = "<?xml version='1.0'?> 
				<document>
				 <title>Forty What?</title>
				 <from>Joe</from>
				 <to>Jane</to>
				 <body>
				  I know that's the answer -- but what's the question?
				 </body>
				</document>";
		$obj->load_string($str);
		echo $obj->asXML();
	}

	public function test_getAttributes()
	{
		$obj = new \Znddzxx112\simplexmlfun\SimpleXmlClass();
		$str = "<?xml version='1.0'?> 
				<document>
				 <title>Forty What?</title>
				 <from>Joe</from>
				 <to>Jane</to>
				 <body>
				  I know that's the answer -- but what's the question?
				 </body>
				</document>";
		$obj->load_string($str);
		var_dump($obj->getAttributes());
	}

	public function test_getChildren($value='')
	{
		$obj = new \Znddzxx112\simplexmlfun\SimpleXmlClass();
		$str = "<?xml version='1.0'?> 
				<document>
				 <title>Forty What?</title>
				 <from>Joe</from>
				 <to>Jane</to>
				 <body>
				  I know that's the answer -- but what's the question?
				 </body>
				</document>";
		$obj->load_string($str);
		var_dump($obj->getChildren());
	}

	public function test_getCount($value='')
	{
		$obj = new \Znddzxx112\simplexmlfun\SimpleXmlClass();
		$str = "<?xml version='1.0'?> 
				<document>
				 <title>Forty What?</title>
				 <from>Joe</from>
				 <to>Jane</to>
				 <body>
				  I know that's the answer -- but what's the question?
				 </body>
				</document>";
		$obj->load_string($str);
		var_dump($obj->getCount());
	}

	public function test_addChild($value='')
	{
		$obj = new \Znddzxx112\simplexmlfun\SimpleXmlClass();
		$str = "<?xml version='1.0'?> 
				<document>
				 <title>Forty What?</title>
				 <from>Joe</from>
				 <to>Jane</to>
				 <body>
				  I know that's the answer -- but what's the question?
				 </body>
				</document>";
		$obj->load_string($str);
		var_dump($obj->addChild("hello","xml"));
		var_dump($obj->getChildren());
	}

	public function test_addAttr($value='')
	{
		$obj = new \Znddzxx112\simplexmlfun\SimpleXmlClass();
		$str = "<?xml version='1.0'?> 
				<document>
				 <title>Forty What?</title>
				 <from>Joe</from>
				 <to>Jane</to>
				 <body>
				  I know that's the answer -- but what's the question?
				 </body>
				</document>";
		$obj->load_string($str);
		$obj->addAttr("helloatrr","fooatrr");
		var_dump($obj->getAttributes());
		echo $obj->asXML();
	}

	public function test_load_file($value='')
	{
		$obj = new \Znddzxx112\simplexmlfun\SimpleXmlClass();
		$file_path = __dir__."/xmltest.xml";
		if(file_exists($file_path)){
			$obj->load_file($file_path);
			var_dump($obj->getChildren());
		}
	}
}