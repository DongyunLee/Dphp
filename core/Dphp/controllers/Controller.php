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
    // public $dfun;
    public $dMol;

    public function __construct()
    {
        // $this->dfun = $GLOBALS['dfun'];
        $this->dMol = $this->dMol();
    }
    
    public function __call($action, $params)
    {
        header("Location:/errors/404.html");
    }

    /**
     * 连接数据库
     * @return void
     */
    public function dMol()
    {
        return Model::dMol();
    }

    /**
     * 渲染视图
     * @param string $html
     * @param string $app
     * @return void
     */
    protected function display($html='index',$app='index')
    {
        $templete = strtolower($html);
        $app = ucfirst($app);
        \Views\View::display($html,$app);
    }

    /**
     * 绑定变量
     * @param string $name      模板中的变量名
     * @param array  $name      当$params为空时可以是值
     * @param mixed  $params
     * @return void
     */
    protected function assign($name,$params='')
    {
        $params = empty($params) ? $name : $params ;
        \Views\View::assign($name,$params);
    }
    
    
}
