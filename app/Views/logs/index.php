<h1>Logs do Sistema</h1>

<table class="table table-striped">
    <tr>
        <th>ID</th>
        <th>Ação</th>
        <th>Detalhes</th>
        <th>Data</th>
        <th>Usuário</th>
    </tr>

    <?php foreach ($logs as $log): ?>
    <tr>
        <td><?= $log['id'] ?></td>
        <td><?= $log['acao'] ?></td>
        <td><?= $log['detalhes'] ?></td>
        <td><?= $log['criado_em'] ?></td>
        <td><?= $log['usuario_id'] ?></td>
    </tr>
    <?php endforeach; ?>

</table>
