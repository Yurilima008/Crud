<?php

require_once 'protect.php';  


?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <h1>Bem-vindo ao Dashboard!</h1>
    <p>Você está logado com o ID de usuário: <?php echo $_SESSION['usuario_id']; ?></p>
    <a href="logout.php">Sair</a>
</body>
</html>


