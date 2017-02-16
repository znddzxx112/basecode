<?php 
namespace Znddzxx112;
/**
 * 外部入口
 */
class Autoload
{
	
	private static $loadedPath = array();

	public static function init()
	{
		//自动注册
		spl_autoload_register('self::loadPaths', true, true);
		//命名空间alias
		self::loadClasses();
	}

	public static function loadPaths($class)
	{

		$pathAlias = self::getPathAlias();
		foreach ($pathAlias as $namespace => $filepath) {
			if(isset(self::$loadedPath[$class]) && $loadedPath[$class] ==true){
				continue;
			}
			$real_class = str_replace($namespace, $filepath, $class);
			$real_class = str_replace("\\", "/", $real_class);
			if(file_exists($real_class.'.php'))
			{
				require $real_class.'.php';
				self::$loadedPath[$class] = true;
			}
		}

	}

	public static function loadClasses()
	{
		$classesAlias = self::getClassAlias();
		foreach ($classesAlias as $usename => $realname) {
			class_alias($realname, $usename);
		}
	}

	private static function getPathAlias()
	{
		return array(
				"Znddzxx112\\"=>__dir__ . "/",
			);
	}

	private static function getClassAlias()
	{
		return array(
				"Singleton" => "Znddzxx112\\Designpatten\\Singleton",
				"OtherClass" => "Znddzxx112\\Otherfun\\OtherClass"
			);
	}
}

Autoload::init();