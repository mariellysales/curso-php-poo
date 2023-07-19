<?php
include_once "conexao.php";
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>AND e OR</title>
    <link rel="shortcut icon" href="images/favicon.ico">
</head>

<body>
    <h2>Visualizar usuários com duas condições usando o AND</h2>
    <?php
    $query_usuario = "SELECT id, nome, email, sits_usuario_id, niveis_acesso_id FROM usuarios WHERE sits_usuario_id = 3 AND niveis_acesso_id = 3 LIMIT 10";
    $result_usuario = $conn->prepare($query_usuario);
    $result_usuario->execute();

    while ($row_usuario = $result_usuario->fetch(PDO::FETCH_ASSOC)) {
        //imprimir através da chave do array
        extract($row_usuario);

        echo "ID: $id <br>";
        echo "Nome: $nome <br>";
        echo "E-mail: $email <br>";
        echo "Id da situação: $sits_usuario_id <br>";
        echo "Id do nível de acesso: $niveis_acesso_id <br>";
        echo "<hr>";
    }

    echo "<h2>Visualizar usuários com duas condições usando o OR</h2>";

    $query_usuario_b = "SELECT id, nome, email, sits_usuario_id, niveis_acesso_id FROM usuarios WHERE sits_usuario_id = 3 OR niveis_acesso_id = 1 LIMIT 10";
    $result_usuario_b = $conn->prepare($query_usuario_b);
    $result_usuario_b->execute();

    while ($row_usuario_b = $result_usuario_b->fetch(PDO::FETCH_ASSOC)) {
        //imprimir através da chave do array
        extract($row_usuario_b);

        echo "ID: $id <br>";
        echo "Nome: $nome <br>";
        echo "E-mail: $email <br>";
        echo "Id da situação: $sits_usuario_id <br>";
        echo "Id do nível de acesso: $niveis_acesso_id <br>";
        echo "<hr>";
    }

    echo "<h2>Visualizar usuários com duas condições usando o AND e OR</h2>";

    $query_usuario_c = "SELECT id, nome, email, sits_usuario_id, niveis_acesso_id FROM usuarios WHERE (sits_usuario_id = 1 AND niveis_acesso_id = 2) OR (sits_usuario_id = 2) LIMIT 10";
    $result_usuario_c = $conn->prepare($query_usuario_c);
    $result_usuario_c->execute();

    while ($row_usuario_c = $result_usuario_c->fetch(PDO::FETCH_ASSOC)) {
        //imprimir através da chave do array
        extract($row_usuario_c);

        echo "ID: $id <br>";
        echo "Nome: $nome <br>";
        echo "E-mail: $email <br>";
        echo "Id da situação: $sits_usuario_id <br>";
        echo "Id do nível de acesso: $niveis_acesso_id <br>";
        echo "<hr>";
    }
