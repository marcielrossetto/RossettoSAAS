<h2>Cadastrar Usuário</h2>

<form method="POST" action="/RossettoSaas/public/register">

    <div class="mb-3">
        <label>Nome</label>
        <input type="text" name="nome" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>E-mail</label>
        <input type="email" name="email" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Senha</label>
        <input type="password" name="senha" class="form-control" required>
    </div>

    <button class="btn btn-primary">Cadastrar</button>
    <a href="/RossettoSaas/public/login" class="btn btn-secondary">Voltar</a>

</form>
