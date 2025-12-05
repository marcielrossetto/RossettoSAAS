<?php
$title = "Reservas";
$view = __DIR__ . "/lista.php";
require __DIR__ . "/../layout.php";
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Reservas</title>
</head>
<body>

<h2>Reservas</h2>

<a href="nova-reserva">Criar Nova Reserva</a>
<br><br>

<table border="1" cellpadding="8">
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Telefone</th>
        <th>Data</th>
        <th>Horário</th>
        <th>Pessoas</th>
        <th>Mesa</th>
        <th>Usuário</th>
    </tr>

    <?php foreach ($reservas as $r): ?>
    <tr>
        <td><?php echo $r['id']; ?></td>
        <td><?php echo $r['nome']; ?></td>
        <td><?php echo $r['telefone']; ?></td>
        <td><?php echo $r['data']; ?></td>
        <td><?php echo $r['horario']; ?></td>
        <td><?php echo $r['pessoas']; ?></td>
        <td><?php echo $r['mesa']; ?></td>
        <td><?php echo $r['usuario_id']; ?></td>
    </tr>
    <?php endforeach; ?>

</table>

<br>
<a href="dashboard">Voltar</a>

</body>
</html>
