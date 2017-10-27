<?php

/**
 * 入口文件
 * Name: index.php-Dphp
 * User: lidongyun@shuwang-tech.com
 * Date: 2017/8/29
 */
// 调试模式开关
define('DEBUG', true);

// 定义常用位置
define("ROOT", dirname(__DIR__));

define("CONF", ROOT . '/config');
define('CORE', ROOT . '/core');
define("VENDOR", CORE . '/vendor');
define("DPHP", CORE . '/Dphp');

// 加载composer自动加载文件
require_once(VENDOR . '/autoload.php');

// 加载配置文件
require_once(CONF . '/config.php');

//  加载主方法库
require_once(DPHP . '/functions.php');

// 加载调用了fast-route的route配置文件
require_once(CONF . '/route.php');
