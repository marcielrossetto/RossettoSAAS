<?php
namespace App\Repositories;

use App\Models\Database;

class LogRepository {

    public static function registrar($empresa_id, $usuario_id, $acao, $detalhes = null) {

        $pdo = Database::connect();

        $sql = $pdo->prepare("
            INSERT INTO logs (empresa_id, usuario_id, acao, detalhes)
            VALUES (?, ?, ?, ?)
        ");

        return $sql->execute([
            $empresa_id,
            $usuario_id,
            $acao,
            $detalhes
        ]);
    }

    public static function listar($empresa_id) {
        $pdo = Database::connect();

        $sql = $pdo->prepare("
            SELECT * FROM logs
            WHERE empresa_id = ?
            ORDER BY criado_em DESC
            LIMIT 200
        ");

        $sql->execute([$empresa_id]);
        return $sql->fetchAll(\PDO::FETCH_ASSOC);
    }
}
