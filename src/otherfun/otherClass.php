<?php 
namespace Znddzxx112\Otherfun;

/**
* other
*/
class OtherClass
{
	
	public function to_sleep($seconds)
	{
		sleep($seconds);
	}

	public function to_die($string)
	{
		die($string);
	}

	public function to_exit($mixed);
	{
		exit($mixed);
	}

	public function to_uniqid()
	{
		return uniqid();
	}

	public function to_usleep($useconds)
	{
		return usleep($useconds);
	}

	/**
	 * 定义常量
	 * @param  [type] $key [description]
	 * @param  [type] $val [description]
	 * @return [type]      [description]
	 */
	public function to_define($key, $val)
	{
		define($key, $val);
	}

	/**
	 * 判断常量是否定义
	 * @param  [type] $key [description]
	 * @return [type]      [description]
	 */
	public function to_defined($key)
	{
		return defined($key);
	}

	/**
	 * 获取常量对应的值
	 * @param  [type] $key [description]
	 * @return [type]      [description]
	 */
	public function to_constant($key)
	{
		return constant($key);
	}

	// 数据装入一个二进制字符串
	// todo :pack
	
	// 从二进制字符串对数据进行解包
	// todo :unpack
}