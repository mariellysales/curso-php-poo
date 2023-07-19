<?php

$host = "localhost";
$user = "root";
$pass = "";
$dbname = "mvc";
$port = 3306;

try {
    $conn = new PDO("mysql:host=$host;port=$port;dbname=" . $dbname, $user, $pass);
    //echo "Conexão com banco de dados realizada com sucesso!<br>";
} catch (Exception $err) {

    echo "ERRO: Conexão com banco de dados não realizada. Erro gerado: " . $err->getMessage();
}
