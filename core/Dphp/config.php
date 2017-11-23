<?php

/**
 * 核心配置文件
 * Core\config.php - Dphp
 * User: lidongyun@shuwang-tech.com
 * Date: 2017/8/30
 */
$config = require_once CONF . '/config.php';
$config['db'] = require_once CONF . '/db.php';
$config['waf'] = require_once CONF . '/waf.php';

define('DEBUG', $config['DEBUG']);
if (!DEBUG)
    error_reporting(0);
if ($config['SESS_STATE'])
    session_start();
if(!DEBUG)
    set_error_handler("notFound");
