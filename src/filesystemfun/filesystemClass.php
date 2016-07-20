<?php 
namespace Znddzxx112\Filesystemfun;

/**
* filesystem
*/
class FilesystemClass
{
	
	public function base_name($path,$suffix)
	{
		return basename($path,$suffix);
	}

	/**
	 * 文件拷贝
	 * @param  [type] $source_path [description]
	 * @param  [type] $dest_path   [description]
	 * @return [type]              [description]
	 */
	public function copy_file($source_path,$dest_path)
	{
		return copy($source_path,$dest_path);
	}

	/**
	 * 获取文件目录
	 * @param  [type] $path [description]
	 * @return [type]       [description]
	 */
	public function get_dirname($path)
	{
		return dirname($path);
	}

	/**
	 * 改变文件所有组
	 * @param [type] $file  [description]
	 * @param [type] $group [description]
	 */
	public function set_grp($file,$group)
	{
		return chgrp($file,$group);
	}

	/**
	 * 改变文件所有者
	 * @param [type] $file [description]
	 * @param [type] $own  [description]
	 */
	public function set_own($file,$own)
	{
		return chown($file,$own);
	}

	/**
	 * 改变文件模式
	 * @param [type] $file [description]
	 * @param [type] $mod  [description]
	 */
	public function set_mod($file,$mod)
	{
		return chmod($file,$mod);
	}


}