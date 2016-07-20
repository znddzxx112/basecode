<?php 
require __dir__.'/../../vendor/autoload.php';

require __dir__.'/../../src/filterfun/filterClass.php';

/**
* filterClass
*/
class filterClassTest extends PHPUnit_Framework_TestCase
{
	
	public function test_get_filter_list()
	{
		$obj = new \Znddzxx112\Filterfun\FilterClass();
		$filter_arr = $obj->get_filter_list();
		$filter_arr_stand = array("int", "boolean", "float", "validate_regexp", "validate_url",
								"validate_email", "validate_ip", "validate_mac", "string", "stripped",
								"encoded","special_chars","full_special_chars","unsafe_raw","email","url",
								"number_int","number_float","magic_quotes","callback");
		$this->assertEquals($filter_arr_stand,$filter_arr);
	}
}