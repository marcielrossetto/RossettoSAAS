<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Login - RossettoSaas</title>
    <style>
        body { font-family: Arial; background: #f2f2f2; display:flex; justify-content:center; align-items:center; height:100vh; }
        .box { background:#fff; padding:30px; border-radius:8px; width:320px; box-shadow:0 0 10px rgba(0,0,0,0.1); }
        input { width:100%; padding:10px; margin-bottom:12px; border:1px solid #ccc; border-radius:4px; }
        button { width:100%; padding:12px; background:#007bff; border:none; color:#fff; border-radius:4px; cursor:pointer; }
        button:hover { background:#0056b3; }
        .error { color:red; margin-bottom:10px; font-size:14px; }
    </style>
</head>
<body>

<div class="box">
    <h2>Entrar</h2>

    <?php 
    if (!empty($_SESSION['erro'])) {
        echo "<div class='error'>{$_SESSION['erro']}</div>";
        unset($_SESSION['erro']);
    }
    ?>

    <form method="POST" action="logar">
        <input type="email" name="email" placeholder="E-mail" required>
        <input type="password" name="senha" placeholder="Senha" required>
        <button type="submit">Entrar</button>
    </form>
</div>

</body>
</html>
