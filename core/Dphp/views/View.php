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
     * @param   string    $templete   模板名
     * @param   string    $app        应用名
     * @return  void
     */
    public static function display($templete, $app='index')
    {
        // 读取自定义的模板文件
        $handle = APP.'/'.$app.'/view/'.$templete.'.html';
        $assets_handle = \dirname($handle);
        if (!file_exists($handle)) {
            throw new \ErrorException("模板文件不存在", 301);
            exit();
        }
        $templeteContent = htmlspecialchars(file_get_contents($handle));
        $tempConReplace = $templeteContent;

        // 绑定变量
        foreach (self::$params as $key => $value) {
            $tempConReplace = str_replace('{$'.$key.'}', $value, $tempConReplace);
        }
        $assets = [
            'js/','css/','img/','fonts/'
        ];
        $route = $_SESSION['route'];
        foreach ($assets as $key => $value) {
            $tempConReplace = str_replace($value,$assets_handle.'/'.$value,$tempConReplace);
        }
        $tempConReplace_new = htmlspecialchars_decode($tempConReplace);

        // 写入缓存文件
        $cache_fileName = CACHE."/{$app}/{$templete}.html";
        $cache_dir = dirname($cache_fileName);
        if (!file_exists($cache_dir)){
            mkdir ($cache_dir,0777,true);
        }
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
