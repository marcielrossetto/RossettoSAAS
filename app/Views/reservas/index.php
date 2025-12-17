<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">


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
<div class="alert alert-info">
    Total de reservas: <strong><?= $totalReservas ?? 0 ?></strong>
</div>

<div class="row">
    <div class="col-md-3 bg-primary text-white p-3">
        Total de Reservas<br>
        <strong><?= $dados['total'] ?? 0 ?></strong>
    </div>

    <div class="col-md-3 bg-success text-white p-3">
        Total de Pessoas<br>
        <strong><?= $dados['pessoas'] ?? 0 ?></strong>
    </div>

    <div class="col-md-3 bg-warning text-dark p-3">
        Almoço<br>
        <strong><?= $dados['almoco'] ?? 0 ?></strong>
    </div>

    <div class="col-md-3 bg-danger text-white p-3">
        Jantar<br>
        <strong><?= $dados['jantar'] ?? 0 ?></strong>
    </div>
</div>

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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
