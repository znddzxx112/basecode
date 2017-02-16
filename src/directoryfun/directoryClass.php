<?php 
namespace Znddzxx112\directoryfun;

/**
* directory
* opendir
* readdir
* closedir
* $dir = dir()
* $dir->read()
* $dir->close()
*/
class DirectoryClass
{

	private $_dir_handle=null;

	public function __construct($directory='')
	{
		if($directory != ''){
			if(($dir_handle = opendir($directory)) !== false){
				$this->_dir_handle = $dir_handle;
			}
		}
	}	

	public function get_pwd()
	{
		return getcwd();
	}

	public function change_dir($directory)
	{
		return chdir($directory);
	}

	public function scan_dir($directory)
	{
		return scandir($directory);
	}

	public function read_dir()
	{
		if($this->_dir_handle==null){
			return false;
		}
		$dir_files = array();
		while(($file = readdir($this->_dir_handle))!=false){
			$dir_files[] = $file;
		}
		rewinddir($this->_dir_handle);
		return $dir_files;
	}

	public function dir_obj($directory='')
	{
		return dir($directory);
	}

	public function __destruct()
	{
		if($this->_dir_handle!=null){
			closedir($this->_dir_handle);
		}
	}

}

