<?php 
require __dir__.'/../../vendor/autoload.php';

require __dir__.'/../../src/mysqlfun/mysqliClient.php';


/**
* mysqliclient
*/
class MysqliClientTest extends PHPUnit_Framework_TestCase
{
	
	public function test_exec_select()
	{
		$obj = new \Znddzxx112\Mysqlfun\MysqliClient("127.0.0.1", "root", "", "caocms", 3306);
		$result_array = $obj->exec("100101", "select * from `b_user` where `username` = 'bitcao123'", array());
		var_dump($result_array);
	}

	public function test_exec_insert()
	{
		$obj = new \Znddzxx112\Mysqlfun\MysqliClient("127.0.0.1", "root", "", "caocms", 3306);
		$result_array = $obj->exec("100101", "insert into `b_user`(`username`,`email`,`mobile`)values(?,?,?) " , 
								array("sss","<b>bitcao321132</b>","znddzxx112@163.com","18868803292")
							);
		var_dump($result_array);
	}
}