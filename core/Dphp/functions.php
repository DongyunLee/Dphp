<?php

/**
 * 主方法文件
 * functions.php - Dphp
 * User: lidongyun@shuwang-tech.com
 * Date: 2017/8/30
 */
class DFun
{

    public function dump($params)
    {
        if (is_array($params) || is_object($params)) {
            echo '<pre>';
            var_dump($params);
            echo '</pre>';
        } else {
            var_dump($params);
        }
    }

}

$dfun = new DFun;
$GLOBALS['dfun'] = $dfun;
