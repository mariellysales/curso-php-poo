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
    //com AS
    //$query_usuarios = "SELECT usr.id AS id_usr, usr.nome AS nome_usr, usr.email FROM usuarios AS usr ORDER BY usr.id DESC LIMIT 40";
    //sem o AS
    $query_usuarios = "SELECT usr.id id_usr, usr.nome nome_usr, usr.email FROM usuarios usr ORDER BY usr.id DESC LIMIT 40";
    $result_usuarios = $conn->prepare($query_usuarios);
    $result_usuarios->execute();

    while ($row_usuario = $result_usuarios->fetch(PDO::FETCH_ASSOC)) {
        extract($row_usuario);

        echo "ID: $id_usr <br>";
        echo "Nome: $nome_usr <br>";
        echo "E-mail: $email <br>";
        echo "<hr>";
    }
    ?>
</body>

</html>