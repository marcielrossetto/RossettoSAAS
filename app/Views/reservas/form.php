<h2>Nova Reserva</h2>

<form method="POST" action="salvar-reserva">

    <div class="form-group">
        <label>Nome</label>
        <input type="text" name="nome" class="form-control" required>
    </div>

    <div class="form-group">
        <label>Telefone</label>
        <input type="text" name="telefone" class="form-control" required>
    </div>

    <div class="form-group">
        <label>Data</label>
<input type="date" name="data" class="form-control" required value="<?= $_GET['data'] ?? '' ?>">
    </div>

    <div class="form-group">
        <label>Horário</label>
        <input type="time" name="horario" class="form-control" required>
    </div>

    <div class="form-group">
        <label>Pessoas</label>
        <input type="number" name="pessoas" class="form-control" required>
    </div>

    <div class="form-group">
        <label>Mesa</label>
        <input type="text" name="mesa" class="form-control">
    </div>

    <div class="form-group">
        <label>Observações</label>
        <textarea name="observacoes" class="form-control"></textarea>
    </div>

    <button class="btn btn-success">Salvar</button>

</form>
