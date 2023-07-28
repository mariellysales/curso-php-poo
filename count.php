<?php
include_once "conexao.php";
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>COUNT</title>
    <link rel="shortcut icon" href="images/favicon.ico">
</head>

<body>
    <h2>Contar a quantidade de usuários</h2>
    <?php
    $query_qnt_usuarios = "SELECT COUNT(id) AS qnt_usuarios FROM usuarios WHERE sists_usuario_id = 1";
    $result_qnt_usuarios = $conn->prepare($query_qnt_usuarios);
    $result_qnt_usuarios->execute();

    while ($row_usuario = $result_qnt_usuarios->fetch(PDO::FETCH_ASSOC)) {
        //var_dump($row_usuario);
        extract($row_usuario);
        echo "Quantidade de usuários ativos: $qnt_usuarios <br>";
        echo "<hr>";
    }
    ?>
</body>

</html>