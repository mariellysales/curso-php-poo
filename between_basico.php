<?php
include_once "conexao.php";
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>BETWEEN</title>
    <link rel="shortcut icon" href="images/favicon.ico">
</head>

<body>
    <h2>Listar usuários</h2>

    <?php
    $query_usuarios = "SELECT id, nome, email FROM usuarios WHERE id BETWEEN 5 AND 8";
    $result_usuarios = $conn->prepare($query_usuarios);
    $result_usuarios->execute();

    //loop de repetição que mostrará os dados de um usuario em cada linha
    while ($row_usuario = $result_usuarios->fetch(PDO::FETCH_ASSOC)) {
        extract($row_usuario);

        echo "ID: $id <br>";
        echo "Nome: $nome <br>";
        echo "E-mail: $email <br>";
        echo "<hr>";
    }
    ?>
</body>

</html>