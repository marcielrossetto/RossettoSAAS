<h2>Reservas</h2>

<a href="nova-reserva" class="btn btn-primary mb-3">Criar Nova Reserva</a>

<table class="table table-bordered table-striped">
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

    <?php 
        require_once "../app/Models/Usuario.php"; 
    ?>

    <?php foreach ($reservas as $r): ?>
    <tr>
        <td><?= $r['id']; ?></td>
        <td><?= $r['nome']; ?></td>
        <td><?= $r['telefone']; ?></td>
        <td><?= $r['data']; ?></td>
        <td><?= $r['horario']; ?></td>
        <td><?= $r['pessoas']; ?></td>
        <td><?= $r['mesa']; ?></td>

        <td>
            <?php  
                $u = \App\Models\Usuario::buscar($r['usuario_id']);
                echo $u ? $u['nome'] : "Desconhecido";
            ?>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
