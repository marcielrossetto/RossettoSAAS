<?php
namespace App\Models;

use App\Models\Database;

class Reserva {

    public static function todas($empresa_id) {
        $pdo = Database::connect();
        $sql = $pdo->prepare("SELECT * FROM reservas WHERE empresa_id = ? ORDER BY data, horario");
        $sql->execute([$empresa_id]);
        return $sql->fetchAll(\PDO::FETCH_ASSOC);
    }

    public static function criar($dados) {
        $pdo = Database::connect();

        $sql = $pdo->prepare("
            INSERT INTO reservas
            (empresa_id, usuario_id, nome, telefone, data, horario, pessoas, mesa, observacoes)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)
        ");

        return $sql->execute([
            $dados["empresa_id"],
            $dados["usuario_id"],
            $dados["nome"],
            $dados["telefone"],
            $dados["data"],
            $dados["horario"],
            $dados["pessoas"],
            $dados["mesa"],
            $dados["observacoes"]
        ]);
    }
    public static function dashboard($empresa_id) {
    $pdo = Database::connect();

    // Total de reservas
    $total = $pdo->prepare("SELECT COUNT(*) FROM reservas WHERE empresa_id = ?");
    $total->execute([$empresa_id]);
    $total_reservas = $total->fetchColumn();

    // Total de pessoas
    $pessoas = $pdo->prepare("SELECT SUM(pessoas) FROM reservas WHERE empresa_id = ?");
    $pessoas->execute([$empresa_id]);
    $total_pessoas = $pessoas->fetchColumn() ?? 0;

    // Almoço
    $almoco = $pdo->prepare("
        SELECT COUNT(*) 
        FROM reservas 
        WHERE empresa_id = ?
        AND horario BETWEEN '11:00' AND '17:00'
    ");
    $almoco->execute([$empresa_id]);
    $qtd_almoco = $almoco->fetchColumn();

    // Jantar
    $jantar = $pdo->prepare("
        SELECT COUNT(*) 
        FROM reservas 
        WHERE empresa_id = ?
        AND horario BETWEEN '17:01' AND '23:59'
    ");
    $jantar->execute([$empresa_id]);
    $qtd_jantar = $jantar->fetchColumn();

    // Gráfico por dia
    $dias = $pdo->prepare("
        SELECT data, COUNT(*) as reservas
        FROM reservas
        WHERE empresa_id = ?
        GROUP BY data
        ORDER BY data ASC
    ");
    $dias->execute([$empresa_id]);
    $graf_dias = $dias->fetchAll(\PDO::FETCH_ASSOC);

    // Gráfico por hora
    $horas = $pdo->prepare("
        SELECT HOUR(horario) as hora, COUNT(*) as qtd
        FROM reservas
        WHERE empresa_id = ?
        GROUP BY HOUR(horario)
        ORDER BY hora
    ");
    $horas->execute([$empresa_id]);
    $graf_horas = $horas->fetchAll(\PDO::FETCH_ASSOC);

    return [
        "total_reservas" => $total_reservas,
        "total_pessoas" => $total_pessoas,
        "almoco" => $qtd_almoco,
        "jantar" => $qtd_jantar,
        "graf_dias" => $graf_dias,
        "graf_horas" => $graf_horas
    ];
}

}
