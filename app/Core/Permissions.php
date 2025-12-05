<?php
namespace App\Core;

class Permissions {

    public static function requireLevel($minLevel) {

        session_start();

        if (!isset($_SESSION['nivel'])) {
            die("Acesso negado.");
        }

        if ($_SESSION['nivel'] > $minLevel) {
            die("Você não tem permissão para acessar essa área.");
        }
    }
}
