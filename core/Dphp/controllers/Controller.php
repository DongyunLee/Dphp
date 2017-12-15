<?php

/**
 * Controller.class.php - Dphp
 * User: lidongyun@shuwang-tech.com
 * Date: 2017/8/30
 */

namespace Controllers;

use Models\Model;

class Controller
{

    public $dMol;

    /**
     * 加载并初始化模型
     */
    public function __construct()
    {
        $this->dMol = $this->dMol();
    }

    public function __call($action, $params)
    {
        if (DEBUG) {
            throw new \ErrorException('访问的方法'.$action.'不存在！');
        } else {
            \notFound();
        }
        
    }

    /**
     * 连接数据库
     * @return void
     */
    public function dMol()
    {
        $model = new Model;
        return $model->dMol();
    }

    private function waf()
    {
        require_once '';
    }

    /**
     * 渲染视图
     * @param string $html
     * @param string $app
     * @return void
     */
    protected function display($html = '', $app = '')
    {
        $route = $_SESSION['route'];
        $html = empty($html)?$route['class'].'/'.$route['action']:$html;
        $app = empty($app) ? $route['app'] : $app ;
        $templete = strtolower($html);
        $app = ucfirst($app);
        \Views\View::display($templete, $app);
    }

    /**
     * 绑定变量
     * @param string $name      模板中的变量名
     * @param array  $name      当$params为空时可以是值
     * @param mixed  $params
     * @return void
     */
    protected function assign($name, $params = '')
    {
        $params = empty($params) ? $name : $params;
        \Views\View::assign($name, $params);
    }

    /**
     * 重定向
     * @param string $handler
     * @return void
     */
    protected function redirect(string $handler)
    {
        if (is_file($handler)) {
            header("Location:{$handler}");
        } else {
            header("Location:/errors/404.html");
        }
    }

}
