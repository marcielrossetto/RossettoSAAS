<?php
namespace App\Controllers;

use App\Core\Auth;
use App\Models\Reserva;

class ReservaController {

    public function index() {
        Auth::checkLogin();
        $reservas = Reserva::todas($_SESSION['empresa_id']);
        require "../app/Views/reservas/index.php";
    }

    public function create() {
        Auth::checkLogin();
        require "../app/Views/reservas/create.php";
    }

    public function store() {
        Auth::checkLogin();

        Reserva::criar([
            "empresa_id" => $_SESSION['empresa_id'],
            "usuario_id" => $_SESSION['user_id'],
            "nome" => $_POST["nome"],
            "telefone" => $_POST["telefone"],
            "data" => $_POST["data"],
            "horario" => $_POST["horario"],
            "pessoas" => $_POST["pessoas"],
            "mesa" => $_POST["mesa"],
            "observacoes" => $_POST["observacoes"] ?? ""
        ]);

        header("Location: reservas");
        exit;
    }
    
}
use App\Services\LogService;

LogService::add("Criou reserva", json_encode($_POST));
