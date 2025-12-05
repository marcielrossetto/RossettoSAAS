<?php
namespace App\Core;

use App\Core\Auth;
use App\Core\Permissions;

class Router {

    public function handle() {

        $url = $_GET['route'] ?? "login";

        switch ($url) {

            case "profile":
                require __DIR__ . "/../Controllers/ProfileController.php";
                (new \App\Controllers\ProfileController())->index();
            break;

            case "profile-edit":
                require __DIR__ . "/../Controllers/ProfileController.php";
                (new \App\Controllers\ProfileController())->edit();
            break;

            case "profile-update":
                require __DIR__ . "/../Controllers/ProfileController.php";
                (new \App\Controllers\ProfileController())->update();
            break;

            case "dashboard":
                require __DIR__ . "/../Controllers/DashboardController.php";
                (new \App\Controllers\DashboardController())->index();
            break;

            case "reservas":
                require __DIR__ . "/../Controllers/ReservaController.php";
                (new \App\Controllers\ReservaController())->index();
            break;

            case "nova-reserva":
                require __DIR__ . "/../Controllers/ReservaController.php";
                (new \App\Controllers\ReservaController())->create();
            break;

            case "salvar-reserva":
                require __DIR__ . "/../Controllers/ReservaController.php";
                (new \App\Controllers\ReservaController())->store();
            break;

            case "login":
                require __DIR__ . "/../Controllers/AuthController.php";
                (new \App\Controllers\AuthController())->loginPage();
            break;

            case "logar":
                require __DIR__ . "/../Controllers/AuthController.php";
                (new \App\Controllers\AuthController())->login();
            break;

            case "logout":
                Auth::logout();
                header("Location: login");
                exit;
            break;

            case "calendario":
                require __DIR__ . "/../Controllers/CalendarioController.php";
                (new \App\Controllers\CalendarioController())->index();
            break;

            default:
                echo "404 - Página não encontrada.";
        }
    }
}
