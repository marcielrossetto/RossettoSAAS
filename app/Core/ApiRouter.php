<?php
namespace App\Core;

class ApiRouter {

    public function handle() {

        $url = $_GET['api'] ?? null;

        if (!$url) return;

        header("Content-Type: application/json");

        switch ($url) {

            case "eventos":
    require "../app/Controllers/API/CalendarioApiController.php";
    $c = new \App\Controllers\API\CalendarioApiController();
    $c->eventos();
break;

            case "login":
                require "../app/Controllers/API/AuthApiController.php";
                $c = new \App\Controllers\API\AuthApiController();
                $c->login();
            break;

            case "reservas":
                require "../app/Controllers/API/ReservaApiController.php";
                $c = new \App\Controllers\API\ReservaApiController();
                $c->index();
            break;

            default:
                echo json_encode(["error" => "Rota API inválida"]);
        }
    }
}
