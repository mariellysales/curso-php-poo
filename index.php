<?php
include_once "conexao.php";
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>LIMIT e OFFSET</title>
    <link rel="shortcut icon" href="images/favicon.ico">
</head>

<body>
    <h2>Listar usuários com LIMIT</h2>
    <?php
    $query_usuarios = "SELECT id, nome, email FROM usuarios LIMIT 2";
    $result_usuarios = $conn->prepare($query_usuarios);
    $result_usuarios->execute();

    while ($row_usuario = $result_usuarios->fetch(PDO::FETCH_ASSOC)) {
        extract($row_usuario);
        echo "ID: $id<br>";
        echo "Nome: $nome<br>";
        echo "Email: $email<br>";
    }

    echo "<h2>Listar usuários com LIMIT e OFFSET</h2>";
    $query_usuarios_b = "SELECT id, nome, email FROM usuarios LIMIT 2 OFFSET 1";
    $result_usuarios_b = $conn->prepare($query_usuarios_b);
    $result_usuarios_b->execute();

    while ($row_usuario_b = $result_usuarios_b->fetch(PDO::FETCH_ASSOC)) {
        extract($row_usuario_b);
        echo "ID: $id<br>";
        echo "Nome: $nome<br>";
        echo "Email: $email<br>";
    }
    ?>
</body>

</html>