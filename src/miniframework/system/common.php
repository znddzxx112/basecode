<?php if(defined(BASEPATH)) exit('no script');

/**
 * 类加载
 *
 * Function description
 *
 * @access	public
 * @param	type	name
 * @return	type	
 */
 
if (! function_exists('load_class'))
{
	function load_class($class = '')
	{
		static $classes;

		if(isset($classes[$class])){
			return $classes[$class];
		}

		if( ! file_exists(SYSPATH.$class.'.php')){
			exit($class . 'not exists');
		}

		require SYSPATH.$class.'.php';

		$classes[$class] = new ucfirst($class)();

		return $classes[$class];
	}
}


/**
 * Function Name
 *
 * Function description
 *
 * @access	public
 * @param	type	name
 * @return	type	
 */
 
if (! function_exists('_error_handler'))
{
	function _error_handler($errno, $errstr, $errfile, $errline)
	{
		if (!(error_reporting() & $errno)) {
	        // This error code is not included in error_reporting
	        return;
	    }

	    switch ($errno) {
	    case E_USER_ERROR:
	        echo "<b>My ERROR</b> [$errno] $errstr<br />\n";
	        echo "  Fatal error on line $errline in file $errfile";
	        echo ", PHP " . PHP_VERSION . " (" . PHP_OS . ")<br />\n";
	        echo "Aborting...<br />\n";
	        exit(1);
	        break;

	    case E_USER_WARNING:
	        echo "<b>My WARNING</b> [$errno] $errstr<br />\n";
	        break;

	    case E_USER_NOTICE:
	        echo "<b>My NOTICE</b> [$errno] $errstr<br />\n";
	        break;

	    default:
	        echo "Unknown error type: [$errno] $errstr<br />\n";
	        break;
	    }

	    /* Don't execute PHP internal error handler */
	    return true;
	}
}
