<?php 
require __dir__.'/../../vendor/autoload.php';

// require __dir__.'/../../src/mysqlfun/mysqlClass.php';

require __dir__."/../../src/autoload.php";

class MysqlClassTestl extends PHPUnit_Framework_TestCase
{

	// public function test_executeSQL_select()
	// {
	// 	$obj = new \Znddzxx112\Mysqlfun\MysqlClass("127.0.0.1","3306", "root", "");
	// 	$obj->select_db("caocms");
	// 	$obj->executeSQL("select * from `b_user`");	
	// 	$result_arr = $obj->get_arrayresult();
	// 	$this->assertTrue(count($result_arr)>0);
	// }

	// public function test_executeSQL_select_one()
	// {
	// 	$obj = new \Znddzxx112\Mysqlfun\MysqlClass("127.0.0.1","3306", "root", "");
	// 	$obj->select_db("caocms");
	// 	$obj->executeSQL("select * from `b_user` limit 1");
	// 	$result_arr = $obj->get_arrayresult();
	// 	$this->assertTrue(count($result_arr)>0);
	// }

	// public function test_executeSQL_insert()
	// {
	// 	$obj = new \Znddzxx112\Mysqlfun\MysqlClass("127.0.0.1","3306", "root", "");
	// 	$obj->select_db("caocms");
	// 	$obj->executeSQL("update `b_page` set `title`='hellobaby' where `uniqueid`='helloboy'");
	// 	$this->assertTrue($obj->get_affected()>=0);
	// }

	public function test_exec()
	{
		$obj = new \Znddzxx112\mysqlfun\MysqlClass("127.0.0.1","3306", "root", "");
		$obj->select_db("caocms");
		$result = $obj->exec('100120', "select * from `b_user` where `username` = {:1} and `id` = {:2}", array("bitcao123", 2), array("string", "integer"));
		if($result == false){
			print_r($obj->get_error_info());
		} else {
			print_r($result);
		}
		
	}


}