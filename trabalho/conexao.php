<?php
    $dbhost = "localhost";
    $usuario = "root";
    $senha = "";
    $namedb = "hotel";
    
    $mysqli = new mysqli($dbhost, $usuario, $senha, $namedb);
    if($mysqli->error) {
        die("erro ao conectar ao banco de dados: " . $mysql->error);
    }
?>
