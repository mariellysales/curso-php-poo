<?php
include_once "conexao.php";
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>INNER JOIN</title>
    <link rel="shortcut icon" href="images/favicon.ico">
</head>

<body>
    <h2>Listar usuários</h2>
    <?php
    $query_usuarios = "SELECT usr.id AS id_usr, usr.nome AS nome_usr, usr.email, sit.id AS id_sit, sit.nome AS nome_sit, nvs.id AS id_nvs, nvs.nome AS nome_nvs FROM usuarios as usr INNER JOIN sists_usuarios AS sit ON sit.id=usr.sists_usuario_id INNER JOIN niveis_acessos AS nvs ON nvs.id=usr.niveis_acesso_id ORDER BY usr.id DESC LIMIT 40";
    $result_usuarios = $conn->prepare($query_usuarios);
    $result_usuarios->execute();

    while ($row_usuario = $result_usuarios->fetch(PDO::FETCH_ASSOC)) {
        //var_dump($row_usuario);
        extract($row_usuario);
        echo "ID do usuário: $id_usr <br>";
        echo "Nome do usuário: $nome_usr <br>";
        echo "E-mail: $email <br>";
        echo "ID da Situação: $id_sit <br>";
        echo "Situação do usuário: $nome_sit <br>";
        echo "ID do nível de acesso: $id_nvs <br>";
        echo "Nível de acesso: $nome_nvs <br>";
        echo "<hr>";
    }
    ?>
</body>

</html>