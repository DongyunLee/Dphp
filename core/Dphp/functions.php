<?php

/**
 * 主函数库
 * functions.php - Dphp
 * User: lidongyun@shuwang-tech.com
 * Date: 2017/8/30
 */

/**
 * 打印输出
 * @param mixed $params
 * @return void
 */
function dump($params)
{
    echo '<div style="background:lightblue;">';
    if (is_array($params) || is_object($params)) {
        echo '<pre>';
        var_dump($params);
        echo '</pre>';
    } else {
        var_dump($params);
    }
    echo '</div>';
    echo "<hr/>";
}

function dd($params)
{
    echo '<hr />';
    echo '<div style="background:lightblue;text-align:center;width:50%;margin:0 auto">';
    if (is_array($params) || is_object($params)) {
        foreach ($params as $value) {
            dd($value);
        }
    } elseif (is_null($params)) {
        echo 'Null';
    } else {
        echo $params;
    }
    echo '</div>';
    echo '<hr />';
}

/**
 * 获取变量定义时的变量名
 * @param mixed  $var
 * @param mixed  $scope
 * @return void
 */
function get_variable_name(&$var, $scope = NULL)
{
    if (NULL == $scope) {
        $scope = $GLOBALS;
    }
    $tmp = $var;
    $var = "tmp_exists_" . mt_rand();
    $name = array_search($var, $scope, TRUE);
    $var = $tmp;
    return $name;
}

// $dfun = new DFun;
// $GLOBALS['dfun'] = $dfun;
