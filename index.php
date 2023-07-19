<?php
include_once "conexao.php";
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>WHERE</title>
    <link rel="shortcut icon" href="images/favicon.ico">
</head>

<body>
    <h2>Visualizar usuários pelo id</h2>
    <?php
    $query_usuario = "SELECT id, nome, email FROM usuarios WHERE id = 14 LIMIT 1";
    $result_usuario = $conn->prepare($query_usuario);
    $result_usuario->execute();

    //Atribui o objeto $result_usuario usando o método fetch
    //O fetch percorrer os resultados do conjunto linha por linha e retorna como um array
    //PDO::FETCH_ASSOC configura o método retornando em forma de array associativo
    $row_usuario = $result_usuario->fetch(PDO::FETCH_ASSOC);
    //imprimir através da chave do array
    extract($row_usuario);

    echo "ID: $id <br>";
    echo "Nome: $nome <br>";
    echo "E-mail: $email <br>";
    echo "<hr>";

    echo "<h2>Pesquisar usuário pelo e-mail</h2>";
    $query_usuario_b = "SELECT id, nome, email FROM usuarios WHERE email = 'cesar@celke.com.br' LIMIT 1";
    $result_usuario_b = $conn->prepare($query_usuario_b);
    $result_usuario_b->execute();

    $row_usuario_b = $result_usuario_b->fetch(PDO::FETCH_ASSOC);
    extract($row_usuario_b);

    echo "ID: $id <br>";
    echo "Nome: $nome <br>";
    echo "E-mail: $email <br>";
    echo "<hr>";

    echo "<h2>Pesquisar usuário ativo</h2>";
    $query_usuario_c = "SELECT id, nome, email, sits_usuario_id FROM usuarios WHERE sits_usuario_id = 1";
    $result_usuario_c = $conn->prepare($query_usuario_c);
    $result_usuario_c->execute();

    while ($row_usuario_c = $result_usuario_c->fetch(PDO::FETCH_ASSOC)) {
        extract($row_usuario_c);

        echo "ID: $id <br>";
        echo "Nome: $nome <br>";
        echo "E-mail: $email <br>";
        echo "Id da situação: $sits_usuario_id <br>";
        echo "<hr>";
    }
    echo "<h2>Pesquisar usuários com nível de acesso Administrador</h2>";
    $query_usuario_d = "SELECT id, nome, email, sits_usuario_id, niveis_acesso_id FROM usuarios WHERE niveis_acesso_id = 2";
    $result_usuario_d = $conn->prepare($query_usuario_d);
    $result_usuario_d->execute();

    while ($row_usuario_d = $result_usuario_d->fetch(PDO::FETCH_ASSOC)) {
        extract($row_usuario_d);

        echo "ID: $id <br>";
        echo "Nome: $nome <br>";
        echo "E-mail: $email <br>";
        echo "Id da situação: $sits_usuario_id <br>";
        echo "Id do nível de acesso: $niveis_acesso_id <br>";
        echo "<hr>";
    }


    ?>
</body>

</html>