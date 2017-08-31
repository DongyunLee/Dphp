<?php

/**
 * \HomeController
 * HomeController.class.php - Dphp
 *
 * User: lidongyun@shuwang-tech.com
 * Date: 2017/8/30
 */

class HomeController extends Controller
{
    public function __construct() {
        parent::__construct();
        echo "<h1 style='text-align:center'>Hello,DoyleafPHP!</h1>";
    }

    public function actionIndex()
    {
        echo "hello,Dphp!";
        $result = Model::connection();
        require_once(dirname(__DIR__)."/views/index.php");
    }
}
