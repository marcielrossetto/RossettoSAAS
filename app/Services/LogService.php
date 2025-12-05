<?php
namespace App\Services;

use App\Repositories\LogRepository;

class LogService {

    public static function add($acao, $detalhes = null) {

        session_start();

        if (!isset($_SESSION['user_id']) || !isset($_SESSION['empresa_id'])) {
            return false;
        }

        return LogRepository::registrar(
            $_SESSION['empresa_id'],
            $_SESSION['user_id'],
            $acao,
            $detalhes
        );
    }
}
