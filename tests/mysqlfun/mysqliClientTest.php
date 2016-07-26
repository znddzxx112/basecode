<?php 
require __dir__.'/../../vendor/autoload.php';

require __dir__.'/../../src/mysqlfun/mysqliClient.php';


/**
* mysqliclient
* 
* sql:
* CREATE DATABASE `caocms`
* CREATE TABLE `b_user` (
*  `id` int(10) NOT NULL AUTO_INCREMENT,
*  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '用户名',
*  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '邮箱地址',
*  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '用户密码',
*  `real_verified` tinyint(1) unsigned zerofill NOT NULL COMMENT '未实名认证',
*  `truename` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '真实姓名',
*  `email_virified` tinyint(1) unsigned zerofill NOT NULL COMMENT '未邮箱认证',
*  `mobile` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '手机号码',
*  PRIMARY KEY (`id`)
*) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci
*/
class MysqliClientTest extends PHPUnit_Framework_TestCase
{
	
	public function test_exec_select()
	{
		$obj = \Znddzxx112\Mysqlfun\Mysqlipool::get_instance("p:127.0.0.1", "root", "", "caocms", 3306);
		echo $obj->client_id;
		$result_array = $obj->exec("100101", "select * from `b_user` where `username` = ?", array("s","bitcao123"));
		if($result_array === false){
			$this->fail();
		} else {
			$this->assertNotEmpty($result_array);
		}
	}

	public function test_exec_insert()
	{
		$obj = \Znddzxx112\Mysqlfun\Mysqlipool::get_instance("127.0.0.1", "root", "", "caocms", 3306);
		$result_array = $obj->exec("100201", "insert into `b_user`(`username`,`email`,`mobile`)values(?,?,?) " , 
								array("sss","bitcao321132","znddzxx112@163.com","18868803292")
							);
		echo $obj->client_id;
		if($result_array == false){
			$this->fail();
		} else {
			$this->assertNotEmpty($result_array);
		}
	}



	public function test_exec_delete()
	{
		$obj = \Znddzxx112\Mysqlfun\Mysqlipool::get_instance("127.0.0.1", "root", "", "caocms", 3306);
		$result_array = $obj->exec("100401", "delete from `b_user` where `mobile` = ? and `username` = ?" , 
								array("ss","18868803292","bitcao321132")
							);
		echo $obj->client_id;
		if($result_array == false){
			$this->fail();
		} else {
			var_dump($result_array);
		}
	}
}