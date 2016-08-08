<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/**
* loader
*/
class Loader
{

	/**
	 * 加载 service
	 * @param  string $service [description]
	 * @return [type]          [description]
	 */
	public function service($service = '')
	{
		if( ! file_exists(BASEPATH.'service/'.$service.'.php')){
			show_error('service : '.$service.' not exists');
		}

		require SYSPATH . 'service.php';

		$ci =& get_instance();
		$ci->$service = load_class($service ,BASEPATH.'/service/');
	}

}