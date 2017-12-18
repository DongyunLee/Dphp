<?php

/**
 * 入口文件
 * Name: index.php-Dphp
 * User: lidongyun@shuwang-tech.com
 * Date: 2017/8/29
 */

// 定义常用位置
define('ROOT', str_replace('\\', '/', dirname(__DIR__)));
define("DPHP", ROOT . '/core/Dphp');

// 运行框架启动器
require_once DPHP . '/bootstrap.php';

// 加载调用了fast-route的route配置文件
require_once(DPHP . '/route.php');

// 加载WAF
// require_once(DPHP . '/waf.php');