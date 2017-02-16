<?php 

namespace \Znddzxx112\Otherfun;

/**
* 鹰
* 组合,单例模式
*/
class YingClass 
{
	private $_FlyClass;

	function __construct()
	{

	}

	public function fly(){
		$this->_FlyClass->fly();
	}

	public function setFlyClass($FlyClass){
		$this->_FlyClass = $FlyClass;
	}

}

/**
 * 组合的典型:
 * 导出有多个选择，可以是图片，word，xml，html ...
 * 图片，word，xml，html ... 类实现同一个接口：output()方法
 * 导出类 有一个私有变量 $outputClass,根据选择 图片，word，xml，html ... 类
 * 导出类执行方法 $this->outputClass->output();
 * 组合适用于 存在多个选择，每个选择细节不一样，方法一样
 */