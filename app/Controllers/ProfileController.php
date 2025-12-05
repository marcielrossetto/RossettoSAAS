<?php
namespace App\Controllers;

use App\Core\Auth;
use App\Models\Usuario;

class ProfileController {
    public function edit() {
    Auth::checkLogin();

    $title = "Alterar Senha";
    $view = __DIR__ . "/../Views/profile/edit.php";

    require __DIR__ . "/../Views/layout.php";
}

public function update() {
    Auth::checkLogin();

    $nova = $_POST['nova_senha'];
    $conf = $_POST['confirmar'];

    if ($nova !== $conf) {
        die("Senhas não conferem!");
    }

    \App\Models\Usuario::atualizarSenha($_SESSION['user_id'], $nova);

    header("Location: profile");
}


    public function index() {
        Auth::checkLogin();

        $usuario = Usuario::buscar($_SESSION['user_id']);

        $title = "Meu Perfil";
        $view = __DIR__ . "/../Views/profile/index.php";

        require __DIR__ . "/../Views/layout.php";
    }
}
