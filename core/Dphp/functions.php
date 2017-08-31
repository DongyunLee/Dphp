<?php

/**
 * 主方法文件
 * functions.php - Dphp
 * User: lidongyun@shuwang-tech.com
 * Date: 2017/8/30
 */

class DFun
{
    public function __construct()
    {
    }

    public function dump($params)
    {
        echo '<pre>';
        var_dump($params);
        echo '</pre>';
    }
}

 $dfun = new DFun;
 $GLOBALS['dfun'] = $dfun;
