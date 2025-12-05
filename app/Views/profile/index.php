<h1>Meu Perfil</h1>

<p><strong>Nome:</strong> <?= $usuario['nome'] ?></p>
<p><strong>Email:</strong> <?= $usuario['email'] ?></p>
<p><strong>Nível:</strong> <?= $usuario['nivel'] == 1 ? "Master" : "Operador" ?></p>

<a href="profile-edit" class="btn btn-primary">Alterar Senha</a>
