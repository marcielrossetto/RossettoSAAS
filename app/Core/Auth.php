<?php
namespace App\Core;

class Auth {

    public static function checkLogin() {
        session_start();
        if (!isset($_SESSION['user_id'])) {
            header("Location: login.php");
            exit;
        }
    }

    public static function login($id, $empresa_id, $nivel) {
        session_start();
        $_SESSION['user_id'] = $id;
        $_SESSION['empresa_id'] = $empresa_id;
        $_SESSION['nivel'] = $nivel;
    }

    public static function logout() {
        session_start();
        session_destroy();
        header("Location: login.php");
        exit;
    }
}
