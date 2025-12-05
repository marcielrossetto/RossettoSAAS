<?php
$title = "Dashboard";
$view = __DIR__ . "/dashboard_content.php";
require __DIR__ . "/../layout.php";
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Dashboard</title>
</head>
<body>
    <h1>Bem-vindo ao Dashboard</h1>

    <p>Usuário logado: <?php echo $_SESSION['user_id']; ?></p>
    <p>Empresa ID: <?php echo $_SESSION['empresa_id']; ?></p>

    <a href="reservas">Ver Reservas</a><br>
    <a href="nova-reserva">Nova Reserva</a><br>
    <a href="logout">Sair</a>
</body>
</html>
