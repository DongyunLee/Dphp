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
        self::$user = $GLOBALS['config']['db']['user'];
        self::$pass = $GLOBALS['config']['db']['pass'];
        self::$host = $GLOBALS['config']['db']['host'];
        self::$db_name = $GLOBALS['config']['db']['db_name'];
        self::$charset = $GLOBALS['config']['db']['charset'];
        self::$db = $GLOBALS['config']['db']['db'];
    }

    /**
     * D-Model-OnLine
     * 即连接数据库操作
     * @return void
     */
    public function dMol()
    {

        try {
            $dbh = self::Connection();
        } catch (PDOException $e) {
            if (DEBUG) {
                echo "Error!: " . $e->getMessage() . "<br/>";
            } else {
                header("Location:/errors/404.html");
            }
            return;
        }
        return $dbh;
    }

    private static function Connection()
    {
        $dsn = self::$db . ':host=' . self::$host . ';dbname=' . self::$db_name . ';charset=' . self::$charset;
        // 建立了长连接
        $dbh = new PDO($dsn, self::$user, self::$pass, [PDO::ATTR_PERSISTENT => true]);
        return $dbh;
    }

}
