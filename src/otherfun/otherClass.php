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

	public function to_exit($mixed)
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
	
	/**
	 * 引用的变化
	 * @return [type] [description]
	 */
	public function &quote()
	{
		static $count = 0;
		$count ++;
		return $count;
	}

	/**
	 * header 404 写法
	 * @return [type] [description]
	 */
	public function to_header_404()
	{
		header('HTTP/1.0 404 Not Found');
	}

	/**
	 * header location 写法
	 * @return [type] [description]
	 */
	public function to_header_location()
	{
		header('Location: http://example.com/');
	}

	public function to_header_charset()
	{
		header('Content-Type:text/html;charset=utf-8');
	}

	/**
	 * pecl写法 EOF 顶格写，字符串拼接时不能使用 . 操作符
	 * @return [type] [description]
	 */
	public function heredoc()
	{
		$title = 'heredoc';
$html = <<<EOF
	<html>
   <head><title>$title</title></head>
   <body>主页内容</body>
   </html>
EOF;
		return $html;
	}

}