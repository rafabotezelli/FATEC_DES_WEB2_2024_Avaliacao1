<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header('Location: index.php');
    exit;
}

$curso = $_GET['curso'] ?? '';
$arquivos = [];

if ($curso == 'ge') {
    $arquivos = ['ge.txt'];

} elseif ($curso == 'dsm') {
    $arquivos = ['dsm.txt'];

} elseif ($curso == 'todos') {
    $arquivos = ['ge.txt', 'dsm.txt'];

} else {
    echo "Curso inválido";
    exit;
}

function lerRegistros($arquivo) {
    if (file_exists($arquivo)) {
        return file_get_contents($arquivo);
    } else {
        return "Nenhum registro encontrado.";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Visualizar Solicitações</title>
</head>
<body>
    <h2>Solicitações do curso <?php echo strtoupper($curso); ?></h2>
    
    <?php
    if (is_array($arquivos)) {
        foreach ($arquivos as $arq) {
            echo "<h3>Solicitações de " . strtoupper(basename($arq, '.txt')) . "</h3>";
            echo nl2br(lerRegistros($arq));
        }
    } else {
        echo nl2br(lerRegistros($arquivos));
    }
    ?>
    
    <br><a href="dashboard.php">Voltar</a>
</body>
</html>
