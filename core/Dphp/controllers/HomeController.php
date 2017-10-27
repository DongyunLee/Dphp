<?php

/**
 * controllers\HomeController
 * HomeController.class.php - Dphp
 *
 * User: lidongyun@shuwang-tech.com
 * Date: 2017/8/30
 */

namespace Controllers;

use Models\Model;
use Views\View;

class HomeController extends Controller
{

    public function __construct()
    {
        parent::__construct();
        echo "<h1 style='text-align:center'>Hello,DoyleafPHP!</h1>";
        echo "<h2 style='text-align:center'>hello,dphp!</h2>";
    }

    public function actionIndex()
    {
        echo '<h3>' . __METHOD__ . '</h3>';
        $result = Model::dMol();
        $view = View::index();
    }

}
