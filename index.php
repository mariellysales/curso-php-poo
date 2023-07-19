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
    $query_acessos = "SELECT DISTINCT id, nome_aula, usuario_id FROM acessos WHERE usuario_id=5";
    $result_acessos = $conn->prepare($query_acessos);
    $result_acessos->execute();

    while ($row_acessos = $result_acessos->fetch(PDO::FETCH_ASSOC)) {
        //imprimir através da chave do array
        extract($row_acessos);

        echo "ID do usuário: $usuario_id <br>";
        echo "Aula: $nome_aula <br>";
        echo "<hr>";
    }
    ?>
</body>

</html>