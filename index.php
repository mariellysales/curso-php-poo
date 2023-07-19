<?php
include_once "conexao.php";
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>ORDER BY</title>
    <link rel="shortcut icon" href="images/favicon.ico">
</head>

<body>
    <h2>Listar usuários</h2>

    <?php
    $query_usuario = "SELECT id, nome, email, sits_usuario_id, niveis_acesso_id FROM usuarios ORDER BY nome ASC";
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
    ?>
</body>

</html>