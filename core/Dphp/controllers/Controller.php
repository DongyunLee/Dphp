<?php

/**
 * Controller.class.php - Dphp
 * User: lidongyun@shuwang-tech.com
 * Date: 2017/8/30
 */

namespace Controllers;

use ErrorException;
use Models\EloquentModel;
use Views\View;

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

    /**
     * 连接数据库
     * @return object
     */
    public function dMol()
    {
        $model = new EloquentModel();
        return $model->dMol();
    }

    /**
     * @param $action
     * @param $params
     * @throws ErrorException
     */
    public function __call($action, $params)
    {
        if (DEBUG) {
            throw new ErrorException('访问的方法' . $action . '不存在！');
        } else {
            \notFound();
        }

    }

    /**
     * 渲染视图
     * @param string $html
     * @return void
     * @throws ErrorException
     */
    protected function display($html = '')
    {
        $route = $_SESSION['route'];
        $html = empty($html) ? $route['class'] . '/' . $route['action'] : $html;
        $templete = strtolower($html);
        View::display($templete);
    }

    /**
     * 绑定变量
     * @param string|array $name 当$params为空时可以是值
     * @param mixed $params
     * @return void
     */
    protected function assign($name, $params = '')
    {
        $params = empty($params) ? $name : $params;
        View::assign($name, $params);
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
