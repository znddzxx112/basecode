<?php 

require __dir__ . '/../../vendor/autoload.php';

require __dir__ . '/../../src/mysqlfun/pdoClient.php';

/**
* pdoClientTest
*/
class PdoClientTest extends PHPUnit_Framework_TestCase
{
	
	public function test_where()
	{
		$obj = new \Znddzxx112\Mysqlfun\PdoClient();
		$obj->where("`user_id` = '1028'")
			->where("`product_id` = '1024'")
			->from("`product`");
		echo $obj->execQuery();
	}

	public function test_where_array()
	{
		$obj = new \Znddzxx112\Mysqlfun\PdoClient();
		$obj->where(array("user_id","product_id"),array(1028,1024))
			->from("product");
		echo $obj->execQuery();
	}

}