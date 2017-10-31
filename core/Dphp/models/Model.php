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
    public static $user;
    public static $pass;
    public static $host;
    public static $db_name;
    public static $charset;
    public static $db;

    public function __construct()
    {
        self::$user = $GLOBALS['db']['user'];
        self::$pass = $GLOBALS['db']['pass'];
        self::$host = $GLOBALS['db']['host'];
        self::$db_name = $GLOBALS['db']['db_name'];
        self::$charset = $GLOBALS['db']['charset'];
        self::$db = $GLOBALS['db']['db'];
    }

    /**
     * D-Model-OnLine
     * 即连接数据库操作
     * @return void
     */
    public static function dMol()
    {
        try {
            $dsn = self::$db.':host='.self::$host.';dbname='.self::$db_name.';charset='.self::$charset;
            // 建立了长连接
            $dbh = new PDO($dsn, self::$user, self::$pass, [PDO::ATTR_PERSISTENT => true]);
        } catch (PDOException $e) {
            echo "Error!: " . $e->getMessage() . "<br/>";
            return;
        }
        return $dbh;
    }

}
