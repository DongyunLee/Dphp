<?php

/**
 * 模型首页
 * index.php - Dphp
 * User: lidongyun@shuwang-tech.com
 * Date: 2017/8/30
 */

namespace Views;

class View
{
    public static $params = [];

    public function __construct()
    {
    }

    /**
     * 渲染视图
     * @param string 模板名
     * @param string 应用名
     * @return void
     */
    public static function display($templete, $app)
    {
        // echo "<h3>" . __METHOD__ . "</h3>";
        $templeteContent = htmlspecialchars(file_get_contents(APP.'/'.$app.'/view/'.$templete.'.html'));
        $tempConReplace = $templeteContent;
        // dump(self::$params);die;
        foreach (self::$params as $key => $value) {
            $tempConReplace = str_replace('{$'.$key.'}', $value, $tempConReplace);
        }
        $tempConReplace_new = htmlspecialchars_decode($tempConReplace);

        // $rand = time();
        // $cache_fileName = CACHE."/{$app}_{$templete}.html_{$rand}.php";
        $cache_fileName = CACHE."/{$app}_{$templete}.html";
        file_put_contents($cache_fileName,$tempConReplace_new);

        echo $tempConReplace_new;
    }

    /**
     * 绑定变量
     * @param mixed $name
     * @param mixed $params
     * @return void
     */
    public static function assign($name, $params)
    {
        if (is_array($params)) {
            self::$params = array_merge(self::$params, $params);
        } else {
            self::$params[$name] = $params;
        }
        return self::$params;
    }
}
