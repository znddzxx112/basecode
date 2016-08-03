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
		\Znddzxx112\Mysqlfun\PdoClient::set_config('default', 'mysql:dbname=caocms;host=127.0.0.1', 'root', '');
		$obj = \Znddzxx112\Mysqlfun\PdoClient::get_instance('default');
		$obj->where("`mobile` = ?", '18868803292')
			->where("`username` = ?", 'bitcao123')
			->from("`b_user`");
		var_dump($obj->execQuery()) ;
	}

	public function test_where_array()
	{
		\Znddzxx112\Mysqlfun\PdoClient::set_config('where_array', 'mysql:dbname=caocms;host=127.0.0.1', 'root', '');
		$obj = \Znddzxx112\Mysqlfun\PdoClient::get_instance('where_array');
		$obj->where(array("mobile","username"),array('18868803292','bitcao123'))
			->from("b_user");
		var_dump($obj->execQuery()) ;
	}

}