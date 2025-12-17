<?php
namespace App\Controllers;



use App\Core\Auth;
use App\Models\Usuario;
use App\Services\LogService;

class AuthController {

    public function register() {
        require __DIR__ . "/../Views/auth/register.php";
    }

    public function store() {

        Usuario::criar(
            1, // empresa_id (por enquanto fixa)
            $_POST['nome'],
            $_POST['email'],
            $_POST['senha'],
            2 // nível padrão (operador)
        );

        header("Location: login");
        exit;
    }

    public function loginPage() {
        require __DIR__ . "/../Views/auth/login.php";
    }

    public function login() {

        $email = $_POST['email'] ?? "";
        $senha = $_POST['senha'] ?? "";

        $user = Usuario::login($email, $senha);

        if ($user) {

            Auth::login($user['id'], $user['empresa_id'], $user['nivel']);

            // Log no lugar correto
            LogService::add("Usuário {$user['id']} realizou login");

            header("Location: dashboard");
            exit;
        } else {
            $_SESSION['erro'] = "E-mail ou senha inválidos";
            header("Location: login");
            exit;
        }
    }
}
