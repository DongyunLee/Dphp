<?php

/**
 * 主函数库
 * functions.php - Dphp
 * User: lidongyun@shuwang-tech.com
 * Date: 2017/8/30
 */

/**
 * 打印输出，有类型输出
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

/**
 * 打印输出,无类型输出
 * @param mixed $params
 * @return void
 */
/*function dd($params)
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
}*/

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

/**
 * 不存在时的错误处理
 * @return void
 */
function notFound($errno=TRUE, $errstr=TRUE)
{
    header("Location:/errors/404.html");
}

/**
 * 彻底清空session
 * @return void
 */
function cleanSession()
{
    // 初始化session.
    session_start();
    /*** 删除所有的session变量..也可用unset($_SESSION[xxx])逐个删除。****/
    $_SESSION = array();
    /***删除sessin id.由于session默认是基于cookie的，所以使用setcookie删除包含session id的cookie.***/
    if (isset($_COOKIE[session_name()])) {
        setcookie(session_name(), '', time()-42000, '/');
    }
    // 最后彻底销毁session.
    session_destroy();
}
