<?php

session_start();


if (isset($_SESSION['usuario_id'])) {
    header("Location: dashboard.php");
    exit();
}
?>
<?php

session_start();
require_once 'conexao.php'; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];

    try {
        
        $stmt = $conn->prepare("SELECT id, senha FROM usuarios WHERE usuario = :usuario");
        $stmt->bindParam(':usuario', $usuario, PDO::PARAM_STR);
        $stmt->execute();

        
        if ($stmt->rowCount() > 0) {
            
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            
            if (password_verify($senha, $user['senha'])) {
                
                $_SESSION['usuario_id'] = $user['id'];
                header("Location: dashboard.php");
                exit();
            } else {
                
                echo "Senha incorreta!";
            }
        } else {
            
            echo "Usuário não encontrado!";
        }
    } catch (PDOException $e) {
        echo "Erro na consulta: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>
        <form action="login_action.php" method="POST">
            <div class="input-group">
                <label for="usuario">Usuário:</label>
                <input type="text" name="usuario" id="usuario" required>
            </div>
            <div class="input-group">
                <label for="senha">Senha:</label>
                <input type="password" name="senha" id="senha" required>
            </div>
            <button type="submit" class="login-btn">Entrar</button>
        </form>
    </div>
</body>
</html>

