<?php
namespace Znddzxx112\otherfun;

use Singleton;

/**
* other
*/
class OtherClass
{

	/**
	 * 使用trait(构件) 代码复用，解决多接口
	 */
	use Singleton;

	private $vars = array('foo'=>'bar');

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

	public function to_isset($a, $b)
	{
		return isset($a, $b);
	}

	public function to_fuhao()
	{
		return true == true ?: 1;
	}

	public function to_spl_object_hash($object)
	{
		// 返回object对象的 hash id
		return spl_object_hash($object);
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

	/**
	 * 与heredoc差别，引号，变量不起作用
	 * @return [type] [description]
	 */
	public function nowdoc()
	{
		$html = <<<'EOF'
		<html>
		   <head><title>$title</title></head>
		   <body>主页内容</body>
		   </html>
EOF;
		return $html;
	}

	/**
	 * session
	 * @return [type] [description]
	 */
	public function sess()
	{
		// session_start();
		// $_SESSION['foo'] = 'bar';
		// // session_destroy();
		// // echo $_SESSION['foo'] ;
		// echo session_name();
		// echo session_id();
		// echo session_cache_expire();
	}

	public function parse_url($url)
	{
		$url = 'http://dummy.com/'.$url;
		return parse_url($url);
	}

	public function foofun_api($args)
	{
		@list($word) = $args;
		return 'say'.$word;
	}

	public function __get($key)
	{
		return $this->vars[$key];
	}

	public function __set($key,$val)
	{
		$this->vars[$key] = $val;
	}

	public function __call($func_name, $args)
	{
		$func_name = $func_name.'_api';
		var_dump($args);
		return $this->$func_name($args);
	}

	public function __clone()
	{
		$this->foo = 'bar';
	}

	static public function getload($class){
		$prefix = dirname(__file__).'/../mathfun/';
		$class = substr($class,strrpos($class, '\\'));
		$file = $prefix .lcfirst($class).'.php';
		if(file_exists($file)){
			include $file;
		}
	}

	/**
	 * 自动加载一种方式
	 * @return [type] [description]
	 */
    static public function autoload()
    {
    	spl_autoload_register(__namespace__.'\OtherClass::getload');
    }

    public function agetload($class)
    {
    	$prefix = dirname(__file__).'/../mathfun/';
		$class = substr($class,strrpos($class, '\\'));
		$file = $prefix .lcfirst($class).'.php';
		if(file_exists($file)){
			include $file;
		}
    }

    /**
     * 自动加载第二种方式
     * @return [type] [description]
     */
    public function aload()
    {
    	spl_autoload_register(array($this,'agetload'));
    }

    /**
     * 抛出异常
     * @return [type] [description]
     */
    public function throwException()
    {
    	throw new \Znddzxx112\exceptionfun\OtherException("hello exception", 402);
    }
}
