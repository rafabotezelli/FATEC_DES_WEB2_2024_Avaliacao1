<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $login = $_POST['login'];
    $senha = $_POST['senha'];

    if ($login == 'coordenacao' && $senha == 'coordenacao') {
        $_SESSION['usuario'] = 'coordenacao';
        header('Location: dashboard.php');
        exit;

    } elseif ($login == 'tecnicos' && $senha == 'tecnicos') {
        $_SESSION['usuario'] = 'tecnicos';
        header('Location: dashboard.php');
        exit;

    } else {
        $erro = "Login ou senha inválidos!";
    }
}

if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: index.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <form method="POST">
        <label for="login"><b>Login:</b></label><br>
        <input type="text" id="login" name="login" required><br><br>
        
        <label for="senha"><b>Senha:</b></label><br>
        <input type="password" id="senha" name="senha" required><br><br>
        
        <input type="submit" value="Entrar">
    </form>
    <?php if (isset($erro)) echo "<p style='color:red;'>$erro</p>"; ?> 
</body>
</html>
