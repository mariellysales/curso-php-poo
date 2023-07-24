<?php
include_once "conexao.php";
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>DELETE</title>
    <link rel="shortcut icon" href="images/favicon.ico">
</head>

<body>
    <h2>Apagar usuário</h2>

    <?php
$id = 19;
    $query_usuarios = "DELETE FROM usuarios WHERE id=:id LIMIT 1";
    $delete_usuario = $conn->prepare($query_usuarios);
    $delete_usuario->bindParam(':id', $id, PDO::PARAM_INT);
    if($delete_usuario->execute()){
        echo "Usuário apagado com sucesso!";
    } else{
        echo "Erro: usuário não apagado";
    }
    ?>
</body>

</html>