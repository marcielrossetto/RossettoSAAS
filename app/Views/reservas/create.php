<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<?php
$title = "Nova Reserva";
$view = __DIR__ . "/form.php";
require __DIR__ . "/../layout.php";
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Nova Reserva</title>
</head>
<body>

<h2>Criar Nova Reserva</h2>

<form method="POST" action="salvar-reserva">

    Nome:<br>
    <input type="text" name="nome" required><br><br>

    Telefone:<br>
    <input type="text" name="telefone" required><br><br>

    Data:<br>
    <input type="date" name="data" required><br><br>

    Horário:<br>
    <input type="time" name="horario" required><br><br>

    Número de pessoas:<br>
    <input type="number" name="pessoas" required><br><br>

    Mesa:<br>
    <input type="text" name="mesa"><br><br>

    Observações:<br>
    <textarea name="observacoes"></textarea><br><br>

    <button type="submit">Salvar</button>
</form>

<br>
<a href="reservas">Voltar</a>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
