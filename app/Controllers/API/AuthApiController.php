<?php
namespace App\Controllers\API;

use App\Models\Usuario;
use App\Services\JwtService;

class AuthApiController {

    public function login() {

        $input = json_decode(file_get_contents("php://input"), true);

        $email = $input["email"] ?? "";
        $senha = $input["senha"] ?? "";

        $user = Usuario::login($email, $senha);

        if (!$user) {
            echo json_encode(["error" => "Credenciais inválidas"]);
            return;
        }

        $token = JwtService::generate([
            "user_id" => $user["id"],
            "empresa_id" => $user["empresa_id"],
            "nivel" => $user["nivel"],
            "exp" => time() + 86400 // expira em 1 dia
        ]);

        echo json_encode([
            "token" => $token
        ]);
    }
}
