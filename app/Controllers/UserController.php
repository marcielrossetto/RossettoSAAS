<?php
namespace App\Controllers;

use App\Core\Auth;
use App\Models\Usuario;
use App\Services\LogService;

class UserController {

    public function resetSenha() {

        Auth::checkLogin();
        $this->isMaster();

        $id = intval($_GET['id'] ?? 0);

        if ($id <= 0) {
            header("Location: usuarios");
            exit;
        }

        Usuario::atualizarSenha($id, "123456");

        LogService::add("Resetou a senha do usuário ID $id");

        header("Location: usuarios");
        exit;
    }
}
