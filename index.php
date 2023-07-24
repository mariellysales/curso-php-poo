<?php
session_start();

include_once "conexao.php";
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Listar</title>
    <link rel="shortcut icon" href="images/favicon.ico">
</head>

<body>
    <a href="cadastrar.php">Cadastrar</a><br>
    <h2>Listar usuários</h2>

    <?php
    if (isset($_SESSION['msg'])) {
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }

    $query_usuarios = "SELECT id, nome, email FROM usuarios ORDER BY id DESC";
    $result_usuarios = $conn->prepare($query_usuarios);
    $result_usuarios->execute();

    while ($row_usuario = $result_usuarios->fetch(PDO::FETCH_ASSOC)) {
        extract($row_usuario);
        echo "ID: $id <br>";
        echo "Nome: $nome <br>";
        echo "Email: $email <br>";
        echo "<a href='editar.php?id_usuario=$id'>Editar</a><br>";
        echo "<a href='apagar.php?id_usuario=$id'>Apagar</a><br>";
        echo "<hr>";
    }


    ?>
</body>

</html>