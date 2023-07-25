<?php
include_once "conexao.php";
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>LIKE</title>
    <link rel="shortcut icon" href="images/favicon.ico">
</head>

<body>
    <h2>Listar usuários</h2>
    <?php
    //% - indica que aceita texto antes ou depois
    $nome = "Marielly%";
        $query_usuario = "SELECT id, nome, email FROM usuarios WHERE nome LIKE :nome ORDER BY id DESC";
        $result_usuarios = $conn->prepare($query_usuario);
        $result_usuarios->bindParam(':nome', $nome, PDO::PARAM_STR);
        $result_usuarios->execute();

        while($row_usuario = $result_usuarios->fetch(PDO::FETCH_ASSOC)){
            extract($row_usuario);
            echo "ID: $id <br>";
            echo "Nome: $nome <br>";
            echo "E-mail: $email <br>";
            echo "<hr>";
        }
    ?>
</body>

</html>