<?php

namespace App\Index\controller;

use Controllers\HomeController;

class IndexController extends HomeController
{
    public function actionIndex()
    {
        // echo "hello,world!";
        $titles = ['title1'=>'DoyleafPHP！','title2'=>'dphp'];

        $this->assign($titles);
        $this->assign('content','Hello,Dphp');

        $this->display();
    }
    
}