<?php 

namespace Znddzxx112\Simplexmlfun;

/**
* simplexml
*/
class SimpleXmlClass
{

	private $xmlelement = null;

	public function __construct()
	{

	}

	public function load_file($file_path='')
	{
		if($file_path == '') return false;
		$this->xmlelement = simplexml_load_file($file_path);
		return true;
	}

	public function load_string($str = '')
	{
		$this->xmlelement = simplexml_load_string($str);
	}

	/**
	 * to xml
	 * @return boolean|string 
	 */
	public function asXML()
	{
		if($this->xmlelement == null) return false;
		return $this->xmlelement->asXML();
	}

	/**
	 * 增加属性
	 * @param string $name [description]
	 * @param string $key  [description]
	 */
	public function addAttr($name = '', $value = '')
	{
		$this->xmlelement->addAttribute($name, $value);
		return $this;
	}

	public function addChild($name, $value)
	{
		$this->xmlelement->addChild($name, $value);
		return $this;
	}

	public function getAttributes()
	{
		return $this->xmlelement->attributes();
	}

	public function getChildren()
	{
		return $this->xmlelement->children();
	}

	/**
	 * child数量
	 * @param  string $value [description]
	 * @return [type]        [description]
	 */
	public function getCount($value='')
	{
		return $this->xmlelement->count();
	}

	/**
	 * runs xpath query
	 * @param  string $path [description]
	 * @return [type]       [description]
	 */
	public function xpath($path='')
	{
		return $this->xmlelement->xpath($path);
	}

}