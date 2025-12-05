<?php
namespace App\Controllers;

use App\Core\Auth;

class CalendarioController {

    public function index() {

        Auth::checkLogin();

        $title = "Calendário de Reservas";
        $view = __DIR__ . "/../Views/calendario/index.php";

        require __DIR__ . "/../Views/layout.php";
    }
}
