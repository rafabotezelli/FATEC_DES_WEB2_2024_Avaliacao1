<?php 
session_start();

if (!isset($_SESSION['usuario'])) {
    header('Location: index.php');
    exit;
}

$usuario = $_SESSION['usuario'];
?>
<!DOCTYPE html> 
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
</head>
<body>
    <h2>Bem-vindo, <?php echo ucfirst($usuario); ?>!</h2>
    <a href="index.php?logout=true">Logout</a>
    
    <?php if ($usuario == 'coordenacao') : ?>
        <h3>Menu Coordenadores</h3>
        <a href="cadastrar.php">Cadastrar Solicitação</a>
    <?php endif; ?>
    
    <h3>Menu Visualizar Solicitações</h3>
    <a href="visualizar.php?curso=ge">Visualizar Solicitações GE</a><br> 
    <a href="visualizar.php?curso=dsm">Visualizar Solicitações DSM</a><br>
    <a href="visualizar.php?curso=todos">Visualizar Todas Solicitações</a>
</body>
</html>
