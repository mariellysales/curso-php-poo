<?php
include_once "conexao.php";
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>UPDATE no MySQL</title>
    <link rel="shortcut icon" href="images/favicon.ico">
</head>

<body>
    <h2>Editar usuário</h2>

    <?php
    $id = 1;
    $nome = "Cesar 1";
    $email = "leohenricardoso@gmail.com";

    $query_usuario = "UPDATE usuarios SET nome=:nome, email=:email WHERE id=:id";
    $up_usuario = $conn->prepare($query_usuario);
    $up_usuario->bindParam(':nome', $nome, PDO::PARAM_STR);
    $up_usuario->bindParam(':email', $email, PDO::PARAM_STR);
    $up_usuario->bindParam(':id', $id, PDO::PARAM_STR);

    if ($up_usuario->execute()) {
        echo "Usuario editado com sucesso";
    } else {
        echo "ERRO: Usuario não editado";
    }
    ?>

    </form>

</body>

</html>