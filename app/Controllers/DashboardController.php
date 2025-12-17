<?php
namespace App\Controllers;

use App\Core\Auth;
use App\Models\Reserva;

class DashboardController {

    public function index() {
        Auth::checkLogin();

        $empresa_id = $_SESSION['empresa_id'];

        // Dados do dashboard
        $totalReservas = Reserva::totalPorEmpresa($empresa_id);
        $dados = Reserva::dadosDashboard($empresa_id);

        require "../app/Views/dashboard/index.php";
    }
}
