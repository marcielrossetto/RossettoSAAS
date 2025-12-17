<?php
namespace App\Core;

class Auth {

    public static function checkLogin() {
        if (!isset($_SESSION['user_id'])) {
            header("Location: /RossettoSaaS/public/login");
            exit;
        }
    }

    public static function login($id, $empresa_id, $nivel) {
        $_SESSION['user_id'] = $id;
        $_SESSION['empresa_id'] = $empresa_id;
        $_SESSION['nivel'] = $nivel;
    }

    public static function logout() {
        session_destroy();
        header("Location: /RossettoSaaS/public/login");
        exit;
    }
}
