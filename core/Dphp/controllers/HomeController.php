<?php

/**
 * 前台控制器
 * controllers\HomeController
 * HomeController.class.php - Dphp
 *
 * User: lidongyun@shuwang-tech.com
 * Date: 2017/8/30
 */

namespace Controllers;

use Views\View;

class HomeController extends Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function actionIndex()
    {
        $sql = "SELECT * FROM foo";
        $result = $this->dMol->query($sql);
        $array = $result->fetchAll();
        foreach ($array as $key => $value) {
            dump($value);
        }
        echo '<code>' . __METHOD__ . '</code>';
    }

}
