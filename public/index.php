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
define("ROOT", str_replace('\\', '/', dirname(__DIR__)));

define("APP", ROOT . '/app');
define("CONF", ROOT . '/config');
define('CORE', ROOT . '/core');
define("VENDOR", CORE . '/vendor');
define("DPHP", CORE . '/Dphp');
define('PUB', ROOT . '/public');
define('CACHE', PUB . '/caches');

// 加载composer自动加载文件
require_once(VENDOR . '/autoload.php');

// 加载配置文件
require_once(DPHP . '/config.php');

// 加载调用了fast-route的route配置文件
require_once(DPHP . '/route.php');

// 加载WAF
require_once(DPHP . '/waf.php');