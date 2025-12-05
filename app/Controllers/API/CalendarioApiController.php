<?php
namespace App\Controllers\API;

use App\Models\Reserva;

class CalendarioApiController {

    public function eventos() {

        header("Content-Type: application/json");

        $empresa_id = $_GET["empresa_id"] ?? null;

        if (!$empresa_id) {
            echo json_encode([]);
            return;
        }

        $reservas = Reserva::todas($empresa_id);

        $eventos = [];

        foreach ($reservas as $r) {

            // Cor automática por quantidade
            $cor = "#007bff"; // padrão
            if ($r["pessoas"] >= 10) $cor = "#dc3545"; // vermelho
            elseif ($r["pessoas"] >= 5) $cor = "#ffc107"; // amarelo

            $eventos[] = [
                "id" => $r["id"],
                "title" => $r["nome"] . " (" . $r["pessoas"] . "p)",
                "start" => $r["data"] . "T" . $r["horario"],
                "color" => $cor,
                "extendedProps" => [
                    "telefone" => $r["telefone"],
                    "mesa" => $r["mesa"],
                    "observacoes" => $r["observacoes"],
                ]
            ];
        }

        echo json_encode($eventos);
    }
}
