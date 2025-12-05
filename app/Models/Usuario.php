<?php
namespace App\Models;

use App\Models\Database;

class Usuario {

    public static function login($email, $senha) {
        $pdo = Database::connect();

        $sql = $pdo->prepare("SELECT * FROM usuarios WHERE email = ?");
        $sql->execute([$email]);

        if ($sql->rowCount() === 0) {
            return false;
        }

        $user = $sql->fetch(\PDO::FETCH_ASSOC);

        if (password_verify($senha, $user['senha'])) {
            return $user;
        }

        return false;
    }
    public static function atualizarSenha($id, $senha) {
    $pdo = Database::connect();

    $hash = password_hash($senha, PASSWORD_BCRYPT);

    $sql = $pdo->prepare("UPDATE usuarios SET senha=? WHERE id=?");
    return $sql->execute([$hash, $id]);
}

    public static function criar($empresa_id, $nome, $email, $senha, $nivel = 2) {
        $pdo = Database::connect();

        $hash = password_hash($senha, PASSWORD_BCRYPT);

        $sql = $pdo->prepare("INSERT INTO usuarios (empresa_id, nome, email, senha, nivel) VALUES (?,?,?,?,?)");
        return $sql->execute([$empresa_id, $nome, $email, $hash, $nivel]);
    }
}
