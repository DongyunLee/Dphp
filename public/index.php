<?php

/**
 * 入口文件
 * Name: index.php-Dphp
 * User: lidongyun@shuwang-tech.com
 * Date: 2017/8/29
 */

define("ROOT", dirname(__DIR__));
define("VENDOR", ROOT.'/vendor');
define("CONF", ROOT.'/conf');

// 加载composer自动加载文件
require_once(VENDOR.'/autoload.php');
// 加载调用了fast-route的route配置文件
require_once(CONF.'/route.php');