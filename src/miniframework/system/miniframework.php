<?php if(defined(BASEPATH)) exit('no script');

/**
 * 加载常用函数
 */
require SYSPATH.'common.php';

/**
 * 错误处理函数
 */
set_error_handler("_error_handler");

/**
 * 加载配置文件
 */
include(SYSPATH.'config.php');
if( ! isset($config)){
	exit('config not exits');
}

/**
 * 加载路由类
 */
$RTR = load_class('router');

// /**
//  * 单例函数
//  */
// function &get_instance()
// {
// 	return '';
// }

// /**
//  * 加载性能类
//  */

// /**
//  * 实例化
//  */
// $class = $RTR->getClass();
// $method = $RTR->getMethod();
// include(SYSPATH.$class.'.php');
// $class_instance = new ucfirst($class)();

// /**
//  * 执行方法
//  */
// $class_instance->$method();


