<?php
namespace App\Controllers\API;

use App\Services\JwtService;
use App\Models\Reserva;

class ReservaApiController {

    private function auth() {

        $headers = getallheaders();

        if (!isset($headers["Authorization"])) {
            echo json_encode(["error" => "Token não enviado"]);
            exit;
        }

        $token = str_replace("Bearer ", "", $headers["Authorization"]);

        $data = JwtService::validate($token);

        if (!$data) {
            echo json_encode(["error" => "Token inválido"]);
            exit;
        }

        return $data;
    }

    // ========== LISTAR RESERVAS ==========
    public function index() {

        $auth = $this->auth(); // valida token

        $empresa_id = $auth["empresa_id"];

        $reservas = Reserva::todas($empresa_id);

        echo json_encode($reservas);
    }

    // ========== CRIAR RESERVA ==========
    public function store() {

        $auth = $this->auth();

        $input = json_decode(file_get_contents("php://input"), true);

        $dados = [
            "empresa_id" => $auth["empresa_id"],
            "usuario_id" => $auth["user_id"],
            "nome" => $input["nome"] ?? "",
            "telefone" => $input["telefone"] ?? "",
            "data" => $input["data"] ?? "",
            "horario" => $input["horario"] ?? "",
            "pessoas" => $input["pessoas"] ?? 0,
            "mesa" => $input["mesa"] ?? "",
            "observacoes" => $input["observacoes"] ?? ""
        ];

        Reserva::criar($dados);

        echo json_encode(["status" => "OK", "mensagem" => "Reserva criada com sucesso"]);
    }
}

use App\Services\LogService;

LogService::add("Criou reserva via API", json_encode($input));
