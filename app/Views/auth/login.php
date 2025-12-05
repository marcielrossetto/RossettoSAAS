<?php
session_start();
$erro = $_SESSION['erro'] ?? "";
unset($_SESSION['erro']);
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Login - Sistema de Reservas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f1f3f7;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-box {
            width: 380px;
            padding: 25px;
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.15);
        }

        .login-box h3 {
            text-align: center;
            margin-bottom: 25px;
            font-weight: 700;
            color: #2b3a67;
        }

        .btn-primary {
            width: 100%;
            height: 45px;
        }
    </style>
</head>

<body>

    <div class="login-box">
        <h3>Entrar no Sistema</h3>

        <?php if (!empty($erro)): ?>
            <div class="alert alert-danger text-center">
                <?= $erro ?>
            </div>
        <?php endif; ?>

        <form action="logar" method="POST">

            <div class="mb-3">
                <label class="form-label">E-mail</label>
                <input type="email" name="email" required class="form-control" placeholder="Digite seu e-mail">
            </div>

            <div class="mb-3">
                <label class="form-label">Senha</label>
                <input type="password" name="senha" required class="form-control" placeholder="Digite sua senha">
            </div>

            <button class="btn btn-primary">Entrar</button>
        </form>
    </div>

</body>

</html>