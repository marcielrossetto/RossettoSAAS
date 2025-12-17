<?php
namespace App\Models;

use App\Models\Database;
use PDO;

class Reserva {

    public static function listarComUsuario($empresa_id) {
        $pdo = Database::connect();

        $sql = $pdo->prepare("
            SELECT r.*, u.nome AS usuario_nome
            FROM reservas r
            LEFT JOIN usuarios u ON u.id = r.usuario_id
            WHERE r.empresa_id = ?
            ORDER BY r.data, r.horario
        ");

        $sql->execute([$empresa_id]);
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }
public static function totalPorEmpresa($empresa_id) {
    $pdo = Database::connect();
    $sql = $pdo->prepare("SELECT COUNT(*) FROM reservas WHERE empresa_id = ?");
    $sql->execute([$empresa_id]);
    return $sql->fetchColumn();
}

public static function dadosDashboard($empresa_id) {
    $pdo = Database::connect();

    $sql = $pdo->prepare("
        SELECT
            COUNT(*) AS total,
            SUM(pessoas) AS pessoas,
            SUM(CASE WHEN horario < '15:00' THEN 1 ELSE 0 END) AS almoco,
            SUM(CASE WHEN horario >= '15:00' THEN 1 ELSE 0 END) AS jantar
        FROM reservas
        WHERE empresa_id = ?
    ");

    $sql->execute([$empresa_id]);
    return $sql->fetch(\PDO::FETCH_ASSOC);
}

    public static function criar($dados) {
        $pdo = Database::connect();

        $sql = $pdo->prepare("
            INSERT INTO reservas
            (empresa_id, usuario_id, nome, telefone, data, horario, pessoas, mesa, observacoes)
            VALUES
            (:empresa_id, :usuario_id, :nome, :telefone, :data, :horario, :pessoas, :mesa, :observacoes)
        ");

        return $sql->execute([
            ":empresa_id"  => $dados["empresa_id"],
            ":usuario_id"  => $dados["usuario_id"],
            ":nome"        => $dados["nome"],
            ":telefone"    => $dados["telefone"],
            ":data"        => $dados["data"],
            ":horario"     => $dados["horario"],
            ":pessoas"     => $dados["pessoas"],
            ":mesa"        => $dados["mesa"],
            ":observacoes" => $dados["observacoes"]
        ]);
    }
}
