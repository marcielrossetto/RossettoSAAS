<?php
namespace App\Models;

class Database {

    private static $instance = null;

    public static function connect() {

        if (!self::$instance) {

            $config = require __DIR__ . "/../Config/app.php";

            self::$instance = new \PDO(
                "mysql:host={$config['db_host']};dbname={$config['db_name']};charset=utf8",
                $config['db_user'],
                $config['db_pass']
            );

            self::$instance->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        }

        return self::$instance;
    }
}
