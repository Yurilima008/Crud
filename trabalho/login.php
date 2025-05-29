<?php
include('conexao.php');

if(isset($_POST['email']) || isset($_POST['senha'])) {

    if(strlen($_POST['email']) == 0) {
        echo "digite seu email";
    } else if (strlen($_POST['senha']) == 0) {
        echo "digite sua senha";
    } else{

        $Email = $mysqli->real_escape_string($_POST['email']);
        $Senha = $mysqli->real_escape_string($_POST['senha']);

        $sql_code = "SELECT * FROM clientes WHERE email = '$Email' AND senha = '$Senha'";
        $sql_query = $mysqli->query($sql_code) or die ("erro na execução no codigo SQL: " . $mysqli->error);
        $quantidade = $sql_query->num_rows;

        if ($quantidade == 1) {

            $usuario = $sql_query->fetch_assoc();

            if(!isset($_SESSION)){
                session_start();
            }

            $_SESSION['id'] = $usuario['id'];
            $_SESSION['nome'] = $usuario['nome'];

            header("Location: painel.php");

        } else {
            echo "email ou senha incorretos. tente novamente";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="login">
        <form action="" method="post" class="login">
            <img src="logo2.png" alt="" width="300px" >
            <h1>LOGIN</h1>
            <label>Email:</label>
            <input type="text" class="input" name = "email">
            <br><br>
            <label>Senha:</label>
            <input type="password"  class="input" name = "senha">
            <br><br>
            <button class="botao" type="submit">ENTRAR</button>
            <br>
        </form>
    </div>
    
</body>
</html>