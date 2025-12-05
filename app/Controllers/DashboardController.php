<?php
namespace App\Controllers;

use App\Core\Auth;
use App\Models\Reserva;

class DashboardController {

    public function index() {
        Auth::checkLogin();

        $empresa_id = $_SESSION['empresa_id'];

        $dados = Reserva::dashboard($empresa_id);

        $title = "Dashboard";
        $view = __DIR__ . "/../Views/dashboard/dashboard_content.php";

        require __DIR__ . "/../Views/layout.php";
    }
}
