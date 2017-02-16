<?php 

require __dir__ . '/../../vendor/autoload.php';

// require __dir__ . '/../../src/pagination/paginationClass.php';
require __dir__."/../../src/autoload.php";

class PaginationClassTest extends PHPUnit_Framework_TestCase
{
	public function test_create_links()
	{
		$obj = new \Znddzxx112\pagination\PaginationClass();

		$param = array(
				'total_num' => 16,
				'current_page' => 2,
				'base_url' => 'http:dummy/'
			);
		$obj->initialize($param);
		echo $obj->creat_links();
	}
}