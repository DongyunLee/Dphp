<?php

/**
 * Model.class.php - Dphp
 * User: lidongyun@shuwang-tech.com
 * Date: 2017/8/31
 */

namespace Models;

use PDO;
use PDOException;

class Model
{

    public function __construct($host, $db, $charset, $user, $pass)
    {

    }

    /**
     * D-Model-OnLine
     * 即连接数据库操作
     * @return void
     */
    public static function dMol()
    {
        echo '<h3>' . __METHOD__ . '</h3>';
        $user = 'root';
        $pass = '';
        try {
            $dsn = 'mysql:host=localhost;dbname=dphp;charset=UTF8MB4';
            // 建立了长连接
            $dbh = new PDO($dsn, $user, $pass, [PDO::ATTR_PERSISTENT => true]);
        } catch (PDOException $e) {
            echo "Error!: " . $e->getMessage() . "<br/>";
            return;
        }
    }

}
