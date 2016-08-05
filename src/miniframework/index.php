<?php 
if(preg_match("/^127./", $_SERVER['REMOTE_ADDR'])) exit('升级维护');
/**
 * mini框架
 */

/**
 * 环境定义
 */
define(ENV, 'development');

switch (ENV) {
case 'development':
	error_reporting(E_ALL);
	break;
case 'testing':
	error_reporting(E_ALL & ~E_NOTICE & ~E_ERROR & ~E_WARNING & ~E_PARSE);
	break;
case 'production':
	error_reporting(-1);
	break;
}

/**
 * 常量定义
 */
define(BASEPATH ,__dir__.'/');

define(SYSPATH ,__dir__.'/system/');

define(APPPATH ,__dir__.'/application/');

header("Content:text/html;Charset=utf-8");

require SYSPATH.'/miniframework.php';

