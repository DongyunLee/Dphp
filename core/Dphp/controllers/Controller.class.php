<?php

/**
* Controller.class.php - Dphp
* User: lidongyun@shuwang-tech.com
* Date: 2017/8/30
*/

namespace Controllers;

class Controller
{
    public $dfun;

    public function __construct()
    {
        $this->dfun = $GLOBALS['dfun'];
    }
    
    public function __call($action,$params)
    {
        header("Location:/errors/404.html");
    }
}