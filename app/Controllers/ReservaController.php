<?php
namespace App\Controllers;

use App\Core\Auth;
use App\Models\Reserva;
use App\Services\LogService;

class ReservaController {

    public function index() {
        Auth::checkLogin();

        $reservas = Reserva::listarComUsuario($_SESSION['empresa_id']);
        require "../app/Views/reservas/lista.php";
    }

    public function create() {
        Auth::checkLogin();
        require "../app/Views/reservas/create.php";
    }

    public function store() {
        Auth::checkLogin();

        Reserva::criar([
            "empresa_id"  => $_SESSION['empresa_id'],
            "usuario_id"  => $_SESSION['user_id'],
            "nome"        => $_POST["nome"],
            "telefone"    => $_POST["telefone"],
            "data"        => $_POST["data"],
            "horario"     => $_POST["horario"],
            "pessoas"     => $_POST["pessoas"],
            "mesa"        => $_POST["mesa"],
            "observacoes" => $_POST["observacoes"] ?? ""
        ]);

        LogService::add(
            "Criou reserva",
            json_encode($_POST)
        );

        header("Location: reservas");
        exit;
    }
}
