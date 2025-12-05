<?php
namespace App\Controllers;

use App\Core\Auth;
use App\Repositories\LogRepository;

class LogController {

    public function index() {

        Auth::checkLogin();

        if ($_SESSION['nivel'] != 1) {
            die("Acesso negado");
        }

        $logs = LogRepository::listar($_SESSION['empresa_id']);

        $title = "Logs do Sistema";
        $view = __DIR__ . "/../Views/logs/index.php";

        require __DIR__ . "/../Views/layout.php";
    }
}
