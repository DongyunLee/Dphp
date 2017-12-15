<?php
/**
 * Name: FooModel.php-Dphp
 * Author: lidongyun@shuwang-tech.com
 * Date: 2017/12/15
 * Time: 20:48
 */

namespace app\Index;

use core\Dphp\models\DoctrineModel;

class FooModel extends DoctrineModel
{
    protected $id;
    protected $title;
    protected $content;

    public function index()
    {

    }
}