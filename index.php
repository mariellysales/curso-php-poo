<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Select</title>
    <link rel="shortcut icon" href="images/favicon.ico">
</head>

<body>
    <?php

    $host = "localhost";
    $user = "root";
    $pass = "";
    $dbname = "cadastro";
    $port = 3306;

    try {
        $conn = new PDO("mysql:host=$host;port=$port;dbname=" . $dbname, $user, $pass);
        echo "Conexão com banco de dados realizada com sucesso!<br>";
    } catch (Exception $err) {

        echo "ERRO: Conexão com banco de dados não realizada. Erro gerado: " . $err->getMessage();
    }

    echo "<h2>Listar usuários</h2>";
    //A query com "*" indica que deve trazer todas as colunas
    $query_usuarios = "SELECT * FROM usuarios";
    $result_usuarios = $conn->prepare($query_usuarios);
    $result_usuarios->execute();

    while ($row_usuario = $result_usuarios->fetch(PDO::FETCH_ASSOC)) {
        echo "ID: " . $row_usuario['id'] . "<br>";
        echo "Nome: " . $row_usuario['nome'] . "<br>";
        echo "Email: " . $row_usuario['email'] . "<br>";
        echo "Cadastrado em: " . date('d/m/Y H:i:s', strtotime($row_usuario['created'])) . "<br>";
        echo "Editado: ";
        if (!empty($row_usuario['modified'])) {
            echo "Editado: " . date('d/m/Y H:i:s', strtotime($row_usuario['modified'])) . "<br>";
        }
        echo "<br>";

        echo "<hr>";
    }

    echo "<h2>Listar usuários otimizado</h2>";
    //Indica quais colunas devem retornar o valor
    $query_usuarios_b = "SELECT id, nome, email, created, modified FROM usuarios";
    $result_usuarios_b = $conn->prepare($query_usuarios);
    $result_usuarios_b->execute();

    while ($row_usuario_b = $result_usuarios_b->fetch(PDO::FETCH_ASSOC)) {
        extract($row_usuario_b);
        echo "ID: $id <br>";
        echo "Nome: $nome <br>";
        echo "Email: $email <br>";
        echo "Cadastrado em: " . date('d/m/Y H:i:s', strtotime($created)) . "<br>";
        echo "Editado: ";
        if (!empty($modified)) {
            echo "Editado: " . date('d/m/Y H:i:s', strtotime($modified)) . "<br>";
        }
        echo "<br>";

        echo "<hr>";
    }

    ?>
</body>

</html>