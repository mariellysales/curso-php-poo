<?php
include_once "conexao.php";
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>INSERT</title>
    <link rel="shortcut icon" href="images/favicon.ico">
</head>

<body>
    <h2>Cadastrar usuários</h2>

    <?php
    //inserindo valores direto na QUERY
    /*$query_usuario = "INSERT INTO usuarios (nome, email, senha, sists_usuario_id, niveis_acesso_id, created) VALUES ('Leo', 'leo@gmail.com', '123456', 3, 1, NOW())";
    $cad_usuario = $conn->prepare($query_usuario);
    $cad_usuario->execute();*/

    //colocando variável com valor direto na QUERY
    /*$nome = "Mary";
    $email = "mary@gmail.com";
    $senha = 123456;
    $sists_usuario_id = 3;
    $niveis_acesso_id = 3;

    $query_usuario = "INSERT INTO usuarios (nome, email, senha, sists_usuario_id, niveis_acesso_id, created) VALUES ('$nome', '$email', '$senha', $sists_usuario_id, $niveis_acesso_id, NOW())";
    $cad_usuario = $conn->prepare($query_usuario);
    $cad_usuario->execute();*/

    //Atribuindo link na QUERY e substituir o link pelo valor com bindParam (RECOMENDADO)
    $nome = "Mary1";
    $email = "mary@gmail.com";
    $senha = 123456;
    $sists_usuario_id = 3;
    $niveis_acesso_id = 3;

    $query_usuario = "INSERT INTO usuarios (nome, email, senha, sists_usuario_id, niveis_acesso_id, created) VALUES (:nome, :email, :senha, :sists_usuario_id, :niveis_acesso_id, NOW())";
    $cad_usuario = $conn->prepare($query_usuario);
    $cad_usuario->bindParam(':nome', $nome, PDO::PARAM_STR);
    $cad_usuario->bindParam(':email', $email, PDO::PARAM_STR);
    $cad_usuario->bindParam(':senha', $senha, PDO::PARAM_STR);
    $cad_usuario->bindParam(':sists_usuario_id', $sists_usuario_id, PDO::PARAM_INT);
    $cad_usuario->bindParam(':niveis_acesso_id', $niveis_acesso_id, PDO::PARAM_INT);
    $cad_usuario->execute();

    if ($cad_usuario->rowCount()) {
        echo "Usuário cadastrado com sucesso!";
        //Como recuperar id do registro cadastrado
        echo $conn->lastInsertId();
    } else {
        echo "Usuário não cadastrado";
    }


    ?>
</body>

</html>