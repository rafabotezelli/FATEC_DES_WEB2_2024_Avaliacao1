<?php
session_start();

if (!isset($_SESSION['usuario']) || $_SESSION['usuario'] != 'coordenacao') { 
    header('Location: index.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $solicitacao = $_POST['solicitacao'];
    $laboratorio = $_POST['laboratorio'];
    $prazo = $_POST['prazo'];
    $curso = $_POST['curso'];

    $arquivo = ($curso == 'DSM') ? 'dsm.txt' : 'ge.txt';
    $registro = "$solicitacao | $laboratorio | $prazo | $curso\n";
    file_put_contents($arquivo, $registro, FILE_APPEND);
    echo "Solicitação cadastrada com sucesso!";
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Solicitação</title>
</head>
<body>
    <h2>Cadastrar Solicitação</h2>
    <form method="POST">
        <label for="solicitacao">Solicitação:</label><br>
        <textarea id="solicitacao" name="solicitacao" required></textarea><br><br>
        
        <label for="laboratorio">Laboratório:</label><br>
        <input type="text" id="laboratorio" name="laboratorio" required><br><br>
        
        <label for="prazo">Prazo:</label><br>
        <input type="date" id="prazo" name="prazo" required><br><br>
        
        <label for="curso">Curso:</label><br>
        <select id="curso" name="curso" required>
            <option value="DSM">DSM</option>
            <option value="GE">GE</option>
        </select><br><br>
        
        <input type="submit" value="Cadastrar">
    </form>
</body>
</html>
