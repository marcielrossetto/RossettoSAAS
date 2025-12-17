<?php
namespace App\Models;

use PDO;

class Database
{

    public static function connect()
    {
        return new PDO(
            "mysql:host=localhost;dbname=rossetto_saas;charset=utf8mb4",
            "root",
            "",
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ]
        );

    }
}
